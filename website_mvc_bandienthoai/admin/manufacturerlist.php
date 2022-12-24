<?php include_once '../admin/inc/header.php';?>
<?php include_once '../admin/inc/sidebar.php';?>
<?php include_once '../classes/manufacturer.php'; ?>
<?php
$manufacturer = new manufacturer();
if(isset($_GET['delid']) ){
    $id = $_GET['delid'];
    $del_manufacturer =$manufacturer->del_manufacturer($id);
}
// else {
//     echo "<script>window.location ='manufacturerlist.php'</script>";
// }
?>
<div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Manufacturer
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="manufacturerlist.php">Manufacturer</a></li>
					  <li class="active">List Manufacturer</li>
					</ol> 
									
		</div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             List Manufacturer
                        </div>
                        <div class="card-content">
                        <?php
                    if(isset($del_manufacturer)){
                        echo $del_manufacturer;
                    }
                    ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Manufacturer Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $show_manufacturer = $manufacturer->show_manufacturer();
                                        if($show_manufacturer){
                                            $i=0;
                                            while($result=$show_manufacturer->fetch_assoc()){
                                                $i++;

                                            
                                        
                                         ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['ManufacturerName']; ?></td>
                                            <td><?php echo $result['Description']; ?></td>
                                            <td>
                                            <a href="manufactureredit.php?ManufacturerID=<?php echo $result['ManufacturerID']; ?>"><button class="btn btn-primary dropdown-toggle">Edit</button></a>
                                            <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['ManufacturerID']; ?>"><button class="btn btn-danger dropdown-toggle">Delete</button></a>
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


