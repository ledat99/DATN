<?php include 'inc/header.php'; ?>

<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Manufacturer </h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
                    <li class="active"><a href="manufacturer.php">Manufacturer</a></li>
				
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Apple</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyApple = $product->getproductbyApple();
                                if ($get_productbyApple) {
                                    while ($result_apple = $get_productbyApple->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_apple['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_apple['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_apple['ProductID']; ?>"><?php echo $result_apple['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_apple['Price'] - $result_apple['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_apple['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_apple['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_apple['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_apple['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->




<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">XiaoMi</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyXiaoMi = $product->getproductbyXiaoMi();
                                if ($get_productbyXiaoMi) {
                                    while ($result_xiaomi = $get_productbyXiaoMi->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_xiaomi['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_xiaomi['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_xiaomi['ProductID']; ?>"><?php echo $result_xiaomi['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_xiaomi['Price'] - $result_xiaomi['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_xiaomi['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_xiaomi['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_xiaomi['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_xiaomi['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Samsung</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbySamsung = $product->getproductbySamsung();
                                if ($get_productbySamsung) {
                                    while ($result_samsung = $get_productbySamsung->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_samsung['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_samsung['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_samsung['ProductID']; ?>"><?php echo $result_samsung['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_samsung['Price'] - $result_samsung['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_samsung['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_samsung['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_samsung['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_samsung['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Oppo</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyOppo = $product->getproductbyOppo();
                                if ($get_productbyOppo) {
                                    while ($result_oppo = $get_productbyOppo->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_oppo['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_oppo['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_oppo['ProductID']; ?>"><?php echo $result_oppo['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_oppo['Price'] - $result_oppo['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_oppo['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_oppo['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_oppo['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_oppo['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Huawei</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyHuawei = $product->getproductbyHuawei();
                                if ($get_productbyHuawei) {
                                    while ($result_huawei = $get_productbyHuawei->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_huawei['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_huawei['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_huawei['ProductID']; ?>"><?php echo $result_huawei['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_huawei['Price'] - $result_huawei['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_huawei['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_huawei['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_huawei['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_huawei['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Nokia</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyNokia = $product->getproductbyNokia();
                                if ($get_productbyNokia) {
                                    while ($result_nokia = $get_productbyNokia->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_nokia['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_nokia['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_nokia['ProductID']; ?>"><?php echo $result_nokia['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_nokia['Price'] - $result_nokia['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_nokia['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_nokia['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_nokia['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_nokia['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Mobiistar</h3>

                </div>
            </div>
            <!-- /section title -->


            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                $get_productbyMobiistar = $product->getproductbyMobiistar();
                                if ($get_productbyMobiistar) {
                                    while ($result_mobiistar = $get_productbyMobiistar->fetch_assoc()) {

                                ?>
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="admin/uploads/<?php echo $result_mobiistar['Image']; ?>" />
                                                <!-- <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div> -->
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $result_mobiistar['ManufacturerName']; ?></p>
                                                <h3 class="product-name"><a href="details.php?ProductID=<?php echo $result_mobiistar['ProductID']; ?>"><?php echo $result_mobiistar['ProductName']; ?></a></h3>
                                                <h4 class="product-price"><?php $product_price = $result_mobiistar['Price'] - $result_mobiistar['PromotionValue'];
                                                                            echo $fm->format_currency($product_price) . ' ' . 'đ'; ?> <del class="product-old-price"><?php echo $fm->format_currency($result_mobiistar['Price']) . ' ' . 'đ'; ?></del></h4>
                                                <!-- <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><a href="?wlist=<?php echo $result_mobiistar['ProductID']; ?>"><i class="fa fa-heart-o"></i></a><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><a href="?compare=<?php echo $result_mobiistar['ProductID']; ?>"><i class="fa fa-exchange"></i></a><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="details.php?ProductID=<?php echo $result_mobiistar['ProductID']; ?>"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div> -->
                                            </div>
                                            <!-- <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div> -->
                                        </div>
                                        <!-- /product -->
                                <?php
                                    }
                                }
                                ?>


                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php include 'inc/footer.php'; ?>