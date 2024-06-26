<?php
 @session_start();
 include("includes/db.php");
 ?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                           
                            <li data-filter=".fastfood">Hide</li>
                        </ul>
                    </div>
                </div>
            </div>
            




            
            <div class="row featured__filter">
            <?php
$sqlPro="SELECT * FROM products";
$runPro=mysqli_query($con,$sqlPro);
if(mysqli_num_rows($runPro) > 0){
    while($rowPro=mysqli_fetch_assoc($runPro)){ ?>

                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <a href="view_product.php">
                        <div class="featured__item__pic set-bg" data-setbg="admin_area/product_images/<?php echo $rowPro['product_img1']; ?>">
                        </a>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#" class="EyeInfoID" data-id="<?= $rowPro['product_id']; ?>"><i class="fa fa-eye"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $rowPro['product_title']; ?></a></h6>
                            <h5>₹ <?php echo $rowPro['product_price']; ?></h5>
                        </div>
                    </div>
                </div>
                    
                    
                    <?php } 
                } 
                ?>


              
            </div>
        </div>
    </section>


    <div class="modal fade bd-example-modal-lg" id="MyModal143" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

   $('#MyModal143').modal('show');
   $('#ViewPRO').html(response);


}
});
});
})


    </script>