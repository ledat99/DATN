<?php
include_once 'inc/header.php';

?>

<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
	header('Location:login.php');
}
?>
<?php

// $pd = new product();
// if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
// 	echo "<script>window.location ='404.php'</script>";
// } else {
// 	$id = $_GET['proid'];
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
// 	// The request is using the POST method

// 	$quantity = $_POST['quantity'];
// 	$Addtocart = $ct->add_to_cart($quantity, $id);
// }
?>
<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Profile </h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
				
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="">
	<h2>Profile user</h2>

	<div class="table-content table-responsive col-md-12">
		<table>
			<?php
			$id = Session::get("UserID");
			$get_user = $us->show_user($id);
			if ($get_user) {
				while ($result = $get_user->fetch_assoc()) {

			?>
					<thead>
						<tr>
							<th class="product-name">User Name</th>
							<th class="product-thumbnail">Email</th>
							<th class="product-price">Phone</th>
							<th class="product-quantity">Address</th>
							<th class="product-subtotal">DisplayName</th>

						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="product-name"><?php echo $result['Username']; ?></td>
							<td class="product-name"><?php echo $result['Email']; ?></td>
							<td class="product-name"><?php echo $result['Phone']; ?></td>
							<td class="product-name"><?php echo $result['Address']; ?></td>
							<td class="product-name"><?php echo $result['DisplayName']; ?></td>

						</tr>


					</tbody>
			<?php
				}
			}

			?>
		</table>

	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="buttons-cart--inner">
				<div class="buttons-cart">
					<a href="index.php">Continue Shopping</a>
				</div>
				<div class="buttons-cart checkout--btn">
					<a href="editprofile.php">Update Profile</a>

				</div>
			</div>
		</div>
	</div>




</div>

<?php
include_once 'inc/footer.php';

?>