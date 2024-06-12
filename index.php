<?php 
session_start();
include("includes/db.php");
include("header.php");
?>

<?php
if(isset($_SESSION['LOGINMSG'])){ ?>
<div class="alert alert-warning alert-dismissible fade show text-center col-12 sticky-top font-weight-bold" role="alert">
  <strong>Hey!</strong> <?php echo $_SESSION['LOGINMSG'] ; 
  unset($_SESSION['LOGINMSG']);
  ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
    <!-- Hero Section Begin -->
  <?php 
   include("sidemenu.php"); 
  ?>

  <?php 
   include("herosection.php");
  ?>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
  <?php  
   include("brands_slider.php");
  ?>
    <!-- Categories Section End -->

    <!-- Featured Section Begin --> 
  <?php 
   include("featured_product.php");
  ?>
   <!-- Featured Section End -->

    <!-- Banner Begin -->
  <?php  
   include("banner_img2.php");
  ?>  
    <!-- Banner End -->

    <!-- Latest Product slider Section Begin -->
  <?php    
   include("latest_slider.php");
  ?>  
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
  <?php  
   include("blogs.php");
  ?>
    <!-- Blog Section End -->

  <!-- Footer Section Begin -->
  <?php  
   include("footer.php");
   ?>
   <!-- Footer Section End -->