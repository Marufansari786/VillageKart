<?php
 session_start();
 include("includes/db.php");

 if(isset($_POST['qty']) && $_POST['id']){

    foreach($_POST['id'] as $ProId);


    //  $ProId= $_POST['id'];
     $Pro_QTY = $_POST['qty'];
     $Costumer_Email= $_SESSION['COSTUMER_EMAIL'];

     $checkCart="SELECT * FROM cart WHERE p_id='$ProId' AND costumer_email='$Costumer_Email'";
     $runCheckCart=mysqli_query($con,$checkCart);
     if(mysqli_num_rows($runCheckCart) > 0){
      

echo 0;

     }else{
     $CARTSQL="INSERT INTO cart(p_id,costumer_email,qty) VALUES ('$ProId','$Costumer_Email','$Pro_QTY')";
     $RUNCART=mysqli_query($con,$CARTSQL);
     
     if($RUNCART){
     
$_SESSION['CART_MSG']="Successfully Added Item In Cart..!";
    
     
     }
     
     echo 1;
     
     }

  
 }



?>