<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


 
 if(isset($_GET['delete_order'])){

$delete_id =$_GET['delete_order'];

$delete_order= "DELETE FROM `pending_orders` WHERE order_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_order);

echo $delete_id;
if($run_delete){

echo "<script>alert('Order Has Been Deleted')</script>";
     
echo "<script>window.open('index.php?view_orders','_self')</script>";
}


 }




?>
<!-- <?php } ?> -->