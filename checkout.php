<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<?php
session_start();
include("includes/db.php");
include("header.php");
?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
   

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
           <?php $Cemail = $_SESSION['COSTUMER_EMAIL'] ?>
           <form method="POST" action="m_order.php">
           <div class="row">
               <div class="col-md-6">
                   <h2>Billing Address</h2>
                   <hr>
                   <p>Please Enter Correct Details</p>
                   <p>Name</p>
                   <p><input type="text" name="bn" id="bn" class="form-control" required></p>

                   <p>Email</p>
                   <p><input type="text" name="be" id="be" value="<?php echo $Cemail ?>" class="form-control" required></p>


                   <p>Phone</p>
                   <p><input type="text" name="bp" id="bp" class="form-control" required></p>


                   <p>Address</p>
                   <p><textarea name="ba" id="ba" class="form-control" required></textarea></p>


                   <p>Address Line 2</p>
                   <p><textarea name="ba2" id="ba2" class="form-control" required></textarea></p>


               </div>


               <div class="col-md-6">
                   <h2>Shiping Address</h2>
                   <hr>
                   <p><label><input type="checkbox" name="cb" id="cb"> Same As Billing Address</label></p>
                   <p>Name</p>
                   <p><input type="text" name="sn" id="sn" class="form-control" required></p>

                   <p>Email</p>
                   <p><input type="text" name="se" id="se" class="form-control" required></p>


                   <p>Phone</p>
                   <p><input type="text" name="sp" id="sp" class="form-control" required></p>


                   <p>Address</p>
                   <p><textarea name="sa" id="sa" class="form-control" required></textarea></p>


                   <p>Address Line 2</p>
                   <p><textarea name="sa2" id="sa2" class="form-control" required></textarea></p>


               </div>


           </div>


                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products<span>Total</span></div>
                                <ul>
                                    <?php
$totalPrice = 0;
$subtotalPrice = 0;
$checkOutSql="SELECT * FROM cart WHERE costumer_email='$Cemail'";
$runCheckOut=mysqli_query($con,$checkOutSql);
if(mysqli_num_rows($runCheckOut) > 0){

    while($rowCheck=mysqli_fetch_assoc($runCheckOut)){

    $product_id=$rowCheck['p_id'];

    $fetchProduct="SELECT * FROM products WHERE product_id='$product_id'";
    $runfetch=mysqli_query($con,$fetchProduct);
    if(mysqli_num_rows($runfetch) > 0){


                                    while($rowProduct=mysqli_fetch_assoc($runfetch)){
                                      $totalPrice = $rowCheck['qty'] * $rowProduct['product_price']; 
                                      
$subtotalPrice=$subtotalPrice+($rowCheck['qty'] * $rowProduct['product_price']);

?>
                                    <li><?php echo $rowProduct['product_title']  .  "<b class='text-danger'> (" .$rowCheck['qty']. ")</b>" ?><span>₹ <?php echo $rowProduct['product_price'] ?></span></li>
                                    <?php
    }
    }
}
}
?>

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>₹ <?php echo $subtotalPrice ;?> </span></div>
                                <div class="checkout__order__total">Total <span>₹ <?php echo $subtotalPrice; ?></span></div>
                             
                               
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment <small class="text-danger">  (Before Place Order Checked This..)</small>
                                        <input type="checkbox" id="payment" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                             
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Checkout Section End -->
<script>
$(function(){

$('#cb').click(function(){
if($("#cb").prop("checked"))
{
    $("#sn").val($("#bn").val());
    $("#se").val($("#be").val());

    $("#sp").val($("#bp").val());

    $("#sa").val($("#ba").val());

    $("#sa2").val($("#ba2").val());

}else{
    $("#sn").val("");
    $("#se").val("");

    $("#sp").val("");

    $("#sa").val("");

    $("#sa2").val("");
}
});


})

</script>



    
    <?php
include("footer.php");
?>