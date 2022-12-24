<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();

include_once '../lib/database.php';
include_once '../helpers/format.php';

class adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($email, $password)
    {
        $email = $this->fm->validation($email);
        $password = $this->fm->validation($password);

        $email = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, $password);
        

        if (empty($email) || empty($password)) {
          
          
            $msg="<span class='error'>Email and password must be not empty</span>";
            return $msg;
        } else {
            $query = "select * from user where email = '$email' and password = '$password' and Role=1 limit 1";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc(); //fetch_array
                Session::set('adminlogin', true);
                Session::set('adminId', $value['UserID']);
                Session::set('adminEmail', $value['Email']);
                Session::set('adminPassword', $value['Password']);
                Session::set('displayName',$value['DisplayName']);
                header('Location:index.php');
            } else {
              
                $msg="<span class='error'>Email and password not match</span>";
                return $msg;
               
            }
        }
    }
    // public function admin_check(){

    // }
    // public function login_destroy(){

    // }
}
