<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

// $ct = new cart();
// if(isset($_GET['shiftid'])) {
//     $id = $_GET['shiftid'];
// 	$time =$_GET['time'];
// 	$price =$_GET['price'];
// 	$shifted = $ct->shifted($id,$time,$price);


// }
// if(isset($_GET['delid'])) {
//     $id = $_GET['delid'];
// 	$time =$_GET['time'];
// 	$price =$_GET['price'];
// 	$del_shifted = $ct->del_shifted($id,$time,$price);


// }
?>
<?php
$ct = new cart();
if(isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
	$time =$_GET['time'];
	$total =$_GET['total'];
	$shifted = $ct->shifted($id,$time,$total);
}

    if(isset($_GET['delid'])) {
    $id = $_GET['delid'];
	$time =$_GET['time'];
	$total =$_GET['price'];
	$del_shifted = $ct->del_shifted($id,$time,$total);


}
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="admin_order.php">Order</a></li>
            
        </ol>
        <div class="table-content table-responsive col-md-12" style="background: #fff;">
        <?php
				if(isset($shifted)){
					echo $shifted;
				}
				?>   
                <?php
				if(isset($del_shifted)){
					echo $del_shifted;
				}
				?>    
        <table>
            <thead>
                <tr>
                    <th  class="product-name " width="10%">OrderID</th>
                    <th  class="product-name " width="20%">User</th>
                    <th class="product-name" width="20%"> Total</th>
                    <th class="product-name" width="15%">Order Date</th>
                    <th class="product-name" width="15%">Payment Method</th>
                    <th class="product-name" width="20%">View</th>
                    
                    <!-- <th class="product-subtotal">Delivery</th> -->

                </tr>
            </thead>
            <?php
					$ct = new cart();
					$fm = new Format();
					$order_management = $ct->order_management();
					if($order_management){
						// $i=0;
						while($result=$order_management->fetch_assoc()){
							// $i++;
					
					?>
                    <tbody>
                        <tr>
                            <!-- <td class="product-name"><?php echo $i; ?></a> -->
                            <td class="product-name"><?php echo $result['OrderID']; ?></a>
                            <td class="product-name"><?php echo $result['Receiver']; ?></a>
                            <td class="product-name"><span class="amount"><?php echo $fm->format_currency($result['Total']) . ' ' . 'đ'; ?></span></td>
                            <td class="product-name"><?php echo $result['OrderDate']; ?></td>
                            <td class="product-name"><?php echo $result['Payment_methods']; ?></td>
                            <td class="product-name"><a href="order_details.php?OrderID=<?php echo $result['OrderID']; ?>"><button class="btn btn-primary dropdown-toggle">View Details</button></a></td>
                          
                        </tr>


                    </tbody>
            <?php

                }
            }
            ?>
        </table>

    </div>

    </div>
</div>
