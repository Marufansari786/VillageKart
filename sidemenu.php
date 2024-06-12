<?php
 @session_start();
 include("includes/db.php");
 ?>

<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
<?php
$sqlCat="SELECT * FROM categories";
$runCat=mysqli_query($con,$sqlCat);
if(mysqli_num_rows($runCat) > 0){
    while($rowCat=mysqli_fetch_assoc($runCat)){ ?>



                            <li><a href="view_categories.php?cid=<?php echo $rowCat['cat_id']; ?>"><?php echo $rowCat['cat_title']; ?></a></li>
                          
                         <?php } } ?>
                        </ul>
                    </div>


                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Brands</span>
                        </div>
                        <ul>
<?php
$sqlBrands="SELECT * FROM brands";
$runBrands=mysqli_query($con,$sqlBrands);
if(mysqli_num_rows($runBrands) > 0){
    while($rowBrands=mysqli_fetch_assoc($runBrands)){ ?>



                            <li><a href="view_brands.php?bid=<?php echo $rowBrands['brand_id']; ?>"><?php echo $rowBrands['brand_title']; ?></a></li>
                          
                         <?php } } ?>
                        </ul>
                    </div>

                    
                </div>


                
            <!-- </div>
        </div> -->