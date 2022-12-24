<?php
include '../classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  // The request is using the POST method
  $email = $_POST['email'];
  $password = md5($_POST['password']); //md5()

  $login_check = $class->login_admin($email, $password);
}
?>


<!DOCTYPE html>
<header>
  <style>
    body {
      background: #2d343d;
    }

    .login {
      margin: 20px auto;
      width: 300px;
      padding: 30px 25px;
      background: white;
      border: 1px solid #c4c4c4;
    }

    h1.login-title {
      margin: -28px -25px 25px;
      padding: 15px 25px;
      line-height: 30px;
      font-size: 25px;
      font-weight: 300;
      color: #ADADAD;
      text-align: center;
      background: #f7f7f7;

    }

    .login-input {
      width: 285px;
      height: 50px;
      margin-bottom: 25px;
      padding-left: 10px;
      font-size: 15px;
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .login-input:focus {
      border-color: #6e8095;
      outline: none;
    }

    .login-button {
      width: 100%;
      height: 50px;
      padding: 0;
      font-size: 20px;
      color: #fff;
      text-align: center;
      background: #f0776c;
      border: 0;
      border-radius: 5px;
      cursor: pointer;
      outline: 0;
    }

    .login-lost {
      text-align: center;
      margin-bottom: 0px;
    }

    .login-lost a {
      color: #666;
      text-decoration: none;
      font-size: 13px;
    }

    .error {
      display: inline-block;
      font-size: 24px;
      color: #D10024;
    }

    .success {
      display: inline-block;
      font-size: 24px;
      color: green;
    }
  </style>
</header>

<body>

  <form action="" class="login" method="POST">


    <h1 class="login-title">Login</h1>
    <?php
    if (isset($login_check)) {
      echo $login_check;
    } 
    ?>
    <input type="text" class="login-input" name="email" placeholder="Email Adress">

    <input type="password" class="login-input" name="password" placeholder="Password">


    <button type="submit" name="submit" class="login-button">Login</button>

  </form>
</body>

</html>