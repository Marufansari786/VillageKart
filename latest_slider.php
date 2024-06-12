<section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Categories</h4>
                        
                        
                        <div class="latest-product__slider owl-carousel">
                        
<!-- php -->
<?php
$sqlCat="SELECT * FROM categories";
$runCat=mysqli_query($con,$sqlCat);
if(mysqli_num_rows($runCat) > 0){
    while($rowCat=mysqli_fetch_assoc($runCat)){ ?>

                                <a href="view_categories.php?cid=<?php echo $rowCat['cat_id']; ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin_area/cat_img/<?php echo $rowCat['cat_img']; ?>" alt="cat_img">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $rowCat['cat_title']; ?></h6>
                                        <span>Exclusive Offer</span>
                                    </div>
                                </a>
                     
<?php } } ?>

                     <!-- end php     -->               
                            
                        </div>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Brands</h4>
                        <div class="latest-product__slider owl-carousel">
                        
                        <!-- php -->
                        <?php 
$sqlBrand="SELECT * FROM brands";
$runBrand=mysqli_query($con,$sqlBrand);
if(mysqli_num_rows($runBrand) > 0){
    while($rowBrand=mysqli_fetch_assoc($runBrand)){ ?>

                                <a href="view_slide_brands.php?biid=<?php echo $rowBrand['brand_id']; ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin_area/brand_img/<?php echo $rowBrand['brand_img']; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $rowBrand['brand_title']; ?></h6>
                                        <span>Get UPTO <del>20% Off</del><br>30% Off</span>
                                    </div>
                                </a>
<?php } } ?>
                          <!-- end php -->
                        </div>
                    </div>
                </div>














                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                           

                        <!-- php -->
                        <?php
$sqlPro="SELECT * FROM products";
$runPro=mysqli_query($con,$sqlPro);
if(mysqli_num_rows($runPro) > 0){
    while($rowPro=mysqli_fetch_assoc($runPro)){ ?>
    
    
                                <a href="view_all_pro.php?pid=<?php echo $rowPro['product_id']; ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="admin_area/product_images/<?php echo $rowPro['product_img1']; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $rowPro['product_title']; ?></h6>
                                        <span>₹<?php echo $rowPro['product_price']; ?></span>
                                    </div>
                                </a>
                            
<?php } } ?>
                          <!-- end php  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>