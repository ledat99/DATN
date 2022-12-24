<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/manufacturer.php'; ?>
<?php include '../classes/product.php'; ?>
<!-- <?php include_once '../lib/database.php'; ?> -->

<?php
    $pd = new product();
    if(isset($_GET['ProductID']) && $_GET['ProductID']!=NULL){
        $id = $_GET['ProductID'];
    }
    else {
        echo "<script>window.location ='productlist.php'</script>";
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {
      
    
        $updateProduct = $pd->update_product($_POST, $_FILES, $id); 
    }
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="productlist.php">Product</a></li>
            <li class="active">Edit Product</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Edit Product
                    </div>
                    <?php
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
                    ?>
                    <div class="card-content">
                    <?php
                    $get_product_by_id =$pd->getproductbyId($id);
                    if($get_product_by_id)
                    {
                        while($result_product=$get_product_by_id->fetch_assoc()){
                    
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group ">
                                    <label for="manufacturer">Manufacturer</label>
                                    <select style="display: block;" id="select" name="manufacturer">
                                        <option>Select manufacturer</option>
                                        <?php
                                        $manufacturer = new manufacturer();
                                        $manufacturerlist = $manufacturer->show_manufacturer();
                                        if ($manufacturerlist) {
                                            while ($result = $manufacturerlist->fetch_assoc()) {

                                        ?>
                                                <option 
                                                <?php
                                                if($result['ManufacturerID']==$result_product['ManufacturerID']){
                                                    echo 'selected';
                                                }
                                                ?>
                                                value="<?php echo $result['ManufacturerID']; ?>"><?php echo $result['ManufacturerName']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-lg-4 ">
                                    <label for="productName">Product Name</label>
                                    <input value="<?php echo $result_product['ProductName']; ?>" name="productName" type="text">

                                </div>


                                <div class="form-group col-lg-4">
                                    <label for="price">Price</label>
                                    <input value="<?php echo $result_product['Price']; ?>" name="price" type="text">

                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="amount">Amount</label>
                                    <input value="<?php echo $result_product['Amount']; ?>" name="amount" type="text">

                                </div>
                                <div class="form-group">
                                <label for="productName">Image</label>
                                <img src="uploads/<?php echo $result_product['Image']; ?>" width="100px" height="100px"/><br/>
                                    <input value="<?php echo $result_product['ProductName']; ?>" name="image" type="file">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="screen">Screen</label>
                                    <input value="<?php echo $result_product['Screen']; ?>" name="screen" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="operating_system">Operating system</label>
                                    <input value="<?php echo $result_product['OperatingSystem']; ?>" name="operating_system" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="front_camera">Front Camera</label>
                                    <input value="<?php echo $result_product['FrontCamera']; ?>" name="front_camera" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="back_camera">Back Camera</label>
                                    <input value="<?php echo $result_product['BackCamera']; ?>" name="back_camera" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="cpu">CPU</label>
                                    <input value="<?php echo $result_product['CPU']; ?>" name="cpu" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="ram">RAM</label>
                                    <input value="<?php echo $result_product['RAM']; ?>" name="ram" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="rom">ROM</label>
                                    <input value="<?php echo $result_product['ROM']; ?>" name="rom" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="sdcard">SDCard</label>
                                    <input value="<?php echo $result_product['SDCard']; ?>" name="sdcard" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="battery">Battery</label>
                                    <input value="<?php echo $result_product['Battery']; ?>" name="battery" type="text">

                                </div>
                              



                                <div class="form-group col-lg-12">
                                    <button type="submit" name="submit" value="Submit" class="waves-effect waves-light btn">Save</button>
                                </div>
                            </div>

                        </form>
                        <?php
                        }
                    }
                    ?>
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
