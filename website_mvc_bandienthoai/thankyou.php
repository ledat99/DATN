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
if (isset($_GET['vnp_Amount']) ) {
    // $vnp_Amount = $_GET['vnp_Amount'];
    // $vnp_BankCode = $_GET['vnp_BankCode'];
    // $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    // $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    // $vnp_PayDate = $_GET['vnp_PayDate'];
    // $vnp_TmnCode = $_GET['vnp_TmnCode'];
    // $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    // $vnp_CardType = $_GET['vnp_CardType'];
    // $OrderID =
    
   
    
}
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
<!-- vnp_Amount=25000000&
vnp_BankCode=NCB&
vnp_BankTranNo=VNP13900170&
vnp_CardType=ATM&
vnp_OrderInfo=Payment+orders+vnpay&
vnp_PayDate=20221210095533&
vnp_ResponseCode=00&
vnp_TmnCode=6FR1CK3O&
vnp_TransactionNo=13900170&
vnp_TransactionStatus=00&
vnp_TxnRef=1670640765& -->