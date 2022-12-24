<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../admin/inc/sidebar.php'; ?>
<?php include_once '../classes/manufacturer.php'; ?>
<?php
$manufacturer = new manufacturer();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$manufacturerName =$_POST['manufacturerName'];
    $description =$_POST['description'];


	$insert_manufacturer = $manufacturer->insert_manufacturer($manufacturerName,$description); 
}
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Add manufacturer
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="manufacturerlist.php">Manufacturer</a></li>
            <li class="active">Add Manufacturer</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Add Manufacturer
                    </div>
                    <?php
                    if(isset($insert_manufacturer)){
                        echo $insert_manufacturer;
                    }
                    ?>
                    <div class="card-content">
                        <form action="manufactureradd.php" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="manufacturerName">Manufacturer Name</label>
                                    <input placeholder="Enter manufacturer name" name="manufacturerName" type="text" class="validate">
                                    
                                </div>
                                <!-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"  />
                                    
                                </div> -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input  type="text" name="description" class="validate">
                                    
                                </div>
                                <div>
                                    <button type="submit"  value="Submit" class="waves-effect waves-light btn">Save</button>
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
