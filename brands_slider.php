<?php
 @session_start();
 include("includes/db.php");
 ?>


<section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">


<?php 
$sqlBrand="SELECT * FROM brands";
$runBrand=mysqli_query($con,$sqlBrand);
if(mysqli_num_rows($runBrand) > 0){
    while($rowBrand=mysqli_fetch_assoc($runBrand)){ ?>


                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="admin_area/brand_img/<?php echo $rowBrand['brand_img']; ?>">
                            <h5><a href="view_brands.php?Brand_Id=<?php echo $rowBrand['brand_id']; ?>"><?php echo $rowBrand['brand_title']; ?></a></h5>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>