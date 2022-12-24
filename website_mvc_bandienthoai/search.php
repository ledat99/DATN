<?php

include 'inc/header.php';
include 'inc/slider.php';
?>
<?php

if ( isset($_GET['search'])) {
	// The request is using the POST method
	$key= $_GET['search'];


	
}
// if ( isset($GET['key'])) {
	
// 	$key= $_GET['key'];


	
// }
?>
<div id="store" class="col-md-12">

	<div class="section-title">
	<?php
	$count_search_product = $product->count_search_product($key);
	if ($count_search_product) {
		while ($result_count = $count_search_product->fetch_assoc()) {
	?>
		<h3 class="title">Found <?php echo $result_count['count']; ?> results with keyword "<?php echo $key; ?>"</h3>
		<?php
		}
	}
		?>
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
	$search_product = $product->search_product($key);
		if ($search_product) {
			while ($result = $search_product->fetch_assoc()) {
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
	<!-- <div class="store-filter clearfix"> -->
		<!-- <span class="store-qty">Showing 20-100 products</span> -->
		<!-- <ul class="store-pagination"> -->
		<?php
		// 	$product_search_all = $product->search_product($key);
		// 	if ($product_search_all != NULL) {
		// 	$product_count_seach = mysqli_num_rows($product_search_all);
		// 	$number_page = ceil($product_count_seach / 3);



		// 	for ($i = 1; $i <= $number_page; $i++) {
		// 		echo '<li ><a href="search.php?key=' . $key . '&page=' . $i . '">' . $i . '</li>';
		// 	}
		// }else {
		
		// 	echo '<h3 class="title">No results were found </h3>';
		// }

			?>
			
		<!-- </ul> -->
		
	<!-- </div> -->
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