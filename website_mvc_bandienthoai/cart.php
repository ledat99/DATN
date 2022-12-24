<?php
include_once 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (isset($_GET['CartID'])) {


	$cartID = $_GET['CartID'];
	$delcart = $ct->del_product_cart($cartID);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	// The request is using the POST method
	$productID=$_POST['ProductID'];

	$quantity = $_POST['quantity'];
	$cartID = $_POST['CartID'];
	$update_quantity_cart = $ct->update_quantity_cart($productID,$quantity, $cartID);
	// if ($quantity <= 0) {
	// 	$delcart = $ct->del_product_cart($cartID);
	// }
}
?>
<?php

if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";

// để reset lại giỏ hàng ở header 
}

?>
<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Cart </h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
                    <li class="active"><a href="cart.php?id=live">Cart</a></li>
				
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="">
	<h2>Your Cart</h2>
	<?php
	if (isset($update_quantity_cart)) {
		echo $update_quantity_cart;
	}
	?>
	<div class="table-content table-responsive col-md-12">
		<table>
			<thead>
				<tr>
					<th class="product-name">Product Name</th>
					<th class="product-thumbnail">Image</th>
					<th class="product-price">Price</th>
					<th class="product-quantity">Quantity</th>
					<th class="product-subtotal">Total</th>
					<th class="product-remove">Action</th>
				</tr>
			</thead>
			<?php
			$get_product_cart = $ct->get_product_cart();
			if ($get_product_cart) {
				$subtotal = 0;
				$qty = 0;
				while ($result = $get_product_cart->fetch_assoc()) {
					$qty += 1;


			?>
					<tbody>
						<tr>
							<td class="product-name"><a href="#"><?php echo $result['ProductName']; ?></a>
							<td class="product-thumbnail"><a href="#"><img src="admin/uploads/<?php echo $result['Image']; ?>" width="100" height="100" /></a></td>


							</td>
							<td class="product-price"><span class="amount"><?php echo $fm->format_currency($result['Price']).' '.'đ'; ?></span></td>
							<td class="product-quantity">
								<form action="" method="POST">
									<input type="hidden" name="ProductID" value="<?php echo $result['ProductID']; ?>" />
									<input type="hidden" name="CartID" value="<?php echo $result['CartID']; ?>"  />
									<input type="number" name="quantity" value="<?php echo $result['Quantity']; ?>" min="1" />
									<input id="submit" type="submit" name="submit" value="Update" />



								</form>
							</td>


							<td class="product-subtotal"><?php
															$total = $result['Price'] * $result['Quantity'];
															echo $fm->format_currency($total).' '.'đ';
															?></td>
							<td class="product-remove"><a onclick="return confirm('Are you want to delete?')" href="?CartID=<?php echo $result['CartID']; ?>">Delete</a></td>
						</tr>


					</tbody>
			<?php
					$subtotal += $total;
				}
			}
			?>
		</table>

	</div>
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
								echo $fm->format_currency($vat).' '.'đ';

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
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="buttons-cart--inner">
				<div class="buttons-cart">
					<a href="index.php">Continue Shopping</a>
				</div>
				<div class="buttons-cart checkout--btn">
					<!-- <a href="#">update</a> -->
					<a href="payment.php">checkout</a>
				</div>
			</div>
		</div>
	</div>




</div>


<?php include 'inc/footer.php'; ?>