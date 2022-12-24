<?php

include 'inc/header.php';
include 'inc/slider.php';
?>

<div id="store" class="col-md-12">


	<!-- <div class="section-title">
		<h3 class="title">New Products</h3>
		<div class="section-nav">
		<?php
		$getmanufacturer_limit = $manufacturer->show_manufacturer_limit();
		if ($getmanufacturer_limit) {
			while ($result_manufacturer = $getmanufacturer_limit->fetch_assoc()) {

		?>
			<ul class="section-tab-nav tab-nav">
				
						<li ><a data-toggle="tab" href="#tab1"><?php echo $result_manufacturer['ManufacturerName']; ?> </a></li>
					
			</ul>
	<?php
			}
		}
	?>
		</div>
	</div>
	 -->
	<div class="section-title">
		<h3 class="title">All Products</h3>
		<!-- <div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Apple</a></li>
									<li><a data-toggle="tab" href="#tab1">XiaoMi</a></li>
									<li><a data-toggle="tab" href="#tab1">Samsung</a></li>
									<li><a data-toggle="tab" href="#tab1">Oppo</a></li>
								</ul>
							</div> -->
	</div>


	<!-- store products -->
	<div class="row">
		<?php
		$product_new = $product->getproduct_new();
		if ($product_new) {
			while ($result = $product_new->fetch_assoc()) {
				// foreach($pd_new as $product_new)

		?>
				<!-- product -->
				<div class="col-md-4 col-xs-6">
					<div class="product">
						<div class="product-img">
							<!-- <a href="details.php?ProductID=<?php echo $result['ProductID']; ?>"> -->
							<a href="details.php?ProductID=<?php echo $result['ProductID']; ?>"><img src="admin/uploads/<?php echo $result['Image']; ?> " width="100%" /></a>

						</div>
						<div class="product-body">
							<!-- <p class="product-category">Category</p> -->
							<h3 class="product-name"><a href="details.php?ProductID=<?php echo $result['ProductID']; ?>"><?php echo $result['ProductName']; ?></a></h3>
							<!-- <?php $product_price = $result['Price'] - $result['PromotionValue']; ?> -->
							<h4 class="product-price"><?php $product_price = $result['Price'] - $result['PromotionValue'];
														echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result['Price']) . ' ' . 'đ'; ?></del></h4>

							<!-- <div class="product-btns">
								<button class="add-to-wishlist"><a href="?wlist=<?php echo $result['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
								<button class="add-to-compare"><a href="?compare=<?php echo $result['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
								<button class="quick-view"><a href="details.php?ProductID=<?php echo $result['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
							</div> -->
						</div>
						<!-- <div class="add-to-cart"> -->
						<!-- <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button> -->
						<!-- </div> -->
					</div>
				</div>
				<!-- /product -->
		<?php
			}
		}
		?>






	</div>
	<!-- /store products -->



	<!-- store bottom filter -->
	<div class="store-filter clearfix">
		<!-- <span class="store-qty">Showing 20-100 products</span> -->
		<ul class="store-pagination">
			<?php
			$product_all = $product->get_all_product();
			$product_count = mysqli_num_rows($product_all);
			$number_page = ceil($product_count / 3);



			for ($i = 1; $i <= $number_page; $i++) {
				echo '<li ><a href="index.php?page=' . $i . '">' . $i . '</li>';
			}

			?>
			<!-- <li class="active">1</li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
		</ul>
	</div>
	<!-- /store bottom filter -->
</div>
<!-- /STORE -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<?php
include 'inc/footer.php';
?>