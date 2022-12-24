<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../admin/inc/sidebar.php'; ?>
<?php include_once '../classes/manufacturer.php'; ?>
 <?php
// $manufacturer = new manufacturer();
// if(!isset($_GET['ManufacturerID']) || $_GET('ManufacturerID')==NULL){
//     echo "<script>window.location='manufacturerlist.php'</script>";
// }
// else{
//     $id=$_GET['ManufacturerID'];
// }

?> 
<?php
    $manufacturer = new manufacturer();
    if(isset($_GET['ManufacturerID']) && $_GET['ManufacturerID']!=NULL){
        $id = $_GET['ManufacturerID'];
    }
    else {
        echo "<script>window.location ='manufacturerlist.php'</script>";
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {
        // The request is using the POST method
        $manufacturerName =$_POST['manufacturerName'];
        $description =$_POST['description'];
    
    
        $update_manufacturer = $manufacturer->update_manufacturer($manufacturerName,$description,$id); 
    }
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Edit manufacturer
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="manufacturerlist.php">Manufacturer</a></li>
            <li class="active">Edit Manufacturer</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Edit Manufacturer
                    </div>
                   
                   
                    <div class="card-content">
                    <?php
                    if(isset($update_manufacturer)){
                        echo $update_manufacturer;
                    }
                    ?>
                    <?php
                    $get_manufacturer =$manufacturer->getmanufacturerbyId($id);
                    if($get_manufacturer)
                    {
                        while($result=$get_manufacturer->fetch_assoc()){
                    
                    ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="manufacturerName">Manufacturer Name</label>
                                    <input placeholder="Edit manufacturer name" value="<?php echo $result['ManufacturerName']; ?>" name="manufacturerName" type="text" class="validate">
                                    
                                </div>
                                <!-- <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file"  />
                                    
                                </div> -->
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input  type="text" value="<?php echo $result['Description']; ?>" name="description" class="validate">
                                    
                                </div>
                                <div>
                                    <button type="submit" name="submit"  value="Submit" class="waves-effect waves-light btn">Edit</button>
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
