<?php
error_reporting(-1);


include_once('config/db.php');
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
session_start();

class Login
{
    public $errors = array();
public function login()
{
     if(!empty($_POST['user_name']) && !empty($_POST['user_password']))
    {
        $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($db->connect_errno)
        {
            echo "DB CONNECTION ERROR.";
        }
        else
        {
            $query = "SELECT user_name from users where user_name='".$_POST['user_name']."' AND user_password_hash='".md5(md5($_POST['user_password']))."'";
            $result = $db->query($query);
            if($result->num_rows == 1)
            {
                echo "Login Successful";
                if(!isset($_SESSION))
                {
                     session_start();
                    }
                $_SESSION['user_name'] = $_POST['user_name'];
                header('Location: index.php');
                
            }
            else
            {
               header('Location: login_failed.php');
            }
        }
        
    }
}
 public function register()
    {
        
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Empty Username";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email cannot be empty";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
                 // escaping, additionally removing everything that could be (html/javascript-) code
                $user_name = strip_tags($_POST['user_name']);
                $user_email = strip_tags($_POST['user_email']);
                $user_password = $_POST['user_password_new'];
                $user_password_hash = md5(md5($user_password));

                // check if user or email address already exists
                $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                global $db;
                $query_check_user_name = $db->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that username / email address is already taken.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                    $query_new_user_insert = $db->query($sql);
                    $add = "INSERT INTO address(user_name, add_1,add_2,city,state,zip) VALUES('".$user_name."','".$_POST['add1']."','".$_POST['add2']."','".$_POST['city']."','".$_POST['state']."',".$_POST['zip'].")";
                    $res_add = $db->query($add);// if user has been added successfully
                    if ($query_new_user_insert && $res_add ) {
                        header('Location: register_suc.php');
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } 
            
    }
public function isUserLoggedIn()
{
    if( isset($_SESSION['user_name']) && !empty($_SESSION['user_name']))
    {
        return true;
    }
    else
    {
        return false;
    }
}
public function logout()
{
    
    $_SESSION = array();
     session_destroy();
    header('Location: index.php');
}
}
$login = new Login();
if(isset($_REQUEST['logout']))
{
    $login->logout();
}
if(isset($_REQUEST['register']))
{
    $login->register();
}
?>
