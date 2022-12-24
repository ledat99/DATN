	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> -->
							<ul class="footer-links">
								<li><a href=""><i class="fa fa-map-marker"></i>297 Tran Cung Street</a></li>
								<li><a href=""><i class="fa fa-phone"></i>0853535697</a></li>
								<li><a href=""><i class="fa fa-envelope-o"></i>leduydat99@gmail.com</a></li>
							</ul>
						</div>
					</div>

					<!-- <div class="col-md-4 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Manufacturer</h3>
							<ul class="footer-links">
								<li><a href="#">Apple</a></li>
								<li><a href="#">XiaoMi</a></li>
								<li><a href="#">Samsung</a></li>
								<li><a href="#">Oppo</a></li>
								<li><a href="#">Huawei</a></li>
							</ul>
						</div>
					</div> -->

					<div class="clearfix visible-xs"></div>



					<div class="col-md-6 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">

								<li><a href="cart.php">View Cart</a></li>
								<?php
								$user_id = Session::get('UserID');
								$check_order = $ct->check_order($user_id);
								if ($check_order == true) {
									echo '<li><a href="orderdetails.php">Ordered</a> </li>';
								} else {
									echo '';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->


	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

	</body>

	</html>