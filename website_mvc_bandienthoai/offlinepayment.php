<?php
include_once 'inc/header.php';

?>

<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
	echo "<script>window.location ='login.php'</script>";
}
?>
<?php
// if (isset($_GET['OrderID']) && $_GET['OrderID'] == 'order') {
    
//     $user_id= Session::get('UserID');
	
//     $insertOrder =$ct->insertOrder($user_id);
//     $delCart = $ct->del_all_data_cart();
// 	echo "<script>window.location ='success.php'</script>";
// } 
?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$user_id= Session::get('UserID');


	$username =$_POST['username'];
    $email =$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

	$insert_Order =$ct->insertOrder($user_id,$username,$email,$phone,$address);
	$delCart = $ct->del_all_data_cart();
		echo "<script>window.location ='success.php'</script>";
}
?>
<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">Checkout</li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="table-content table-responsive col-md-12">
		<table>
			<thead>
				<tr>
					<th class="product-name" width="5%">ID</th>
					<th class="product-name" width="20%"> Product Name</th>
					<th class="product-thumbnail" width="20%">Image</th>
					<th class="product-price" width="20%">Price</th>
					<th class="product-quantity" width="15%">Quantity</th>
					<th class="product-subtotal" width="20%">Total</th>
					
				</tr>
			</thead>
			<?php
			$get_product_cart = $ct->get_product_cart();
			if ($get_product_cart) {
				$subtotal = 0;
				$qty = 0;
				$i=0;
				while ($result = $get_product_cart->fetch_assoc()) {
					$i++;
					$qty += 1;
					


			?>
					<tbody>
						<tr>
							<td class="product-name"><?php echo $i; ?></a>
							<td class="product-name"><?php echo $result['ProductName']; ?></td>
							<td class="product-thumbnail"><img src="admin/uploads/<?php echo $result['Image']; ?>" width="100" height="100" /></td>


							
							<td class="product-price"><span class="amount"><?php echo $fm->format_currency($result['Price']).' '.'đ'; ?></span></td>
							<td class="product-quantity"><?php echo $result['Quantity']; ?></td>
					


							<td class="product-subtotal"><?php
															$total = $result['Price'] * $result['Quantity'];
															echo $fm->format_currency($total).' '.'đ';
															?></td>
		
						</tr>


					</tbody>
			<?php
					$subtotal += $total;
				}
			}
			?>
		</table>

	</div>
	<form action="" method="post">
	<div class="container">
	

		<div class="row">
			<div class=" col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
				<?php $check_cart = $ct->check_cart();
				if ($check_cart) { ?>




					<div class="htc__cart__total ">
						<h6>cart total</h6>
						<div class="cart__desk__list">
							<ul class="cart__desc">
								<li>cart total</li>
								<li>tax</li>
							</ul>
							<ul class="cart__price">
								<li><?php
									echo $fm->format_currency($subtotal).' '.'đ';

									Session::set('sum', $subtotal);
									Session::set('qty', $qty);
									?></li>
								<li><?php
									$vat = $subtotal * 0.1;
									echo '(10%)'.$fm->format_currency($vat).' '.'đ';

									?></li>
							</ul>
						</div>
						<div class="cart__total">
							<span>order total</span>
							<span><?php $gtotal = $subtotal + $vat;
									echo $fm->format_currency($gtotal).' '.'đ'; ?></span>
						</div>

					</div>

				<?php } else {
					echo '<span class="error">Your  cart is empty! Please shopping now</span>';
				} ?>

			</div>
			<div class=" col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
				<!-- Billing Details -->
				<div class="billing-details">
				<?php
            $id=Session::get("UserID");
            $get_user=$us->show_user($id);
            if($get_user){
                while($result=$get_user->fetch_assoc()){
            
            ?>
					<div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >User Name</label>
						<input  class="input" value="<?php echo $result['Username']; ?>" type="text" name="username" placeholder="User Name">
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >Email</label>
						<input  class="input" value="<?php echo $result['Email']; ?>" type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group " style=" display: flex; align-items: center;">
					<label style="width:30%" >Phone</label>
						<input  class="input" value="<?php echo $result['Phone']; ?>" type="text" name="phone" placeholder="Phone">
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >Address</label>
						<input   class="input" value="<?php echo $result['Address']; ?>" type="text" name="address" placeholder="Address">
					</div>


					<!-- <div class="section-title">
						<h3 class="title">Billing address</h3>
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >User Name</label>
						<input  class="input"  type="text" name="username" placeholder="User Name">
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >Email</label>
						<input  class="input"  type="email" name="email" placeholder="Email">
					</div>
					<div class="form-group " style=" display: flex; align-items: center;">
					<label style="width:30%" >Phone</label>
						<input  class="input"  type="text" name="phone" placeholder="Phone">
					</div>
					<div class="form-group" style=" display: flex; align-items: center;">
					<label style="width:30%" >Address</label>
						<input   class="input"  type="text" name="address" placeholder="Address">
					</div> -->
					<!-- /Billing Details -->
					<?php
                }
            }
					
			?>


				</div>

			</div>
		</div>

		<!-- <a href="?OrderID=order" ></a> -->
		<center><button type="submit" name="order" class="primary-btn order-submit">Place order</button></center>
		
	</div>
	</form>
	<!-- /Order Details -->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="buttons-cart--inner">
				<div class="buttons-cart">
					<a href="index.php">Continue Shopping</a>
				</div>
				<div class="buttons-cart checkout--btn">
					<!-- <a href="#">update</a> -->
					<a href="cart.php">Cart</a>
				</div>
			</div>
		</div>
	</div>





	<!-- /container -->
</div>
<!-- /SECTION -->
<?php
include_once 'inc/footer.php';

?>