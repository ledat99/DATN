<?php include_once '../admin/inc/header.php'; ?>
<?php include_once '../admin/inc/sidebar.php'; ?>
<?php include_once '../classes/promotion.php'; ?>
<?php
$promotion = new promotion();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$promotionName =$_POST['promotionName'];
    $promotionType =$_POST['promotionType'];
    $promotionValue=$_POST['promotionValue'];
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
 


	$insert_promotion = $promotion->insert_promotion($promotionName,$promotionType,$promotionValue,$startDate,$endDate); 
}
?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Add promotion
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="promotionlist.php">Promotion</a></li>
            <li class="active">Add Promotion</li>
        </ol>

    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-action">
                        Add Promotion
                    </div>
                    <?php
                    if(isset($insert_promotion)){
                        echo $insert_promotion;
                    }
                    
                    ?>
                    <div class="card-content">
                        <form action="promotionadd.php" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <label for="promotionName">Promotion Name</label>
                                    <input placeholder="Enter promotion name" name="promotionName" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="promotionType">Promotion Type</label>
                                    <input placeholder="Enter promotion type" name="promotionType" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="promotionValue">Promotion Value</label>
                                    <input placeholder="Enter promotion value" name="promotionValue" type="text" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="startDate">Start Date</label>
                                    <input  name="startDate" type="date" class="validate">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="endDate">End Date</label>
                                    <input  name="endDate" type="date" class="validate">
                                    
                                </div>
                               
                                
                                <div>
                                    <button  value="Submit" class="waves-effect waves-light btn">Save</button>
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
