<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


 
 if(isset($_GET['delete_cat'])){

$delete_id=$_GET['delete_cat'];

$delete_pro= "DELETE from categories where cat_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One category Has Been Deleted')</script>";
     
echo "<script>window.open('index.php?view_cats','_self')</script>";
}


 }

?>

<?php } ?>