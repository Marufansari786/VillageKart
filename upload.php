<?php
session_start();
include("includes/db.php");
$email=$_SESSION['COSTUMER_EMAIL'];
$name=$_SESSION['COSTUMER_NAME'];
if(!empty($_FILES['picture']['name'])){
    //Include database configuration file

    
    //File uplaod configuration
    $result = 0;
    $uploadDir = "customers_image/";
    $fileName = time().'_'.basename($_FILES['picture']['name']);
    $targetPath = $uploadDir. $fileName;
    
    //Upload file to server
    if(@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)){
        //Get current user ID from session
        $userId = 1;
        
        //Update picture name in the database
        $update = $con->query("UPDATE costumers SET costumer_image = '".$fileName."' WHERE costumer_email ='$email'");
        
        //Update status
        if($update){
            $result = 1;
        }
    }
    
    //Load JavaScript function to show the upload status
    echo '<script type="text/javascript">window.top.window.completeUpload(' . $result . ',\'' . $targetPath . '\');</script>  ';
}