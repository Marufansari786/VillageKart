<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    

 
 
 if(isset($_GET['delete_c'])){

$delete_id =$_GET['delete_c'];

$delete_c= "DELETE from costumers where costumer_id='$delete_id'";
$run_delete=mysqli_query($con, $delete_c);

if($run_delete){

echo "<script>alert('Customer Has Been Deleted')</script>";
     
echo "<script>window.open('index.php?view_customers','_self')</script>";
}


 }


?>


<?php } ?>