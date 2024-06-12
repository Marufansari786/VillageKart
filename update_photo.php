<?php
session_start();

include("includes/db.php");

$Cemail =$_SESSION['COSTUMER_EMAIL'];

 
if(isset($_POST['submit']) AND !empty($_FILES['file'])){
   
    $photo =$_FILES['file']['name'];
    $tmp =$_FILES['file']['tmp_name'];

    move_uploaded_file($tmp,"customers_image/$photo");

$updatePhoto="UPDATE costumers SET costumer_image='$photo' WHERE costumer_email='$Cemail'";
$con->query($updatePhoto);
$_SESSION['MSGUP']='Profile Photo Updated Successfully..!';
echo " 
<script>
window.location.href='my_account.php';
</script>

";

}
?>
 