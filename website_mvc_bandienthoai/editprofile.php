<?php
include 'inc/header.php';

?>
<?php
$login_check = Session::get('user_login');
if ($login_check == false) {
    header('Location:login.php');
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Save'])) {


    $id = Session::get('UserID');

    $UpdateUser = $us->update_user($_POST, $id);
}
?>
<style>
    .table-content table td input{
        width: 230px;

    }
</style>
<div class="">
    <h2>Update Profile User</h2>
    <?php
            if(isset($UpdateUser)){
                echo $UpdateUser;
            }
            ?>
    <div class="table-content table-responsive col-md-12">
        <form action="" method="post">
        <table>
            
            
            <?php
            $id = Session::get("UserID");
            $get_user = $us->show_user($id);
            if ($get_user) {
                while ($result = $get_user->fetch_assoc()) {

            ?>
                   <tr>
                    <td class="product-name">User Name</td>
                  
                    <td class="product-name"><input  type="text" name="username" value="<?php echo $result['Username']?>"></td>
                    
                </tr>
               
                <tr>
                    <td class="product-name">Email</td>
                   
                    <td class="product-name"><input  type="text" name="email" value="<?php echo $result['Email']?>"></td>
                   
                </tr>
               
                <tr>
                    <td class="product-name">Phone</td>
                  
                    <td class="product-name"><input  type="text" name="phone" value="<?php echo $result['Phone']?>"></td>
                   
                </tr>
                <tr>
                    <td class="product-name">Address</td>
                  
                    <td class="product-name"><input  type="text" name="address" value="<?php echo $result['Address']?>"></td>
                 
                </tr>
                <tr>
                    <td class="product-name">DisplayName</td>
                  
                    <td class="product-name"><input type="text" name="displayname" value="<?php echo $result['DisplayName']?>"></td>
                  
                </tr>
                <tr>
                    <td class="product-name" colspan="2"><input   type="submit" name="Save" value="Save" ></td>
                </tr>
               
                   
            <?php
                }
            }

            ?>

        </table>
        </form>
      

    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="buttons-cart--inner">
                <div class="buttons-cart">
                    <a href="index.php">Continue Shopping</a>
                </div>
                <div class="buttons-cart checkout--btn">
                <a href="profile.php">Profile</a>
					
				</div>
            </div>
        </div>
    </div>




</div>

<?php include 'inc/footer.php'; ?>