<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/manufacturer.php'; ?>
<?php include_once '../classes/product.php'; ?>
<!-- <?php include_once '../lib/database.php'; ?> -->
<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	// The request is using the POST method


	$insert_product = $pd->insert_product($_POST,$_FILES); //có images thì phải có $_FILES
}
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Add Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="productlist.php">Product</a></li>
            <li class="active">Add Product</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Add Product
                    </div>
                    <?php
                    if(isset($insert_product)){
                        echo $insert_product;
                    }
                    ?>
                    <div class="card-content">
                        <form action="productadd.php" method="post" enctype="multipart/form-data">
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
                                                <option value="<?php echo $result['ManufacturerID']; ?>"><?php echo $result['ManufacturerName']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group col-lg-4 ">
                                    <label for="productName">Product Name</label>
                                    <input placeholder="Enter product name" name="productName" type="text">

                                </div>


                                <div class="form-group col-lg-4">
                                    <label for="price">Price</label>
                                    <input placeholder="Enter price" name="price" type="text">

                                </div>

                                <div class="form-group col-lg-4">
                                    <label for="amount">Amount</label>
                                    <input name="amount" type="text">

                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input name="image" type="file">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="screen">Screen</label>
                                    <input name="screen" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="operating_system">Operating system</label>
                                    <input name="operating_system" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="front_camera">Front Camera</label>
                                    <input name="front_camera" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="back_camera">Back Camera</label>
                                    <input name="back_camera" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="cpu">CPU</label>
                                    <input name="cpu" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="ram">RAM</label>
                                    <input name="ram" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="rom">ROM</label>
                                    <input name="rom" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="sdcard">SDCard</label>
                                    <input name="sdcard" type="text">

                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="battery">Battery</label>
                                    <input name="battery" type="text">

                                </div>

                                <div class="form-group col-lg-12">
                                    <button type="submit" name="submit" value="Submit" class="waves-effect waves-light btn">Save</button>
                                </div>
                            </div>

                        </form>
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
