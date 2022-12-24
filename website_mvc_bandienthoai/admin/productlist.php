<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>
<?php include_once '../classes/manufacturer.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php include_once '../helpers/format.php'; ?>
<?php
$pd = new product();

if (isset($_GET['ProductID'])) {


	$id = $_GET['ProductID'];
	$del_product = $pd->del_product($id);
}


?>
<div id="page-wrapper">
	<div class="header">
		<h1 class="page-header">
			Product
		</h1>
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="productlist.php">Product</a></li>
			<li class="active">List product</li>
		</ol>

	</div>

	<div id="page-inner">

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="card">
					<div class="card-action">
						List product
					</div>
					<div class="card-content">
						<?php
						if (isset($del_product)) {
							echo $del_product;
						}
						?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Serial No</th>
										<th>ManufacturerName </th>
										<th>ProductName</th>
										<th>Price </th>
										<th>Amount</th>
										<th>Image</th>
										<th>Screen</th>
										<th>Operating System</th>
										<th>Front Camera </th>
										<th>Back Camera</th>
										<th>CPU </th>
										<th>RAM</th>
										<th>ROM</th>
										<th>SDCard</th>
										<th>Battery</th>
									
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$show_product = $pd->show_product();
									if ($show_product) {
										$i = 0;
										while ($result = $show_product->fetch_assoc()) {
											$i++;



									?>
											<tr class="odd gradeX">
												<td><?php echo $i; ?></td>
												<td><?php echo $result['ManufacturerName']; ?></td>
												<td><?php echo $result['ProductName']; ?></td>
												<td><?php echo $fm->format_currency($result['Price']) . '' . 'đ'; ?></td>
												<td><?php echo $result['Amount']; ?></td>
												<td><img src="uploads/<?php echo $result['Image']; ?>" width="100px" height="100px"/></td>
												<td><?php echo $result['Screen']; ?></td>
												<td><?php echo $result['OperatingSystem']; ?></td>
												<td><?php echo $result['FrontCamera']; ?></td>
												<td><?php echo $result['BackCamera']; ?></td>
												<td><?php echo $result['CPU']; ?></td>
												<td><?php echo $result['RAM']; ?></td>
												<td><?php echo $result['ROM']; ?></td>
												<td><?php echo $result['SDCard']; ?></td>
												<td><?php echo $result['Battery']; ?></td>
												
												<td>
													<a href="productedit.php?ProductID=<?php echo $result['ProductID']; ?>"><button class="btn btn-primary dropdown-toggle">Edit</button></a>
													<a onclick="return confirm('Are you want to delete?')" href="?ProductID=<?php echo $result['ProductID']; ?>"><button class="btn btn-danger dropdown-toggle">Delete</button></a>
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
<!-- /. WRAPPER  --
