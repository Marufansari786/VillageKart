<?php
session_start();
include("includes/db.php");
include("header.php");
?>

<div class="section-title product__discount__title text-center">
    <h2>Categories Based Product</h2>
</div>



<div class="col-lg-12 col-md-7">
<div class="row">
<?php
if(isset($_GET['cid'])){

    $cat_id = $_GET['cid'];

    $SqlCat="SELECT * FROM brands WHERE cat_id='$cat_id'";
    $RunCat=mysqli_query($con,$SqlCat);
    if(mysqli_num_rows($RunCat) > 0)
{


while($RowCat = mysqli_fetch_assoc($RunCat)){ ?>


                    

                    <!-- php -->


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin_area/brand_img/<?php echo $RowCat['brand_img']; ?>">
                                    <ul class="product__item__pic__hover">
                                        <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                        <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                        <li><a href="#" class="EyeInfo" data-id="<?= $RowCat['brand_id']; ?>"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><b><a href="#"><?php echo $RowCat['brand_title']; ?></a></b></h6>
                                    
                                </div>
                            </div>
                        </div>
                       


                        <!-- php -->
                        
                        
                        <?php

}

}
}
?>
</div>
<!-- <div class="product__pagination">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
</div> -->
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

    
      


<script>
$(document).ready(function(){

$('.EyeInfo').click(function(e){
e.preventDefault();
var id = $(this).data(id);

$.ajax({

url : "view_cats_id.php",

type : "POST",

data : {

    cid : id 
},
 success : function(response){

    
    $('#exampleModal').modal('show');

        $('#EYEview').html(response);
      
    
    //     $('.EyeInfo1').click(function(e){
    //     e.preventDefault();
    //     $('#EYEview').hide(2000);
        
    //  });
}



});
 });
})

// $('.EyeInfo').click(function(e){
// e.preventDefault();
// $('#EYEview').show(2000);
// });

</script>







<script>
$('#OWLC2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
    autoplayTimeout:2000,

    responsive:{
        0:{
            items:3
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

</script>












<?php
include("footer.php");
?>