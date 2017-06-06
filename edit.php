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
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								
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
        <h2>Edit Listing</h4>
        
        <?php
  if(isset($_POST['update']))
  {
        $club = strip_tags(trim($_POST['club']));
        $type = strip_tags(trim($_POST['type']));
        $gender = strip_tags(trim($_POST['gender']));
        $size = strip_tags(trim($_POST['size']));
        $cost = strip_tags(trim($_POST['cost']));
        $active = strip_tags(trim($_POST['active']));
        $update = "Update products set name='".$club."',type='".$type."',gender='".$gender."',size='".$size."',cost=".$cost.",active=".$active." WHERE id=".$_POST['id'];
        $res_update = $db->query($update);
        if($res_update)echo "<h4>The Listing has been updated successfully.</h4>";
        else echo "<h4>Failed to update the Listing. Please try again later.</h4>";
  }   
  else
  {
        echo "<div id=\"left\">";
        if(isset($_GET['listing_id']))
        {
            $id = $_GET['listing_id'];
            $get_prod = "SELECT * from products where id=".$id;
            $res_prod = $db->query($get_prod);
            if($res_prod->num_rows == 0)
            {
                echo "<h2>Invalid Listing</h2>";
            }
            else
            {
                $row = $res_prod->fetch_assoc();
                //Display Form.
                ?>
                <form action="" method="post">
                <ul>
		<li>
		<label >Club Name </label>
		<div>
			<input name="club" type="text" value="<?php echo $row['name'];?>" required/> 
		</div> 
		</li>		
        <li>
		<label >Jersey Type </label>
		<div>
		<select name="type"> 
<option value="Home" <?php if($row['type'] == "Home") echo "selected";?> >Home</option>
<option value="Away" <?php if($row['type'] == "Away") echo "selected";?> >Away</option>
<option value="Alternate" <?php if($row['type'] == "Alternate") echo "selected";?> >Alternate</option>

		</select>
		</div> 
		</li>	
        <li>
		<label >Gender </label>
		<div>
		<select name="gender"> 
<option value="Male" <?php if($row['gender'] == "Male") echo "selected";?> >Male</option>
<option value="Female" <?php if($row['gender'] == "Female") echo "selected";?> >Female</option>

		</select>
		</div> 
		</li>	
        	<li>
		<label >Size </label>
		<div>
		<select name="size"> 
<option value="XS" <?php if($row['size'] == "XS") echo "selected";?>  >XS</option>
<option value="S" <?php if($row['size'] == "S") echo "selected";?>  >S</option>
<option value="M" <?php if($row['size'] == "M") echo "selected";?>  >M</option>
<option value="L" <?php if($row['size'] == "L") echo "selected";?>  >L</option>
<option value="XL" <?php if($row['size'] == "XL") echo "selected";?>  >XL</option>
<option value="XXL" <?php if($row['size'] == "XXL") echo "selected";?>  >XXL</option>

		</select>
		</div> 
		</li>		<li >
		<label >Price (USD) </label>
		<div>
			<input name="cost" type="text" value="<?php echo $row['cost'];?>" /> 
		</div> 
		</li>
        <li>
        <label>Disable Listing:</label>
        <div>
        <select name="active">
        <option value="0" <?php if($row['active'] == "0") echo "selected";?> >Yes</option>
        <option value="1" <?php if($row['active'] == "1") echo "selected";?> >No</option>
        </select>
        </div>
        </li>
        <div>
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
        <input type="submit" name="update" value="Update"/>
             </div>   
                </form>
                
                <?php
                
            }
        }
        else
        {
            echo "<h2>Invalid Request.</h2>";
        }
        
        ?>
        </div>
        <div id="right">
        <img src="logs/<?php echo $row['picture']; ?>" style="max-width: 500px;"/>
        </div>
        <?php 
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
#main input, button
{
    margin-top:20px;
}
#left
{
    width:30%;
    float:left;
}
#right
{
    width:30%;
    float:right;
    margin-right:30%;
}
</style>
</html>
	

