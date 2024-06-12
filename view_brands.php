<?php
session_start();
include("includes/db.php");
include("header.php");

?>
<!--  Based On Brand -->


<div class="container">
<div class="owl-carousel owl2 owl-theme">

<?php



$sqlBrand="SELECT * FROM brands";
$runBrand=mysqli_query($con,$sqlBrand);

if(mysqli_num_rows($runBrand) > 0){

while($rowBrand=mysqli_fetch_assoc($runBrand)){ ?>

<a href="#" class="brandID" data-id="<?= $rowBrand['brand_id']; ?>">
    <div class="item"><h4><img src="admin_area/brand_img/<?php echo $rowBrand['brand_img']; ?>" height="300"></h4></div></a>
   
    
<?php 
}

}



?>

</div>

</div>

<!-- Product Based On Brand -->










<!-- Product Based On Brand -->



<div class="container">
    <div class="row">

        
        <?php
            if(isset($_GET['bid'])){
                $BID= $_GET['bid'];
                $sqlBrand1="SELECT * FROM products WHERE brand_id='$BID'";
                $runBrand1=mysqli_query($con,$sqlBrand1);
                
                if(mysqli_num_rows($runBrand1) > 0){
                    
                    while($rowBrand1=mysqli_fetch_assoc($runBrand1)){ ?>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="admin_area/brand_img/<?php echo $rowBrand1['product_img1']; ?>">
                        <ul class="product__item__pic__hover">
                                            <li><a href="#" class="ViewBrands2" data-id="<?= $rowBrand1['product_id']; ?>"><i class="fa fa-eye"></i></a></li>
                                            <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                            <!-- <li><a href="shoping-cart.php"><i class="fa fa-shopping-cart"></i></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#"><?php echo $rowBrand1['product_title']; ?></a></h6>
                                        <!-- <h5>$30.00</h5> -->
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                            <?php } 



}else{ ?>
 <div class="alert alert-info alert-dismissible fade show col-12 text-center font-weight-bold" role="alert">
     <strong>Hey !</strong>No Product Available On This Brand, See Our Related Brand Product..!
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php
  }
  ?>


<?php
}
?>
</div>
</div>

<!-- Product Based On Brand -->




<div class="container">
<div class="row">
    
    <?php
if(isset($_GET['Brand_Id'])){

    $Brand_Id= $_GET['Brand_Id'];
    
    $Sql_Brand="SELECT * FROM products WHERE brand_id='$Brand_Id'";
    $Run_Brand=mysqli_query($con,$Sql_Brand);
    if(mysqli_num_rows($Run_Brand) > 0){
        
        while($Row_Brand=mysqli_fetch_assoc($Run_Brand)){
            ?>

<div class="card col-sm-12 col-md-3 col-lg-3">
    <div class="owl-carousel OWLC4">
  <img src="admin_area/product_images/<?php echo $Row_Brand['product_img1']; ?>" style="height: 200px; padding-top: 15px;">
  <img src="admin_area/product_images/<?php echo $Row_Brand['product_img2']; ?>" style="height: 200px; padding-top: 15px;">
  <img src="admin_area/product_images/<?php echo $Row_Brand['product_img3']; ?>" style="height: 200px; padding-top: 15px;">
    </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $Row_Brand['product_title']; ?></h5>
    <p class="card-text"><?php echo $Row_Brand['product_dsc']; ?></p>
    <a href="#" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
  
  
  
  
  
  <?php

}



}else{ ?>

<div class="alert alert-info alert-dismissible fade show col-12" role="alert">
    <strong>Hey !</strong>No Product Available On This Brand, See Our Related Brand Product..!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}


}
?>
</div>
</div>







<script>
$('.OWLC4').owlCarousel({
    loop: true,
  autoplay: true,
  autoplayTimeout: 4000,
    dots: true,
    animateOut: 'fadeOut',
    // animateIn: 'flipInX',
    items:1,
    // margin:30,
    // stagePadding:30,
    smartSpeed:450
})

</script>
















<div class="relatedBrand">

<section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row">

            <!-- php -->
            <?php
            
$sqlBrand1="SELECT * FROM brands";
$runBrand1=mysqli_query($con,$sqlBrand1);

if(mysqli_num_rows($runBrand1) > 0){

while($rowBrand1=mysqli_fetch_assoc($runBrand1)){ ?>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin_area/brand_img/<?php echo $rowBrand1['brand_img']; ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#" class="ViewBrands" data-id="<?= $rowBrand1['brand_id']; ?>"><i class="fa fa-eye"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                <!-- <li><a href="shoping-cart.php"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $rowBrand1['brand_title']; ?></a></h6>
                            <!-- <h5>$30.00</h5> -->
                        </div>
                    </div>
                </div>

                
              
                <?php } } ?>
            <!-- php -->
           
            </div>
        </div>
    </section>
</div>



















<script>
$('.owl1').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:2,
    margin:30,
    stagePadding:30,
    smartSpeed:450
});


</script>


<script>
$('.owl2').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    autoplayTimeout:3000,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450
});


</script>


<script>
$(document).ready(function(){
$('.ViewBrands').click(function(e){
e.preventDefault();
var id = $(this).data(id);



$.ajax({
 url: "view_brands_id.php",
 type: "POST",
data: {

    brand_id : id

},

success: function(response){

    $('#exampleModal2').modal();
   $('#VIEWBRANDS').html(response)
   
}

});
});
})



</script>



<script>
$(document).ready(function(){
$('.ViewBrands2').click(function(e){
e.preventDefault();
var id = $(this).data(id);



$.ajax({
 url: "view_brands_id.php",
 type: "POST",
data: {

    brand_id2 : id

},

success: function(response){

    $('#exampleModal4').modal();
   $('#VIEWBRANDS2').html(response)
   
}

});
});
})


</script>
 <!-- Related brands -->

<div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="float: right; padding:20px;">&times;</span>
                            </button>
        
      <div id="EYEview">

</div>

</div>
  </div>
</div>

 <!-- Related brands -->







<!-- Product Based On Brands -->
<div class="modal fade bd-example-modal-lg" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="float: right; padding:20px;">&times;</span>
                            </button>
        
      <div id="VIEWBRANDS2">

</div>

</div>
  </div>
</div>
<!-- Product Based On Brands -->





<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="float: right; padding:20px;">&times;</span>
                            </button>
        
      <div id="VIEWBRANDS">

</div>

</div>
  </div>
</div>




<script>
$(document).ready(function(){
$('.brandID').click(function(e){
e.preventDefault();
var id = $(this).data(id);



$.ajax({
 url: "view_brands_id.php",
 type: "POST",
data: {

    pro_id : id

},

success: function(response){

    $('#exampleModal1').modal();
   $('#EYEview').html(response)
   
}

});
});
})



</script>


<?php
include("footer.php");
?>