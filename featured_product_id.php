
<?php
 session_start();
 include("includes/db.php");
 
 if(isset($_POST['id'])){
 
    foreach($_POST['id'] as $pid){



    }
$ProSQL="SELECT * FROM products WHERE product_id='$pid'";
$RunSQL=mysqli_query($con,$ProSQL);
if(mysqli_num_rows($RunSQL) > 0){

    $RowSQL=mysqli_fetch_assoc($RunSQL);

    $form='';

    $form = '<section class="product-details spad" style="margin-top: -80px;">
    <div class="container">
        <div class="row d-flex justify-content-center text-center">

        <div class="col-12 text-center rounded" id="CART_MSG" style="width:80%; padding:20px;"></div>
        <div class="col-lg-6 col-md-6">
        <div class="product__details__pic">
        <div class="product__details__pic__item">
        <img class="product__details__pic__item--large"
        src="admin_area/product_images/'.$RowSQL['product_img1'].'" alt="" style="height:350px">
                    </div>
                    <div class="product__details__pic__slider owl-carousel" id="OWLC3">
                    <img data-imgbigurl="admin_area/product_images/'.$RowSQL['product_img2'].'"
                    src="admin_area/product_images/'.$RowSQL['product_img2'].'" alt="" style="height: 100px;">
                    
                        <img data-imgbigurl="admin_area/product_images/'.$RowSQL['product_img3'].'"
                            src="admin_area/product_images/'.$RowSQL['product_img3'].'" alt="" style="height: 100px;">
    
                        <img data-imgbigurl="admin_area/product_images/'.$RowSQL['product_img1'].'"
                            src="admin_area/product_images/'.$RowSQL['product_img1'].'" alt="" style="height: 100px;">
    
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                <h3>'.$RowSQL['product_title'].'</h3>
              
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                    <div class="product__details__price">'.$RowSQL['product_price'].'</div>
                    <p>'.$RowSQL['product_dsc'].'</p>
                    <div class="product__details__quantity">
                    <form method="POST">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" id="QTY" name="pro_qty" value="1">
                                </div>
                                </div>
                                </div>';
                                if(empty($_SESSION['COSTUMER_EMAIL'])){
                                    $form .=  '<a href="#"  class="primary-btn gold">Add To Cart</a>'; }else{
                                $form .= '<a href="#" data-id="'.$RowSQL['product_id'].'" class="cart_qty primary-btn">ADD TO CART</a> 
                                </form>'; }
                                $form .= '<a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                      
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            </div>
            </section>';

            echo $form;

}
 

 }

?>

<!-- Cart Login  -->

 

    <!-- Login Form Modal -->
    <script>
$(document).ready(function(){
    $('.gold').click(function(e){
e.preventDefault();
$('#MyModal143').hide();
$('#myModal1').modal(1000);

});
    

})

$(document).ready(function(){
    $('.gold').click(function(e){
e.preventDefault();
$('#MyModal14').hide();
$('#myModal1').modal(1000);

});
    

})

</script>

<!-- Cart Login  -->




<script>
$(document).ready(function(){

$('.cart_qty').click(function(e){
e.preventDefault();
    var id = $(this).data(id);
var qty = $('#QTY').val();



$.ajax({

url : "cart.php",

type : "POST",

data : {
 id : id,
    qty : qty

},

success : function(response){
if(response > 0){
    $("#CART_MSG").show().html(
                    "<h4 style='background-color: #7fad39; padding:10px; color:white;'>Successfully Added Item In Cart..!</h4>");
                    $("#CART_MSG").fadeOut(4000);
    }else{
        $("#CART_MSG").show().html(
                    "<h4 style='background-color: #ff0000; padding:10px; color:white;'>Already Added Item In Cart..!<a href='shoping-cart.php'> Check It</a></h4>");
                    $("#CART_MSG").fadeOut(4000);
    }
}

});
});


})

</script>





<script>
$('#OWLC3').owlCarousel({
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