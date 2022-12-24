<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
    echo "<script>window.location ='login.php'</script>";
}
?>
<?php
if (isset($_GET['OrderID']) && $_GET['OrderID'] != NULL) {
    $order_id = $_GET['OrderID'];
} else {
    echo "<script>window.location ='order.php'</script>";
}
?>
<?php
$ct = new cart();
if (isset($_GET['received'])) {
    $received = $_GET['received'];
    $received = $ct->received($received);
}
if (isset($_GET['not_received'])) {
    $not_received = $_GET['not_received'];
    $not_received = $ct->not_received($not_received);
}
if (isset($_GET['cancelled'])) {
    $cancelled = $_GET['cancelled'];
    $cancelled = $ct->cancelled($cancelled);
}
if (isset($_GET['request_resend'])) {
    $request_resend = $_GET['request_resend'];
    $request_resend = $ct->request_resend($request_resend);
}
?>

<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Order Detail</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="order.php">Order</a></li>
                    <li class="active"><a href="orderdetails.php?OrderID=<?php echo $order_id; ?>">Order Detail</a></li>
                    <!-- <li class="active">Order Detail</li> -->
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- <div class="section"> -->
<div class="col-md-12">
    <!-- <div class="section-title">
                <h3 class="title">Delivery</h3>
            </div> -->

    <div class="table-content table-responsive col-md-12">

        <div class="section-title">
            <h3 class="title">Delivery</h3>
        </div>
        <?php
        if (isset($received)) {
            echo $received;
        }
        if (isset($not_received)) {
            echo $not_received;
        }
        if (isset($cancelled)) {
            echo $cancelled;
        }
        if (isset($request_resend)) {
            echo $request_resend;
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th class="product-name" width="15%">User Name</th>
                    <th class="product-name" width="20%"> Email Name</th>
                    <th class="product-thumbnail" width="10%">Phone</th>
                    <th class="product-price" width="25%">Address</th>
                    <th class="product-price" width="15%">Status</th>
                    <th class="product-price" width="20%">Action</th>
                </tr>
            </thead>
            <?php
            $user_id = Session::get('UserID');


            $get_user_orderdetails = $ct->get_user_orderdetails($user_id, $order_id);

            if ($get_user_orderdetails) {
                while ($result = $get_user_orderdetails->fetch_assoc()) {
            ?>
                    <tbody>
                        <tr>
                            <td class="product-name"><?php echo $result['Receiver']; ?></a>
                            <td class="product-name"><?php echo $result['Email']; ?></td>
                            <td class="product-thumbnail"><?php echo $result['Phone']; ?></td>
                            <td class="product-quantity"><?php echo $result['Address']; ?></td>
                            <td class="product-quantity">
                                <?php

                                switch ($result['Status']) {
                                    case 1:
                                        echo '<span>Confirmed</span>';
                                        break;
                                    case 2:
                                        echo '<span>Shifting</span>';
                                        break;
                                    case 3:
                                        echo '<span>Request resend</span>';
                                        break;
                                    case 4:
                                        echo '<span>Cancelled</span>';
                                        break;
                                    case 5:
                                        echo '<span>Not yet received</span>';
                                        break;
                                    case 6:
                                        echo '<span>Received</span>';
                                        break;
                                    case 7:
                                        echo '<span>Deliveried</span>';
                                        break;
                                    default:
                                        echo '<span>Pending</span>';
                                }
                                ?>


                            </td>
                            <td>
                                <?php
                                switch ($result['Status']) {
                                    case 1:
                                        // echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                        // echo '<span>Pending</span>';
                                        echo '<span>Waiting to receive the goods</span>';
                                        
                                        break;
                                    case 2:
                                        echo '<a href="?received=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-primary dropdown-toggle">Received</button></a>';
                                        // echo '<a href="?not_received=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Not yet received</button></a>';
                                        break;
                                    case 3:
                                        echo '<span>Waiting for response</span>';
                                        
                                        // echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                        // echo '<a href="?received='.$order_id.' &OrderID='.$order_id.'>"<button style=" margin-bottom: 10px;" class="btn btn-primary dropdown-toggle">Received</button></a>';
                                        // echo '<a href="?not_received='.$order_id.' &OrderID='.$order_id.'>"<button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Not yet received</button></a>';
                                        break;
                                    case 4:
                                        // echo '<span>Cancelled</span>';
                                        echo '<span>Completed</span>';
                                        break;
                                    case 5:
                                        echo '<a href="?request_resend=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Request resend</button></a>';
                                        // echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                        break;
                                    case 6:
                                        // echo '<span>Received</span>';
                                        echo '<span>Completed</span>';
                                        break;
                                    case 7:
                                       
                                        echo '<a href="?received=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-primary dropdown-toggle">Received</button></a>';
                                        break;
                                    default:

                                        echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                        // echo '<span>Pending</span>';
                                }
                                ?>

                            </td>
                        </tr>
                    </tbody>
            <?php
                }
            }

            ?>
        </table>

    </div>

    <!-- <div class="section-title">
                <h3 class="title">Order Details </h3>
            </div> -->


    <!-- container -->
    <div class=" col-md-12">
        <div class="table-content table-responsive col-md-6">
            <div class="section-title">
                <h3 class="title">Order Details </h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class="product-name" width="5%">ID</th>
                        <th class="product-name" width="20%"> Product Name</th>
                        <th class="product-thumbnail" width="20%">Image</th>
                        <th class="product-price" width="25%">Price</th>
                        <th class="product-quantity" width="5%">Quantity</th>
                        <th class="product-subtotal" width="25%">Total</th>

                    </tr>
                </thead>
                <?php



                $get_orderdetails = $ct->get_orderdetails($user_id, $order_id);

                if ($get_orderdetails) {

                    $subtotal = 0;
                    $qty = 0;
                    $i = 0;
                    while ($result_orderdetails = $get_orderdetails->fetch_assoc()) {
                        $i++;
                        $qty += 1;



                ?>
                        <tbody>
                            <tr>
                                <td class="product-name"><?php echo $i; ?></a>
                                <td class="product-name"><?php echo $result_orderdetails['ProductName']; ?></td>
                                <td class="product-thumbnail"><img src="admin/uploads/<?php echo $result_orderdetails['Image']; ?>" width="100" height="100" /></td>
                                <td class="product-price"><span class="amount"><?php echo $fm->format_currency($result_orderdetails['Price']) . ' ' . 'đ'; ?></span></td>
                                <td class="product-quantity"><?php echo $result_orderdetails['Quantity']; ?></td>



                                <td class="product-subtotal"><?php
                                                                $total = $result_orderdetails['Price'] * $result_orderdetails['Quantity'];
                                                                echo $fm->format_currency($total) . ' ' . 'đ';
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
        <div class="table-content table-responsive col-md-6">
            <div>
                <?php $get_ordered = $ct->get_orders($order_id);
                if ($get_ordered) { ?>

                    <div class="htc__cart__total " style="margin-bottom: 0px; padding-left: 0px;margin-top: 75px;margin-left: 40px;">
                        <h6>cart total</h6>
                        <div class="cart__desk__list">
                            <ul class="cart__desc">
                                <li>cart total</li>
                                <li>tax</li>
                            </ul>
                            <ul class="cart__price">
                                <li><?php
                                    echo $fm->format_currency($subtotal) . ' ' . 'đ';

                                    Session::set('sum', $subtotal);
                                    Session::set('qty', $qty);
                                    ?></li>
                                <li><?php
                                    $vat = $subtotal * 0.1;
                                    echo '(10%)' . $fm->format_currency($vat) . ' ' . 'đ';

                                    ?></li>
                            </ul>
                        </div>
                        <div class="cart__total">
                            <span>order total</span>
                            <span><?php $gtotal = $subtotal + $vat;
                                    echo $fm->format_currency($gtotal) . ' ' . 'đ'; ?></span>
                        </div>

                    </div>

                <?php } else {
                    echo '<span class="error">Your  cart is empty! Please shopping now</span>';
                } ?>

            </div>
        </div>


    </div>
</div>










</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="buttons-cart--inner">

            <div class="buttons-cart checkout--btn">
                <!-- <a href="#">update</a> -->

                <a href="orderdetails.php?OrderID=<?php echo $order_id; ?>">Refresh</a>
            </div>
            <div class="buttons-cart checkout--btn">
                <!-- <a href="#">update</a> -->
                <a href="order.php">Back</a>
            </div>
        </div>
    </div>
</div>

<?php
include 'inc/footer.php';
?>