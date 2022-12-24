<?php include 'inc/header.php'; ?>
<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
    echo "<script>window.location ='login.php'</script>";
} else {
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
<style>
    h3.payment {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }

    .wrapper_method {
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }

    .wrapper_method a {
        padding: 10px;
        background:#ee4d2d;
        color: fff;


    }

    .wrapper_method h3 {
        margin-bottom: 20px;
    }
</style>
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3> Online Payment </h3>
                </div>

                <div class="clear"></div>
                <div class="wrapper_method">
                    <h3 class="payment">Choose online payment gateway</h3>
                    <form method="post" action="orderonline.php?paymentgateway=vnpay" >
                    <button class="btn btn-success" name="redirect" id="redirect">Checkout online by VNPAY</button>
                    </form></br>
                    <!-- <p>Loading</p> -->
       
                    <a style="background: gray;" href="cart.php">
                        << Previous</a>

                </div>



            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>