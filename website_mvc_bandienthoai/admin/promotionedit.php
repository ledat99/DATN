<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../admin/inc/sidebar.php'; ?>
<?php include_once '../classes/promotion.php'; ?>
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
    $promotion = new promotion();
    if(isset($_GET['PromotionID']) && $_GET['PromotionID']!=NULL){
        $id = $_GET['PromotionID'];
    }
    else {
        echo "<script>window.location ='promotionlist.php'</script>";
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit']) {
        // The request is using the POST method
        $promotionName =$_POST['promotionName'];
        $promotionType =$_POST['promotionType'];
        $promotionValue =$_POST['promotionValue'];
        $startDate =$_POST['startDate'];
        $endDate =$_POST['endDate'];
    
    
        $update_promotion = $promotion->update_promotion($promotionName,$promotionType,$promotionValue,$startDate,$endDate,$id); 
    }
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Edit promotion
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="promotionlist.php">Promotion</a></li>
            <li class="active">Edit Promotion</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Edit Promotion
                    </div>
                   
                   
                    <div class="card-content">
                    <?php
                    if(isset($update_promotion)){
                        echo $update_promotion;
                    }
                    ?>
                    <?php
                    $get_promotion =$promotion->get_promotionbyId($id);
                    if($get_promotion)
                    {
                        while($result=$get_promotion->fetch_assoc()){
                    
                    ?>
                       <form action="" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="promotionName">Promotion Name</label>
                                    <input placeholder="Enter manufacturer name" value="<?php echo $result['PromotionName']; ?>" name="promotionName" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="promotionType">Promotion Type</label>
                                    <input placeholder="Enter manufacturer name" value="<?php echo $result['PromotionType']; ?>" name="promotionType" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="promotionValue">Promotion Value</label>
                                    <input placeholder="Enter manufacturer name" value="<?php echo $result['PromotionValue']; ?>" name="promotionValue" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" name="startDate" value="<?php echo date('Y-m-d',strtotime($result['StartDate'])) ?>" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input type="date" name="endDate" value="<?php echo date('Y-m-d',strtotime($result['EndDate'])) ?>"  class="validate">
                                    
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
