<?php
//thanh toán vnpay
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "6FR1CK3O"; //Website ID in VNPAY System
$vnp_HashSecret = "GJHYEPEZSLLZDZGZBRFOUPHPEQIACEQY"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/website_mvc_bandienthoai/thankyou.php";
// http://localhost/website_mvc_bandienthoai/onlinepayment.php
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
//end config file




$vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Payment orders vnpay';
$vnp_OrderType = 'other';
$vnp_Amount = $_POST['total_paymentgateway'] * 100; 
$vnp_Locale = 'vn';
$vnp_BankCode ='NCB' ;
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
//Billing
// $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
// $vnp_Bill_Email = $_POST['txt_billing_email'];
// $fullName = trim($_POST['txt_billing_fullname']);
// if (isset($fullName) && trim($fullName) != '') {
//     $name = explode(' ', $fullName);
//     $vnp_Bill_FirstName = array_shift($name);
//     $vnp_Bill_LastName = array_pop($name);
// }
// $vnp_Bill_Address=$_POST['txt_inv_addr1'];
// $vnp_Bill_City=$_POST['txt_bill_city'];
// $vnp_Bill_Country=$_POST['txt_bill_country'];
// $vnp_Bill_State=$_POST['txt_bill_state'];
// // Invoice
// $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
// $vnp_Inv_Email=$_POST['txt_inv_email'];
// $vnp_Inv_Customer=$_POST['txt_inv_customer'];
// $vnp_Inv_Address=$_POST['txt_inv_addr1'];
// $vnp_Inv_Company=$_POST['txt_inv_company'];
// $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
// $vnp_Inv_Type=$_POST['cbo_inv_type'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
    // "vnp_ExpireDate"=>$vnp_ExpireDate,
    // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    // "vnp_Bill_Email"=>$vnp_Bill_Email,
    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    // "vnp_Bill_Address"=>$vnp_Bill_Address,
    // "vnp_Bill_City"=>$vnp_Bill_City,
    // "vnp_Bill_Country"=>$vnp_Bill_Country,
    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    // "vnp_Inv_Email"=>$vnp_Inv_Email,
    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    // "vnp_Inv_Address"=>$vnp_Inv_Address,
    // "vnp_Inv_Company"=>$vnp_Inv_Company,
    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    // "vnp_Inv_Type"=>$vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}


$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        
        include 'lib/session.php';
        Session::init();
//load autofile
spl_autoload_register(function ($className) {
	// 	$filepath = realpath(dirname(__FILE__));
	// include_once($filepath . '/../classes/' . $className . '.php');
	// include_once "classes/" . $className . ".php";
	include_once "classes/" . $className . ".php";
});

$ct = new cart();
        $ct= new cart();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$user_id= Session::get('UserID');


	$username =$_POST['username'];
    $email =$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

	$insert_Order =$ct->insertOrder_online($user_id,$username,$email,$phone,$address);
	$delCart = $ct->del_all_data_cart();
		// echo "<script>window.location ='success.php'</script>";

        header('Location: ' . $vnp_Url);
        die();
}
       
    } else {
        echo json_encode($returnData);
    }

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
vnp_TxnRef=1670640765&
vnp_SecureHash=1a1211c722bdfc53b7f95f4567f1a859bee5031a0a2b91913e4751fea8da0987fe24193a906907b4a206742627b33cecc0d025030a71ee4d09be17071d47e517 -->