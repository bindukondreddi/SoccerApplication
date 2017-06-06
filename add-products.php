<?php



include_once ("config/db.php");
include_once ("login.class.php");
if (!$login->isUserLoggedIn() || $_SESSION['user_name'] != "admin") {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
							<!--	<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							-->
                            </ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
						<!--	<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>-->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!--<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                -->
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								
                                <?php
if ($login->isUserLoggedIn() == true) {
    if($_SESSION['user_name']=="admin")
    echo "<li><p style=\"margin-top:10px;\"><a href=\"dashboard.php\">Dashboard</a></li>";
    echo "<li><p style=\"margin-top:10px;\">Welcome, " . $_SESSION['user_name'] .
        "!</p></li><li><a href=\"login.class.php?logout=true\">logout</a></li>";
} else {
    echo "<li><a href=\"login.php\"><i class=\"fa fa-lock\"></i> Login/Register</a></li>";
}
?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
        </header>
        <div id="main">
        <?php
        if(!isset($_POST['submit']))
{
    ?>
        <form action="" method="post" enctype="multipart/form-data">
        
        			<h4>Add Product</h4>
			
		<ul>
		<li>
		<label >Club Name </label>
		<div>
			<input name="club" type="text" required/> 
		</div> 
		</li>		
        <li>
		<label >Jersey Type </label>
		<div>
		<select name="type"> 
<option value="Home" >Home</option>
<option value="Away" >Away</option>
<option value="Alternate" >Alternate</option>

		</select>
		</div> 
		</li>	
        <li>
		<label >Gender </label>
		<div>
		<select name="gender"> 
<option value="Male" >Male</option>
<option value="Female" >Female</option>

		</select>
		</div> 
		</li>	
        	<li>
		<label >Size </label>
		<div>
		<select name="size"> 
<option value="XS" >XS</option>
<option value="S" >S</option>
<option value="M" >M</option>
<option value="L" >L</option>
<option value="XL" >XL</option>
<option value="XXL" >XXL</option>

		</select>
		</div> 
		</li>		<li >
		<label >Price (USD) </label>
		<div>
			<input name="cost" type="text" /> 
		</div> 
		</li>		<li id="li_3" >
		<label >Upload Picture </label>
		<div>
			<input id="element_3" name="img" class="element file" type="file"/> 
		</div> <p class="guidelines" id="guide_3"><small>(.jpg/.png only)</small></p> 
		</li>
        <input type="submit" name="submit" value="submit"/>
        </form>
<?php
}
else
{
    $file_name = null;

try {
    
     if (
        !isset($_FILES['img']['error']) ||
        is_array($_FILES['img']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    
    switch ($_FILES['img']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

     
    if ($_FILES['img']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
	$ext = null;
	$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
    $detectedType = exif_imagetype($_FILES['img']['tmp_name']);
    $error = !in_array($detectedType, $allowedTypes);
	if($error)
	{
		echo "Invalid image format. Please use .jpg or .png format.";
		exit();
	}

	//renaming file - To allow people to upload images with the same names.
	$dest = "logs/";
	$temp = explode(".",$_FILES["img"]["name"]);
	$file_name = rand(1,10000000000) . '.' .end($temp);
    if (!move_uploaded_file( $_FILES['img']['tmp_name'], $dest.$file_name))
	{
        throw new RuntimeException('Failed to move uploaded file.');
    }

	

} catch (RuntimeException $e) {

    echo $e->getMessage();

}

$club = strip_tags(trim($_POST['club']));
$type = strip_tags(trim($_POST['type']));
$size = strip_tags(trim($_POST['size']));
$cost = strip_tags(trim($_POST['cost'])); 
$gender = strip_tags(trim($_POST['gender']));

$add_query = "INSERT INTO products(active,name,type,gender,size,cost,picture) VALUES(1,'".$club."','".$type."','".$gender."','".$size."','".$cost."','".$file_name."')";
$res_add = $db->query($add_query);
if($res_add) echo "Your listing has been added successfully.";
else "Failed to add your listing.";  
}
?>
        </div>
        <footer>
        <div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
<style>
h4{
    margin-left:40px;
    margin-top:50px;
}
label{
    margin-top:30px;
    margin-bottom:10px;
}
select
{
    width:150px;
}
#main
{
    min-height:800px;
    margin-left:10%;
}
</style>
</html>
	

