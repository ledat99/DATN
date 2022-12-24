<?php include 'inc/header.php'; ?>
<?php
$pd = new product();
if (isset($_GET['ProductID']) && $_GET['ProductID'] != NULL) {
	$id = $_GET['ProductID'];
} else {
	echo "<script>window.location ='404.php'</script>";
}

// $customer_id = Session::get('customer_id');
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
// 	// The request is using the POST method
// 	$productid = $_POST['productid'];
// 	$insertCompare = $product->insertCompare($productid, $customer_id);
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])) {

// 	$productid = $_POST['productid'];

// 	$insertWishlist = $product->insertWishlist($productid, $customer_id);
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	$quantity = $_POST['quantity'];

	$Addtocart = $ct->add_to_cart($quantity, $id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {



	$comment = $us->insert_comment();
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($id)  ) {



// 	$detail_comment = $product->get_details_comment($id);
// }
?>

<!-- SECTION -->
<div class="section">
	<?php

	$product_details = $product->get_details($id);

	if ($product_details) {

		while ($result = $product_details->fetch_assoc()) {


	?>
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-4 ">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="admin/uploads/<?php echo $result['Image']; ?>" />
							</div>


						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs   col-md-pull-5 -->
					<div class="col-md-4 info_product ">
						<h2>Specifications</h2>
						<ul class="info">
							<li>
								<p>Screen</p>
								<p><?php echo $result['Screen']; ?></p>
							</li>
							<li>
								<p>Operating System</p>
								<p><?php echo $result['OperatingSystem']; ?></p>
							</li>
							<li>
								<p>Front Camera</p>
								<p><?php echo $result['FrontCamera']; ?></p>
							</li>
							<li>
								<p>Back Camera</p>
								<p><?php echo $result['BackCamera']; ?></p>
							</li>
							<li>
								<p>CPU</p>
								<p><?php echo $result['CPU']; ?></p>
							</li>
							<li>
								<p>RAM</p>
								<p><?php echo $result['RAM']; ?></p>
							</li>
							<li>
								<p>ROM</p>
								<p><?php echo $result['ROM']; ?></p>
							</li>
							<li>
								<p>SDCard</p>
								<p><?php echo $result['SDCard']; ?></p>
							</li>
							<li>
								<p>Pin</p>
								<p><?php echo $result['Battery']; ?></p>
							</li>

						</ul>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-4">

						<div class="product-details">


							<h2 class="product-name"><?php echo $result['ProductName']; ?></h2>

						
							<div>
								<h3 class="product-price"><?php $product_price = $result['Price'] - $result['PromotionValue'];
															echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result['Price']) . ' ' . 'đ'; ?></del></h3>
								<span class="product-available"><?php if ($result['Amount'] > 0) {
																	echo 'In Stock';
																} else {
																	echo '<div>Out of stock</div>';
																} ?></span>
							</div>
							<?php if($result['Amount'] >0) {?>
							<div class="add-to-cart">
								<form action="" method="post">
									<div class="qty-label">
										Qty
										<div class="input-number">
											<input name="quantity" type="number" value="1" min="1">
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
									</div>
									<input type="hidden" name="ProductID" value="<?php echo $id; ?>">

									<button type="submit" name="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</form>
								<?php
								if (isset($Addtocart)) {
									echo '<span style="display: inline-block;
									font-size: 24px;
									margin-top: 10px;
									margin-bottom: 15px;
									color: #D10024;" >
									'.$Addtocart.'</span>';
								}
								?>
							</div>
							<?php } ?>
							<!-- '<span style="display: inline-block;
									font-size: 24px;
									margin-top: 10px;
									margin-bottom: 15px;
									color: #D10024;" >
									</span>' -->

							<!-- <ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul> -->



						</div>
					</div>
					<div class="col-md-12">
						<?php
						// $login_check = Session::get('user_login');
						// if ($login_check == false) {
						//     echo "<script>window.location ='login.php'</script>";
						// } else {
						// }
						$user_id = Session::get('UserID')
						?>
						<p>Leave your comment</p>
						<div class="comment-area">
							<div class="guiBinhLuan">
								<?php
								if (isset($comment))
									echo $comment;
								?>
								<form action="" method="post">
									<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
									<input type="hidden" value="<?php echo $id ?>" name="product_id_comment">
									<div class="stars">

										<input class=" star star-5" id="star-5" value="5" type="radio" name="star" />
										<label class="star star-5" for="star-5" ></label>

										<input class="star star-4" id="star-4" value="4" type="radio" name="star"  />
										<label class="star star-4" for="star-4"></label>

										<input class=" star star-3" id="star-3" value="3" type="radio" name="star"  />
										<label class="star star-3" for="star-3" ></label>

										<input class="star star-2" id="star-2" value="2" type="radio" name="star"  />
										<label class="star star-2" for="star-2" ></label>

										<input class="star star-1" id="star-1" value="1" type="radio" name="star"  />
										<label class="star star-1" for="star-1" ></label>

									</div>
									<textarea maxlength="250" name="comment_content" id="inpBinhLuan" placeholder="Write your thoughts here..."></textarea>
									<input id="btnBinhLuan" name="comment" type="submit" value="Send comment">
								</form>
							</div>
							<!-- <h2>Bình luận</h2> -->
							<div class="container-comment">
								<div class="rating"></div>
								<div class="comment-content">
								</div>
							</div>
						</div>
					</div>

					<!-- /Product details -->

					<!-- Product tab -->
					<!-- <div class="col-md-12"> -->
					<!-- <div id="product-tab"> -->
					<!-- product tab nav -->
					<!-- <ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li> -->
					<!-- <li><a data-toggle="tab" href="#tab2">Details</a></li>  -->

					<!-- <li><a data-toggle="tab" href="#tab3">Reviews </a></li>
							</ul> -->
					<!-- /product tab nav -->

					<!-- product tab content -->
					<!-- <div class="tab-content"> -->
					<!-- tab1  -->
					<!-- <div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div> -->
					<!-- /tab1  -->

					<!-- tab2  -->
					<!-- <div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div> -->
					<!-- /tab2  -->

					<!-- tab3  -->
					<div class="col-md-12">
						<div>
							<p style="color: #666;font-weight: bold;">REVIEW PRODUCT</p>
						</div>

						<div class="row">
							<!-- Rating -->
							<div class="col-md-3">
								<div id="rating">
									<div class="rating-avg">
										<span>
											<?php
											$star_avg = $product->get_all_avg_star_by_product($id);
											$avg = $star_avg->fetch_assoc();
											echo number_format($avg['avg'], 1);
											?>
										</span>
										<div class="rating-stars">
											<?php
											$format_avg = floor($avg['avg']); //làm tròn xuống



											for ($i = 1; $i <= 5; $i++) {
												if ($i <= $format_avg) {
													echo '<i class="fa fa-star"></i>';
												} else {
													echo '<i class="fa fa-star-o "></i>';
												}
											}
											?>
											<!-- <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i> -->
										</div>
									</div>
									<ul class="rating">
										<li>
											<?php
											$total_review = $product->get_all_review_by_product($id);
											$result_total_review = $total_review->fetch_assoc();
											$star_5 = $product->get_all_total_5_star_by_product($id);
											$total_star_5 = $star_5->fetch_assoc();
											$star_4 = $product->get_all_total_4_star_by_product($id);
											$total_star_4 = $star_4->fetch_assoc();
											$star_3 = $product->get_all_total_3_star_by_product($id);
											$total_star_3 = $star_3->fetch_assoc();
											$star_2 = $product->get_all_total_2_star_by_product($id);
											$total_star_2 = $star_2->fetch_assoc();
											$star_1 = $product->get_all_total_1_star_by_product($id);
											$total_star_1 = $star_1->fetch_assoc();
											?>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-progress">

												<div style="width:<?php $percent_5_star = $total_star_5['5_star'] / $result_total_review['total_review'];
																	echo round($percent_5_star * 100) . '%'; ?>;"></div>
											</div>
											<span class="sum">
												<?php

												echo $total_star_5['5_star'];
												?>
											</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div style="width:<?php $percent_4_star = $total_star_4['4_star'] / $result_total_review['total_review'];
																	echo round($percent_4_star * 100) . '%'; ?>;"></div>
											</div>
											<span class="sum">
												<?php

												echo $total_star_4['4_star'];
												?>
											</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div style="width:<?php $percent_3_star = $total_star_3['3_star'] / $result_total_review['total_review'];
																	echo round($percent_3_star * 100) . '%'; ?>;"></div>
											</div>
											<span class="sum">
												<?php

												echo $total_star_3['3_star'];
												?>
											</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div style="width:<?php $percent_2_star = $total_star_2['2_star'] / $result_total_review['total_review'];
																	echo round($percent_2_star * 100) . '%'; ?>;"></div>
											</div>
											<span class="sum">
												<?php

												echo $total_star_2['2_star'];
												?>
											</span>
										</li>
										<li>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<div class="rating-progress">
												<div style="width:<?php $percent_1_star = $total_star_1['1_star'] / $result_total_review['total_review'];
																	echo round($percent_1_star * 100) . '%'; ?>;"></div>
											</div>
											<span class="sum">
												<?php

												echo $total_star_1['1_star'];
												?></span>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Rating -->

							<!-- Reviews -->
							<div class="col-md-9">
								<div id="reviews">
									<ul class="reviews">
										<?php





										$detail_comment = $product->get_new_comment_by_product($id);


										if ($detail_comment) {

											while ($result_comment = $detail_comment->fetch_assoc()) {


										?>
												<li>
													<div class="review-heading">
														<h5 class="name"><?php echo $result_comment['Username']; ?></h5>
														<p class="date"><?php echo $result_comment['Date']; ?></p>
														<div class="review-rating">

															<?php


															for ($i = 1; $i <= 5; $i++) {
																if ($i <= $result_comment['StarRating']) {
																	echo '<i class="fa fa-star"></i>';
																} else {
																	echo '<i class="fa fa-star-o empty"></i>';
																}
															}
															?>
															<!-- <i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star-o empty"></i> -->
														</div>
													</div>
													<div class="review-body">
														<p><?php echo $result_comment['Comment']; ?></p>
													</div>
												</li>
										<?php }
										}
										?>

									</ul>
									<ul class="reviews-pagination">
										<?php
										$comment_all = $product->get_all_comment_by_product($id);
										if ($comment_all != NULL) {

											$comment_count = mysqli_num_rows($comment_all);

											$number_page_comment = ceil($comment_count / 3); // làm tròn lên



											for ($i = 1; $i <= $number_page_comment; $i++) {
												echo '<li ><a href="details.php?ProductID=' . $id . '&comment_page=' . $i . '">' . $i . '</li>';
											}
										} else {
											echo '<h3 class="title">No reviews yet</h3>';
										}


										?>

									</ul>
								</div>
							</div>
							<!-- /Reviews -->

							<!-- Review Form -->

							<!-- /Review Form -->

						</div>
						<!-- /tab3  -->
						<!-- </div> -->
						<!-- /product tab content  -->
					</div>
					<!-- </div> -->
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
	<?php
		}
	}
	?>
</div>
<!-- /SECTION -->




<?php include 'inc/footer.php'; ?>