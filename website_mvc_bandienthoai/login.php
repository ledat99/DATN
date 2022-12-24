<?php
include 'lib/session.php';

Session::init();
?>
<?php

spl_autoload_register(function ($className) {
  // 	$filepath = realpath(dirname(__FILE__));
  // include_once($filepath . '/../classes/' . $className . '.php');
  // include_once "classes/" . $className . ".php";
  include_once "classes/" . $className . ".php";
});



?>
<?php
						$login_check = Session::get('user_login');
						if($login_check){
              echo "<script>window.location ='index.php'</script>";
						}
						?>
  <?php
$us = new user();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  // The request is using the POST method
  $login_users = $us->login_users($_POST);
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: rgb(141,194,111);
  background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.error{
  color: #D10024;
    font-size: 18px;
}
.success{
  color: green;
  font-size: 18px;
}

</style>
</head>
<body>

<div class="login-page">
  <div class="form">
  
    <form action="" method="post" class="login-form">
  
<?php
        if (isset($login_users)) {
          echo $login_users;
        }
        ?>
      <input type="email" name="email" placeholder="Enter email"/>
      <input type="password" name="password" placeholder=" Enter password"/>
      <button type="submit" name="login" >Login</button>
      <p class="">Not registered? <a class="message" href="register.php">Create an account</a></p>
    </form>
  </div>
</div>

</body>

</html>