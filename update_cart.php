
<?php
session_start();
include("includes/db.php");
// if(isset($_POST['qty']) && isset($_POST['cart_id'])){
$cartid=$_POST['cart_id'];
$qty=$_POST['qty'];


$updateCart="UPDATE cart SET qty='$qty' WHERE cart_id='$cartid'"; 

$runCartupdate=mysqli_query($con,$updateCart);



?>


<?php 
$totalPrice = 0;
$subtotalPrice = 0;
$Cemail = $_SESSION['COSTUMER_EMAIL'];
$sqlCart="SELECT * FROM cart WHERE costumer_email='$Cemail'";
$runCart=mysqli_query($con,$sqlCart);
if(mysqli_num_rows($runCart) > 0){
?>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div id="CART_MSG1"></div>
                <div class="col-lg-12">
                    <form method="POST">
                    <div class="shoping__cart__table">
                        <table id="#crt_table">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <!-- <th>Update</th> -->
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
<!-- PHP STARTS -->

<?php 

    

    while($rowCart=mysqli_fetch_assoc($runCart)){

$pro_id = $rowCart['p_id'];
$cart_id = $rowCart['cart_id'];

$sqlPro="SELECT * FROM products WHERE product_id='$pro_id'";
$runPro=mysqli_query($con,$sqlPro);

if(mysqli_num_rows($runPro) > 0){

    $rowPro=mysqli_fetch_assoc($runPro);

 ?>


                            <tbody>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <a href="view_all_pro.php?pid=<?php echo $rowPro['product_id'];?>"><img src="admin_area/product_images/<?php echo $rowPro['product_img1'];?>" height="100" width="100" alt=""></a>
                                        <h5> <?php echo  $rowPro['product_title']?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    ₹  <?php echo $rowPro['product_price']; ?>
                                    </td>
                                    
                                    <td class="shoping__cart__quantity" align="center">
                    <form id="frm<?php echo $rowCart['cart_id'] ?>">
<input type="hidden" name="cart_id" value="<?php echo $rowCart['cart_id']; ?>">
<input type="number" class="form-control" name="qty" value="<?php echo $rowCart['qty']; ?>" style="width: 80px;" onchange="updcart(<?php echo $rowCart['cart_id'] ?>)" onkeyup="updcart(<?php echo $rowCart['cart_id'] ?>)">

                                        
</form>
                                    </td>


                                    <td class="shoping__cart__total">
                                       <?php 
                                       $totalPrice= $rowCart['qty'] * $rowPro['product_price'];
                                       echo '₹ ' .$totalPrice;
                                       ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    <a href="#" class=" btn-sm btn-danger remove_qty removebutton" data-id="<?= $rowCart['cart_id'] ?>">Remove</a>
                                    </td>
                                </tr>
                               </tbody>

                               
                               <?php
                              
                               $subtotalPrice=$subtotalPrice+($rowCart['qty'] * $rowPro['product_price']);
  
}
}

?>
                        <!-- PHP ENDS -->
                            </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        
                           
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php 
                           
                                   
                                   
                                   echo '₹'. $subtotalPrice; ?></span></li>
                            <li>Total <span>₹<?php echo $subtotalPrice; ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shoping Cart Section End -->

<?php

}

?>