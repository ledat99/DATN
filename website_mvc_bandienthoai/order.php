<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
    echo "<script>window.location ='login.php'</script>";
}
$ct = new cart();
if (isset($_GET['confirmid'])) {
    $id = $_GET['confirmid'];
    $time = $_GET['time'];
    $total = $_GET['total'];
    $shifted_confirm = $ct->shifted_confirm($id, $time, $total);
}
?>
<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Order </h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
                    <li class="active"><a href="order.php">Order</a></li>
				
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- <div class="section"> -->
<div class="table-content table-responsive col-md-12" style="background: #fff;">
<table>
            <thead>
                <tr>
                    <th  class="product-name " width="10%">OrderID</th>
                    <th  class="product-name " width="20%">User</th>
                    <th class="product-name" width="20%"> Total</th>
                    <th class="product-thumbnail" width="15%">Order Date</th>
                    <th class="product-thumbnail" width="15%">Payment Method</th>
                    <th class="product-price" width="20%">View</th>
                    
                    <!-- <th class="product-subtotal">Delivery</th> -->

                </tr>
            </thead>
            <?php
            $user_id = Session::get('UserID');
					
					$get_order_by_user = $ct->check_order($user_id);
					if($get_order_by_user){
						// $i=0;
						while($result=$get_order_by_user->fetch_assoc()){
							// $i++;
					
					?>
                    <tbody>
                        <tr>
                            <!-- <td class="product-name"><?php echo $i; ?></a> -->
                            <td class="product-name"><?php echo $result['OrderID']; ?></a>
                            <td class="product-name"><?php echo $result['Receiver']; ?></a>
                            <td class="product-price"><span class="amount"><?php echo $fm->format_currency($result['Total']) . ' ' . 'đ'; ?></span></td>
                            <td class="product-name"><?php echo $result['OrderDate']; ?></td>
                            <td class="product-name"><?php echo $result['Payment_methods']; ?></td>
                            <td class="product-name"><a href="orderdetails.php?OrderID=<?php echo $result['OrderID']; ?>"><button class="btn btn-primary dropdown-toggle">View Details</button></a></td>
                          
                        </tr>


                    </tbody>
            <?php

                }
            }
            ?>
        </table>


</div>

<?php
include 'inc/footer.php';
?>