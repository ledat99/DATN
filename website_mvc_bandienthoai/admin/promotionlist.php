<?php include_once '../admin/inc/header.php';?>
<?php include_once '../admin/inc/sidebar.php';?>
<?php include_once '../classes/promotion.php'; ?>
<?php
$promotion = new promotion();
if(isset($_GET['delid']) ){
    $id = $_GET['delid'];
    $del_promotion =$promotion->del_promotion($id);
}
// else {
//     echo "<script>window.location ='promotionlist.php'</script>";
// }
?>
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Promotion
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="promotionlist.php">Promotion</a></li>
					  <li class="active">List promotion</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             List Promotion
                        </div>
                        <div class="card-content">
                        <?php
                    if(isset($del_promotion)){
                        echo $del_promotion;
                    }
                    ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Promotion Name</th>
                                            <th>Promotion Type</th>
                                            <th>Promotion Value</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $show_promotion = $promotion->show_promotion();
                                        if($show_promotion){
                                            $i=0;
                                            while($result=$show_promotion->fetch_assoc()){
                                                $i++;

                                            
                                        
                                         ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['PromotionName']; ?></td>
                                            <td><?php echo $result['PromotionType']; ?></td>
                                            <td><?php echo $result['PromotionValue']; ?></td>
                                            
                                            <td><?php echo $result['StartDate']; ?></td>
                                            <td><?php echo $result['EndDate']; ?></td>
                                            <td>
                                            <a href="promotionedit.php?PromotionID=<?php echo $result['PromotionID']; ?>"><button class="btn btn-primary dropdown-toggle">Edit</button></a>
                                            <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['PromotionID']; ?>"><button class="btn btn-danger dropdown-toggle">Delete</button></a>
                                            </td>
                                        
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                      
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->


