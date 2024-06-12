<?php
session_start();
include("includes/db.php");
include("header.php");

?>
<?php
if(isset($_GET['biid'])){ ?>
    <div class="container">
    
        <div class="row featured__filter">

        <?php

$brandId=$_GET['biid'];

$sqlBrand="SELECT * FROM products WHERE brand_id='$brandId'";
$runBrand=mysqli_query($con,$sqlBrand);

if(mysqli_num_rows($runBrand) > 0){

while($rowBrand=mysqli_fetch_assoc($runBrand)){ ?>

<!-- <a href="#" class="brandID" data-id="<?= $rowBrand['product_id']; ?>">
    <div class="item"><h4><img src="admin_area/product_images/<?php echo $rowBrand['product_img1']; ?>" height="300"></h4></div></a> -->

    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <a href="view_product.php">
                        <div class="featured__item__pic set-bg" data-setbg="admin_area/product_images/<?php echo $rowBrand['product_img1']; ?>">
                        </a>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#" class="EyeInfoID" data-id="<?= $rowBrand['product_id']; ?>"><i class="fa fa-eye"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $rowBrand['product_title']; ?></a></h6>
                            <h5>₹ <?php echo $rowBrand['product_price']; ?></h5>
                        </div>
                    </div>
                </div>
                    
   
    
<?php 
}

}else{ ?>
    
    
    </div>
<div class="alert alert-info alert-dismissible fade show col-12 text-center font-weight-bold" role="alert">
  <strong>Hey !</strong>No Product Available On This Brand, See Our Related Brand Product..!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>


<?php
}
?>

<div class="modal fade bd-example-modal-lg" id="MyModal14" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="float: right; padding:20px;">&times;</span>
                            </button>
    
    <div id="ViewPRO">

    </div>


    </div>
  </div>
</div>

<script>
$(document).ready(function(){

    $('.EyeInfoID').click(function(e){
    e.preventDefault();

        var id = $(this).data(id);


        $.ajax({
url : "featured_product_id.php",

type : "POST",

data : {

id : id

},

success : function(response){

   $('#MyModal14').modal('show');
   $('#ViewPRO').html(response);


}
});
});
})


    </script>

<?php
include("footer.php");
?>