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
    <title>View/Edit products</title>
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
        <h2>View/Edit Listings</h4>
        <?php
        
        $all_items = "SELECT * FROM products";
        $res_all_items = $db->query($all_items);
        for($i = 0; $i < $res_all_items->num_rows; $i++)
        {
            $row = $res_all_items->fetch_assoc();
            ?>
            <div id="item">
            <table>
            
            <tr>
    <td colspan="2" rowspan="2"><img src="logs/<?php echo $row['picture'];?>" style="max-height: 100px; max-width: 100px;"/></td>
    <td>Club Name: <b><?php echo $row['name'];?></b></td>
    <td>Product Active: <b><?php if($row['active']==1) echo "Yes"; else echo "No";?></b></td>
    <td>Gender: <b><?php echo $row['gender']; ?></b></td>
  </tr>
  <tr>
    <td>Size: <b><?php echo $row['size'];?></b></td>
    <td>Cost: <b>$<?php echo $row['cost'];?></b></td>
    <td><a href="edit.php?listing_id=<?php echo $row['id'];?>">Edit Listing</a></td>
  </tr>
            </table>
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
#item
{
    margin-left:25%;
    margin-top:30px;
    margin-bottom:30px;
    width:500px;
}
table
{
    border:1px solid;
    border-color:#E8E8E8;
    width:500px;
    table-layout:fixed;
}
table td, table th {
  border: 1px solid #E8E8E8;
  width:150px;
}
</style>
</html>
	

