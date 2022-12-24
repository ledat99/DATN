<?php include 'lib/session.php';
Session::init();
?>
<?php

include 'lib/database.php';
include 'helpers/format.php';
//load autofile
spl_autoload_register(function ($className) {
	// 	$filepath = realpath(dirname(__FILE__));
	// include_once($filepath . '/../classes/' . $className . '.php');
	// include_once "classes/" . $className . ".php";
	include_once "classes/" . $className . ".php";
});
$db = new Database();
$fm = new Format(); 
$ct = new cart();
$us = new user();
$product = new product();
$manufacturer = new manufacturer();
$promotion = new promotion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/bonus.css" />
	<link type="text/css" rel="stylesheet" href="css/bonus1.css" />
	<link type="text/css" rel="stylesheet" href="css/cart.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />



</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="index.php"><i class="fa fa-phone"></i> +0853535697</a></li>
					<li><a href="index.php"><i class="fa fa-envelope-o"></i> leduydat99@gmail.com</a></li>
					<li><a href="index.php"><i class="fa fa-map-marker"></i> 297 Tran Cung Street,Ha Noi</a></li>
				</ul>
				<?php
				if (isset($_GET['UserID'])) {
					$delCart = $ct->del_all_data_cart(); // xóa hết thông tin trong giỏ hàng khi đăng xuất
					Session::destroy();
				}
				?>
				<ul class="header-links pull-right">
					<li><a href="index.php">Hi  <?php echo Session::get('displayName'); ?></a></li>
					<li><i class="fa fa-user-o"></i>
						<?php
						$login_check = Session::get("user_login");
						if ($login_check == false) {
							echo '<a href="login.php">Login</a>';
						} else {

							echo '<a href="?UserID=' . Session::get('UserID') . '">Logout</a>';
						}

						?>
					</li>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form method="get" action="search.php">
								
								<input name="search" class="input" placeholder="Search product here here">
								<button type="submit" name="submit" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<!-- <div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div> -->
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>

									<div class="qty">
										<?php $check_cart = $ct->check_cart();
										if ($check_cart) { ?>

										<?php $qty = Session::get("qty");
											echo $qty;
										} else {
											echo '0';
										} ?>

									</div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										<?php $check_cart = $ct->check_cart();
										if ($check_cart) {
											while ($result = $check_cart->fetch_assoc()) { ?>
												<div class="product-widget">
													<div class="product-img">
														<img src="admin/uploads/<?php echo $result['Image']; ?>" width="60" height="60" />
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="details.php?ProductID=<?php echo $result['ProductID']; ?>"><?php echo $result['ProductName']; ?></a></h3>
														<h4 class="product-price"><span class="qty"><?php echo $result['Quantity']; ?>x</span><?php echo $fm->format_currency($result['Price']); ?></h4>
													</div>
													<!-- <button class="delete"><a href="?CartID=<?php echo $result['CartID']; ?>"><i class="fa fa-close"></i></a></button> -->
												</div>
										<?php
											}
										}
										?>


									</div>
									<div class="cart-summary">
										<?php $check_cart = $ct->check_cart();
										if ($check_cart) { ?>

											<?php $qty = Session::get("qty");
											echo '<small>' . $qty  . ' Item(s) selected </small>'; ?>
											<?php $sum = Session::get("sum");
											echo '<h5>SUBTOTAL:' . $fm->format_currency($sum) . ' đ</h5>'; ?>
											
										<?php } else {
											echo 'Empty';
										} ?>

									</div>
									<div class="cart-btns">
										<a href="cart.php">View Cart</a>
										<a href="payment.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li ><a href="index.php">Home</a></li>
					<li><a href="manufacturer.php">Manufacturer</a></li>


					<?php
					$login_check = Session::get('user_login');
					if ($login_check == false) {
						echo '';
					} else {
						echo ' <li><a href="profile.php">Profile</a> </li>';
					}

					?>
					<li><a href="cart.php">Cart</a></li>
					<?php
					$user_id = Session::get('UserID');
					$check_order = $ct->check_order($user_id);
					if ($check_order == true) {
						echo '<li><a href="orderdetails.php">Ordered</a> </li>';
					} else {
						echo '';
					}
					?>


					<!-- <li><a href="compare.php">Compare</a></li> -->
					<!-- <li><a href="#">Contact</a></li> -->


				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->