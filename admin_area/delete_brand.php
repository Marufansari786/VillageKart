<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


 
 if(isset($_GET['delete_brand'])){

$delete_id =$_GET['delete_brand'];

$delete_brand= "DELETE from brands where brand_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_brand);

if($run_delete){

echo "<script>alert('One Brand Has Been Deleted')</script>";
     
echo "<script>window.open('index.php?view_brands','_self')</script>";
}


 }















?>
<?php } ?>