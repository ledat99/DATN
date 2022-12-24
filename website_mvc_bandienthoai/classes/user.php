<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');

// include_once '../lib/database.php';
// include_once '../helpers/format.php';

include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');


class user
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
	public function insert_comment(){
        // $comment_content = mysqli_real_escape_string($this->db->link, $data['comment_content']);
        // $star = mysqli_real_escape_string($this->db->link, $data['star']);
        // $productID = mysqli_real_escape_string($this->db->link, $data['productID']);
        // $userID = mysqli_real_escape_string($this->db->link, $data['userID']);

        $comment_content =$_POST['comment_content'];
        // var_dump($_POST['star']);
        
        // if($_POST['star']==NULL){
           
        //     $star="";
        // }else{
        //     $star =$_POST['star'];

        // }
        if(!isset($_POST['star'])){ 
            $alert = "<span class='error'>You need to enter the rating star number</span>";
        return $alert;
            
        } else{$star =$_POST['star'];}
        
        $productID=$_POST['product_id_comment'];
        $userID=$_POST['user_id'];
        if ($userID=="") {
            echo "<script>window.location ='login.php'</script>";
    }elseif($comment_content == ""  || $productID == "")
    {
        
            // $alert = "<span class='error'> You need login to comment</span>";
            // return $alert;
            $alert = "<span class='error'> Please leave a comment</span>";
        return $alert;
        
    }else
    {
        $query = "Insert into review(ProductID,UserID,StarRating,Comment)
        values('$productID','$userID','$star','$comment_content')";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<span class='success'> Comment successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Comment  not successfully</span>";
            return $alert;
        }
    }

    }

    public function insert_user($data)
    {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $displayname = mysqli_real_escape_string($this->db->link, $data['displayname']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

        if ($username == "" || $email == "" || $phone == ""
            || $address == "" || $displayname == "" || $password == "") {
            $alert = "<span class='error'> Field must be not empty</span>";
            return $alert;
        } else {
            $check_email = "select * from user where email='$email' limit 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'> Email already existed </span> ";
                echo $alert;
            } else {
                $query = "Insert into user(Username,Email,Phone,Address,DisplayName,Password,Role)
                values('$username','$email','$phone','$address','$displayname','$password','2')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> User Created successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>User Created  not successfully</span>";
                    return $alert;
                }
            }
        }
    }

    public function login_users($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        
        if ($email == "" || $password == "") {
            
            $alert = "<span class='error'> Email and password must be not empty</span>";
            return $alert;
        } else {
            $check_login_user = "select * from user where Email='$email' and Password='$password' and Role='2' ";
            $result_check = $this->db->select($check_login_user);
            if ($result_check!= false) {//neu khong sai
                $value =$result_check->fetch_assoc();
              

                Session::set('user_login', true);
                Session::set('UserID', $value['UserID']);
                Session::set('Email', $value['Email']);
                Session::set('Password', $value['Password']);
                Session::set('displayName',$value['DisplayName']);
                
                echo "<script>window.location ='index.php'</script>";
            } else {
                $alert = "<span class='error'> Email or password doesn't match</span>";
                return $alert;
                
            }
        }

    }
    public function show_user($id){
        $query = "select * from user where UserID='$id'";
        $result = $this->db->select($query);
        return $result;

    }
    public function update_user($data,$id){
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $displayname = mysqli_real_escape_string($this->db->link, $data['displayname']);
       
        if ($username == "" ||  $email == "" || $phone == "" || $address == ""  || $displayname == "" ) {
            $alert = "<span class='error'> Field must be not empty</span>";
            return $alert;
        } else {
           
                
                $query = "Update user set Username='$username',Email='$email',Phone='$phone',Address='$address',Displayname='$displayname'
                 where UserID='$id' ";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>User updated successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>User updated not successfully</span>";
                    return $alert;
                }
            
        }

    }
}
