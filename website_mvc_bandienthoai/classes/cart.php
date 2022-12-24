<?php
// include '../lib/session.php';

use LDAP\Result;


 require_once ("$_SERVER[DOCUMENT_ROOT]/website_mvc_bandienthoai/carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;

$filepath = realpath(dirname(__FILE__));

include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
// include_once ("$_SERVER[DOCUMENT_ROOT]/website_mvc/lib/database.php");
// include_once ("$_SERVER[DOCUMENT_ROOT]/website_mvc/helpers/format.php");

class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sID = session_id();

        $query = "select product.*,promotion.*
        from promotiondetails INNER JOIN product ON product.ProductID = promotiondetails.ProductID
        INNER JOIN promotion ON promotion.PromotionID = promotiondetails.PromotionID
       
         where product.ProductID = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $image = $result["Image"];
        $price = $result["Price"];
        $promotionValue = $result["PromotionValue"];
        $product_price = $price - $promotionValue;

        $productName = $result["ProductName"];
        $query_amount_product = "select Amount  from product where ProductID='$id'";
        $result_amount_product=$this->db->select($query_amount_product)->fetch_assoc();
        $amount=$result_amount_product["Amount"];
        if($quantity>$amount){
            $alert = "The product is not in sufficient quantity";
            return $alert;
        }else{

        // echo session_id();
        //check xem sản phẩm có trong giỏ hàng chưa

        $checkcart = "Select *from cart where sID='$sID' and ProductID='$id'"; //câu truy vấn
        $check_cart = $this->db->select($checkcart); // thực hiện lệnh

        // if(mysqli_num_rows($check_cart)>0){
        if ($check_cart) {

            $alert = "Product already added";
            return $alert;
        } else {
            $query_insert = "Insert into cart(productID,sID,ProductName,Price,Quantity,Image)
        values('$id','$sID','$productName','$product_price','$quantity','$image')";
            // values('$id','$quantity','$sId','$result['image']','$result['price']','$result['productName']')";
            $insert_cart = $this->db->insert($query_insert);
            // header('Location:cart.php');
            if ($insert_cart) {

                echo "<script>window.location ='cart.php'</script>";
            } else {
                header('Location:404.php');
            }
            // }
        }
    }

    }
    public function get_product_cart()
    {
        // hiển thị sản phẩm theo session của người dùng đã thêm
        $sID = session_id();
        $query = "select *from cart where sID='$sID'";

        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($productID,$quantity, $cartID)
    {   
        // $query_amount_product  ="select amount"
        $productID = mysqli_real_escape_string($this->db->link, $productID);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);

        $query_amount_product = "select Amount  from product where ProductID='$productID'";
        $result_amount_product=$this->db->select($query_amount_product)->fetch_assoc();
        $amount=$result_amount_product["Amount"];
        if($quantity>$amount){
            $alert = "<span class='error'>The product is not in sufficient quantity</span>";
            return $alert;
        } else{

        $query = "update cart SET 
            Quantity ='$quantity'
           
             where CartID ='$cartID'";
        $result = $this->db->update($query);
        if ($result) {
            echo "<script>window.location='cart.php'</script>";
        } else {
            $msg = "<span class='error'>Product quantity update not successfully</span>";
            return $msg;
        }
    }
    }
    public function del_product_cart($cartID)
    {
        $cartID = mysqli_real_escape_string($this->db->link, $cartID);
        $query = "delete from cart where cartID='$cartID'";

        $result = $this->db->delete($query);
        if ($result) {
            echo "<script>window.location='cart.php'</script>";
        } else {
            $msg = "<span class='error'>Product Deleted not successfully</span>";
            return $msg;
        }
    }
    public function check_cart()
    {
        $sID = session_id();
        $query = "select *from cart where sID='$sID'";

        $result = $this->db->select($query);
        return $result;
    }
    public function get_user_by_orders($order_id)
    {

        $query = "select user.Username,orders.* from user, orders 
        where   orders.OrderID='$order_id' and orders.UserID=user.UserID ";

        $result = $this->db->select($query);
        return $result;
    }


    public function check_order($user_id)
    {

        $query = "select *from orders where UserID='$user_id' order by OrderID desc";

        $result = $this->db->select($query);
        return $result;
    }
    public function get_orders($order_id)
    {

        $query = "select *from orders where OrderID='$order_id'";

        $result = $this->db->select($query);
        return $result;
    }

    public function get_orderdetails($user_id, $order_id)
    {

        $query = "select orders.*,orderdetails.*,product.ProductName,product.Image from orders,orderdetails,product 
        where orders.UserID='$user_id' and orders.OrderID='$order_id' and orderdetails.OrderID=orders.OrderID and orderdetails.ProductID=product.ProductID";

        $result = $this->db->select($query);
        return $result;
    }
    public function get_orderdetails_admin($order_id)
    {

        $query = "select orders.*,orderdetails.*,product.ProductName,product.Image from orders,orderdetails,product,user 
        where orders.UserID=user.UserID and orders.OrderID='$order_id' and orderdetails.OrderID=orders.OrderID and orderdetails.ProductID=product.ProductID";

        $result = $this->db->select($query);
        return $result;
    }
    public function get_user_orderdetails($user_id, $order_id)
    {

        $query = "select * from orders 
        where orders.UserID='$user_id' and orders.OrderID='$order_id' ";

        $result = $this->db->select($query);
        return $result;
    }
    public function del_all_data_cart()
    {
        $sID = session_id();
        $query = "delete from cart where sID='$sID'";


        $result = $this->db->delete($query);
        return $result;
    }
    public function del_compare_($customer_id)
    {
        $sId = session_id();
        $query = "delete from tbl_compare where customer_id='$customer_id'";

        $result = $this->db->delete($query);
        return $result;
    }
    // public function insertOrder($user_id){
    //     $sID =session_id();
    //     $query ="select * from cart,user where sID='$sID' and UserID='$user_id'";

    //     $get_product= $this->db->select($query);
    //     if($get_product){
    //         while($result =$get_product->fetch_assoc()){
    //             $user_id=$user_id;
    //             $productID=$result['ProductID'];
    //             $productName=$result['ProductName'];
    //             $image=$result['Image'];
    //             $quantity=$result['Quantity'];
    //             $price=$result['Price'];
    //             $total=$quantity*$price;
    //             $address=$result['Address'];
    //             $receiver=$result['Username'];
    //             $phone=$result['Phone'];



    //             $query_order = "Insert into orders(UserID,ProductID,ProductName,Image,Quantity,Price,Total,Address,Receiver,Phone)
    //             values('$user_id','$productID','$productName','$image','$quantity','$price','$total','$address','$receiver','$phone')";

    //             $insert_order = $this->db->insert($query_order);


    //         }
    //     }

    // }
    public function insertOrder($user_id, $username, $email, $phone, $address)
    {
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $sID = session_id();
        $query = "select * from cart,user where sID='$sID' and UserID='$user_id'";

        $get_cart = $this->db->select($query);


        $total = 0;
        if ($get_cart) {
            while ($result = $get_cart->fetch_assoc()) {

                $quantity = $result['Quantity'];
                $price = $result['Price'];
                $total += $quantity * $price;
            }


            $query_orders = "Insert into orders(UserID,Total,Address,Receiver,Phone,Email,Payment_methods)
                values('$user_id','$total','$address','$username','$phone','$email','Payment on delivery')";

            $insert_orders = $this->db->insert($query_orders);
            $query_select_orders = "select * from orders order by OrderID desc limit 0,1  ";

            $get_orders = $this->db->select($query_select_orders);
            $result_order_id = $get_orders->fetch_assoc();
            $order_id = $result_order_id['OrderID'];
            //  echo $order_id; die;



            if ($insert_orders) {
                $sID = session_id();
                $query_cart_insert_orderdetails = "select * from cart,user where sID='$sID' and UserID='$user_id'";

                $get_order_details = $this->db->select($query_cart_insert_orderdetails);
                if ($get_order_details) {
                    while ($result_details = $get_order_details->fetch_assoc()) {

                        $productID = $result_details['ProductID'];
                        $price = $result_details['Price'];
                        $quantity = $result_details['Quantity'];
                        // echo $order_id.'   ';
                        // echo $productID.'  ';
                        // echo $price.'   ';
                        // echo $quantity;die;

                        $query_orderdetails = "Insert into orderdetails(OrderID,ProductID,Price,Quantity)
                        values('$order_id','$productID','$price','$quantity')";

                        $insert_orderdetails = $this->db->insert($query_orderdetails);


                        $query_amount_product = "select Amount from product where product.ProductID=$productID";
                        $get_amount_product = $this->db->select($query_amount_product);
                        $amount_product = $get_amount_product->fetch_assoc();
                        $amount = $amount_product['Amount'];
                        $update_amount = $amount - $quantity;



                        $query_update_amount_product = "update product SET 
                        Amount ='$update_amount'
                       
                         where ProductID ='$productID'";
                        $result_update_amount = $this->db->update($query_update_amount_product);
                    }
                }
            }
        }
    }
    public function insertOrder_online($user_id, $username, $email, $phone, $address)
    {
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $phone = mysqli_real_escape_string($this->db->link, $phone);
        $address = mysqli_real_escape_string($this->db->link, $address);
        $payment_method = 'Paid via vnpay';
        $sID = session_id();
        $query = "select * from cart,user where sID='$sID' and UserID='$user_id'";

        $get_cart = $this->db->select($query);


        $total = 0;
        if ($get_cart) {
            while ($result = $get_cart->fetch_assoc()) {

                $quantity = $result['Quantity'];
                $price = $result['Price'];
                $total += $quantity * $price;
            }


            $query_orders = "Insert into orders(UserID,Total,Address,Receiver,Phone,Email,Payment_methods)
                values('$user_id','$total','$address','$username','$phone','$email','$payment_method')";

            $insert_orders = $this->db->insert($query_orders);
            $query_select_orders = "select * from orders order by OrderID desc limit 0,1  ";

            $get_orders = $this->db->select($query_select_orders);
            $result_order_id = $get_orders->fetch_assoc();
            $order_id = $result_order_id['OrderID'];




            if ($insert_orders) {
                $sID = session_id();
                $query_cart_insert_orderdetails = "select * from cart,user where sID='$sID' and UserID='$user_id'";

                $get_order_details = $this->db->select($query_cart_insert_orderdetails);
                if ($get_order_details) {
                    while ($result_details = $get_order_details->fetch_assoc()) {

                        $productID = $result_details['ProductID'];
                        $price = $result_details['Price'];
                        $quantity = $result_details['Quantity'];


                        $query_orderdetails = "Insert into orderdetails(OrderID,ProductID,Price,Quantity)
                        values('$order_id','$productID','$price','$quantity')";

                        $insert_orderdetails = $this->db->insert($query_orderdetails);

                        //update số lượng sản phẩm


                        $query_amount_product = "select Amount from product where product.ProductID=$productID";
                        $get_amount_product = $this->db->select($query_amount_product);
                        $amount_product = $get_amount_product->fetch_assoc();
                        $amount = $amount_product['Amount'];
                        $update_amount = $amount - $quantity;



                        $query_update_amount_product = "update product SET 
                        Amount ='$update_amount'
                       
                         where ProductID ='$productID'";
                        $result_update_amount = $this->db->update($query_update_amount_product);
                    }
                }
            }
        }
    }

    public function getAmoutPrice($user_id)
    {

        $query = "select Total from orders where UserID='$user_id' ";
        $get_price = $this->db->select($query);
        return $get_price;
    }
    public function get_cart_ordered($user_id)
    {

        $query = "select *from orders where UserID='$user_id' ";
        $get_cart_ordered = $this->db->select($query);
        return $get_cart_ordered;
    }
    public function order_management()
    {
        $query = "select *from orders order by OrderDate desc ";
        $order_management = $this->db->select($query);
        return $order_management;
    }
    public function confirm($confirmID)
    {
        $confirmID = mysqli_real_escape_string($this->db->link, $confirmID);


        $query = "update orders SET 
            Status ='1'
           
             where OrderID ='$confirmID' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Order has been confirmed</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Order has been not confirmed</span>";
            return $msg;
        }
    }
    public function shifting($shiftingID)
    {
        $shiftingID = mysqli_real_escape_string($this->db->link, $shiftingID);


        $query = "update orders SET 
            Status ='2'
           
             where OrderID ='$shiftingID' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Orders are shipping</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>The order has not been shipped yet</span>";
            return $msg;
        }
    }
    public function received($received)
    {
        $received = mysqli_real_escape_string($this->db->link, $received);


        $query = "update orders SET 
            Status ='6'
           
             where OrderID ='$received' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Order received</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Order not received yet</span>";
            return $msg;
        }
    }
    public function not_received($not_received)
    {
        $not_received = mysqli_real_escape_string($this->db->link, $not_received);


        $query = "update orders SET 
            Status ='5'
           
             where OrderID ='$not_received' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='error'>Order not received yet</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Update order not successfully</span>";
            return $msg;
        }
    }
    public function request_resend($request_resend)
    {
        $request_resend = mysqli_real_escape_string($this->db->link, $request_resend);


        $query = "update orders SET 
            Status ='3'
           
             where OrderID ='$request_resend' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Request resend successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Request resend not successfully</span>";
            return $msg;
        }
    }
    public function resend($resend)
    {
        $resend = mysqli_real_escape_string($this->db->link, $resend);


        $query = "update orders SET 
            Status ='2'
           
             where OrderID ='$resend' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Resend successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Resend not successfully</span>";
            return $msg;
        }
    }
    public function cancelled($cancelled)
    {
        $cancelled = mysqli_real_escape_string($this->db->link, $cancelled);


        $query = "update orders SET 
            Status ='4'
           
             where OrderID ='$cancelled' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Order has been cancelled successful</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Order has been cancelled not successfully</span>";
            return $msg;
        }
    }
    public function deliveried($deliveried)
    {
        $deliveried = mysqli_real_escape_string($this->db->link, $deliveried);


        $query = "update orders SET 
            Status ='7'
           
             where OrderID ='$deliveried' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Order has been deliveried successful</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Order has been deliveried not successfully</span>";
            return $msg;
        }
    }
    public function shifted($id, $time, $total)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $total = mysqli_real_escape_string($this->db->link, $total);

        $query = "update orders SET 
            Status ='1'
           
             where OrderID ='$id' and OrderDate ='$time' and total ='$total'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Update order  successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Update order not  successfully</span>";
            return $msg;
        }
    }
    public function del_shifted($id, $time, $total)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $total = mysqli_real_escape_string($this->db->link, $total);

        $query = "delete from orders
           
             where OrderID ='$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "<span class='success'>Delete order  successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Delete order not  successfully</span>";
            return $msg;
        }
    }
    public function shifted_confirm($id, $time, $total)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $total = mysqli_real_escape_string($this->db->link, $total);

        $query = "Update orders set Status='2'
           
             where UserID='$id' and OrderDate ='$time' and Total ='$total'";
        $result = $this->db->update($query);
        return $result;
    }

    public function statistical()
    {
        // if (isset($_POST['time'])) {
        //     $time = $_POST['time'];
        // } else {
        //     $time = '';
        //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        // }
        // if ($time == '7 day') {
        //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        // } elseif ($time == '28 day') {
        //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
        // } elseif ($time == '90 day') {
        //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
        // } elseif ($time == '365 day') {
        //     $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        // }
        // $value['OrderID'];$value['Total'];
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        
        // $result_count = $get_count->fetch_assoc();
        // $count = $result_count['count'];


        $query = "Select * from orders where OrderDate BETWEEN '$subdays' AND '$now' ORDER BY OrderDate ASC";
        $result = $this->db->select($query);
        return $result;
        // if ($result) {
        //     while ($value = $result->fetch_assoc()) {
        //         $char_data[] = array(
        //             'date' => $value['OrderDate'],
        //             'order' => '10',
        //             'sales' => '10000000',
        //             'quantity' => $value['Quantity']
        //         );
        //     }
        //     echo $data = json_encode($char_data);
        // }
    }
    public function countOrder(){
      
        $query_count="Select count(OrderID) as count from orders ";
        $result =$this->db->select($query_count);
        return $result;
    }
    public function revenue(){
    
        $query_revenue="Select sum(Total) as revenue from orders ";
        $result =$this->db->select($query_revenue);
        return $result;
    }
    public function countQuantity(){
    
        $query_revenue="Select sum(Quantity) as TotalQuantity from orderdetails";
        $result =$this->db->select($query_revenue);
        return $result;
    }
}
