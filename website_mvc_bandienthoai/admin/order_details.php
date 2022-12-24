<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../classes/user.php');
?>
<?php
if (isset($_GET['OrderID']) && $_GET['OrderID'] != NULL) {
    $order_id = $_GET['OrderID'];
}

?>
<?php
$ct = new cart();
if (isset($_GET['confirmID'])) {
    $confirmID = $_GET['confirmID'];
    $confirm = $ct->confirm($confirmID);
}
if (isset($_GET['shiftingID'])) {
    $shiftingID = $_GET['shiftingID'];
    $shifting = $ct->shifting($shiftingID);
}
if (isset($_GET['cancelled'])) {
    $cancelled = $_GET['cancelled'];
    $cancelled = $ct->cancelled($cancelled);
}
if (isset($_GET['resend'])) {
    $resend = $_GET['resend'];
    $resend = $ct->resend($resend);
}
if (isset($_GET['deliveried'])) {
    $deliveried = $_GET['deliveried'];
    $deliveried = $ct->deliveried($deliveried);
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
            <li><a href="order_details.php?OrderID=<?php echo $order_id; ?>">Order Details</a></li>

        </ol>
        <div class="col-md-12">
            <!-- <div class="section-title">
                <h3 class="title">Delivery</h3>
            </div> -->

            <div class="table-content table-responsive col-md-12">

                <div class="section-title">
                    <h3 class="title">Delivery</h3>
                </div>
                <?php
                if (isset($confirm)) {
                    echo $confirm;
                }
                ?>
                <?php
                if (isset($shifting)) {
                    echo $shifting;
                }
                ?>
                <?php
                if (isset($cancelled)) {
                    echo $cancelled;
                }
                ?>
                <?php
                if (isset($resend)) {
                    echo $resend;
                }
                ?>
                <?php
                if (isset($deliveried)) {
                    echo $deliveried;
                }
                ?>

                <table>
                    <thead>
                        <tr>
                            <th class="product-name" width="15%">User Name</th>
                            <th class="product-name" width="20%"> Email Name</th>
                            <th class="product-name" width="10%">Phone</th>
                            <th class="product-name" width="25%">Address</th>
                            <th class="product-name" width="15%">Status</th>
                            <th class="product-name" width="20%">Action</th>
                        </tr>
                    </thead>
                    <?php
                    $ct = new cart();
                    $get_user_by_orders = $ct->get_user_by_orders($order_id);
                    if ($get_user_by_orders) {
                        while ($result_user = $get_user_by_orders->fetch_assoc()) {
                    ?>
                            <tbody>
                                <tr>
                                    <td class="product-name"><?php echo $result_user['Username']; ?></a>
                                    <td class="product-name"><?php echo $result_user['Email']; ?></td>
                                    <td class="product-name"><?php echo $result_user['Phone']; ?></td>
                                    <td class="product-name"><?php echo $result_user['Address']; ?></td>
                                    <td class="product-name">

                                        <?php

                                        switch ($result_user['Status']) {
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

                                        switch ($result_user['Status']) {
                                            case 1:
                                                echo '<a href="?shiftingID=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Shifting</button></a>';
                                                // echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                                break;
                                            case 2:
                                                // echo '<span>Waiting for response</span>';
                                                echo '<a href="?deliveried=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Deliveried</button></a>';
                                                break;
                                            case 3:
                                                echo '<a href="?resend=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Resend</button></a>';
                                                echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                                break;
                                            case 4:
                                                echo '<span>Completed</span>';
                                                break;
                                            case 5:
                                                echo '<span>Waiting for response</span>';
                                                break;
                                            case 6:
                                                echo '<span>Completed</span>';
                                                break;
                                            case 7:
                                                echo '<span>Deliveried</span>';
                                                break;
                                                
                                            default:
                                                echo '<a href="?confirmID=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-primary dropdown-toggle">Confirm</button></a>';
                                                // echo '<a href="?cancelled=' . $order_id . '&OrderID=' . $order_id . '"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a>';
                                        }
                                        ?>
                                        <!-- <a href="?confirmID=<?php echo $result_user['OrderID']; ?>&OrderID=<?php echo $result_user['OrderID']; ?>"><button style=" margin-bottom: 10px;" class="btn btn-primary dropdown-toggle">Confirm</button></a>

                                        <a href="?shiftingID=<?php echo $result_user['OrderID']; ?>&OrderID=<?php echo $result_user['OrderID']; ?>"><button style=" margin-bottom: 10px;" class="btn btn-warning dropdown-toggle">Shifting</button></a> -->
                                        <!-- <a href=""><button style=" margin-bottom: 10px;" class="waves-effect waves-light btn">Complete</button></a> -->
                                        <!-- <a href="?cancelled=<?php echo $result_user['OrderID']; ?>&OrderID=<?php echo $result_user['OrderID']; ?>"><button style=" margin-bottom: 10px;" class="btn btn-danger dropdown-toggle">Cancelled</button></a> -->
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
            <div class="col-md-12">


                <!-- container -->
                <div class="table-content table-responsive col-md-6">
                    <div class="section-title">
                        <h3 class="title">Order Details </h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th class="product-name" width="5%">ID</th>
                                <th class="product-name" width="20%"> Product Name</th>
                                <th class="product-name" width="20%">Image</th>
                                <th class="product-name" width="25%">Price</th>
                                <th class="product-name" width="5%">Quantity</th>
                                <th class="product-name" width="25%">Total</th>

                            </tr>
                        </thead>
                        <?php

                        $get_orderdetails_admin = $ct->get_orderdetails_admin($order_id);

                        if ($get_orderdetails_admin) {

                            $subtotal = 0;
                            $qty = 0;
                            $i = 0;
                            while ($result_orderdetails = $get_orderdetails_admin->fetch_assoc()) {
                                $i++;
                                $qty += 1;





                        ?>
                                <tbody>
                                    <tr>
                                        <td class="product-name"><?php echo $i; ?></a>
                                        <td class="product-name"><?php echo $result_orderdetails['ProductName']; ?></td>
                                        <td class="product-name"><img src="uploads/<?php echo $result_orderdetails['Image']; ?>" width="100" height="100" /></td>
                                        <td class="product-name"><span class="amount"><?php echo $fm->format_currency($result_orderdetails['Price']) . ' ' . 'đ'; ?></span></td>
                                        <td class="product-name"><?php echo $result_orderdetails['Quantity']; ?></td>



                                        <td class="product-name"><?php
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
                        <?php

                        $get_ordered = $ct->get_orders($order_id);
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

                    <a href="order_details.php?OrderID=<?php echo $order_id; ?>">Refresh</a>
                </div>
                <div class="buttons-cart checkout--btn">

                    <a href="admin_order.php">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- /container -->
</div>
<!-- /SECTION -->