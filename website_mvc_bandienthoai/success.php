<?php
include 'inc/header.php';

?>
<style type="text/css">
   
    h2.success_order{
        text-align: center;
        color: red;

    }
    p.success_note{
        text-align: center;
        padding: 8px;
        font-size: 17px;
    }


</style>
<?php
// if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    
//     $customer_id = Session::get('customer_id');
//     $insertOrder =$ct->insertOrder($customer_id);
//     $delCart = $ct->del_all_data_cart();
//     header('Location:success.php');
// }
?>
<form action="" method="post">
    <div class="main">
        <div class="content">
            <div class="section group">
                <h2 class="success_order">Succes Order</h2>
                
            </div>
        </div>
        <?php
                $user_id = Session::get('UserID');
                $get_amount =$ct-> getAmoutPrice($user_id);
                if($get_amount){
                    $amount=0;
                    while($result=$get_amount->fetch_assoc()){
                        $price = $result['Total'];
                        $amount +=$price;
                    }
                }
                ?>
                <p class="success_note">Total Price You Have Bought From My Website : <?php 
                $vat=$amount*0.1; 
                 $total=$vat+$amount;
                 echo $fm->format_currency($total).' '.'đ' ?> </p>
                <p class="success_note">We will contact as soon as possible . Please see your order details here <a href="order.php">Click here</a></p>
       
    </div>
</form>
<?php
include 'inc/footer.php';
?>