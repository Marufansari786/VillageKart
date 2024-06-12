<?php
 session_start();
include('includes/db.php');

?>









<?php

if(isset($_POST['register'])){



    $name = $_POST['c_name'];
    $email = $_POST['c_email'];
    $password = md5($_POST['c_pass']);
//   $cpassword = md5($_POST['cpass']);
    $cPassword = md5($_POST['confirm_pass']); // New line for confirming password

    $country = $_POST['c_country'];
    $state = $_POST['c_state'];
    $city = $_POST['c_city'];
    $number = $_POST['c_contact'];
    $address = $_POST['c_address'];


    // if($password == $cpassword) {
        if($password != $cPassword) {
            $_SESSION['PASS'] = 'Passwords do not match.';
            echo "<script>alert('Passwords do not match.');</script>";

            echo "<script>window.open('index.php','_self')</script>";
            exit; // Exit to prevent further execution of the script
        }




        $image = $_FILES['c_image']['name'];
        $tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file($tmp, "customers_image/$image");


                // Check if email is already registered

                $sqlValidate="SELECT * FROM costumers WHERE costumer_email='$email'";  
                $runValidate=mysqli_query($con,$sqlValidate);
        
                if(mysqli_num_rows($runValidate) > 0){
                    echo "<script>alert('Email already registered.')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                    exit; // Exit to prevent further execution of the script
                }
        
        
                // Check if number is already registered
                $sqlValidate2 = "SELECT * FROM costumers WHERE costumer_contact='$number'";
                $runValidate2=mysqli_query($con,$sqlValidate2);
        
                if(mysqli_num_rows($runValidate2) > 0){
                    echo "<script>alert('Phone number already registered.')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                    exit; // Exit to prevent further execution of the script
                }

    //     $sqlValidate="SELECT * FROM costumers WHERE costumer_email='$email'";  
        
    //     $runValidate=mysqli_query($con,$sqlValidate);

       
    //     if(mysqli_num_rows($runValidate) > 0){
    //          $sqlValidate2 = "SELECT * FROM costumers WHERE costumer_contact='$number'";
    //      $runValidate2=mysqli_query($con,$sqlValidate2);
        

      
    //     if(mysqli_num_rows($runValidate2) > 0){

    // echo "<script>alert('Email Or Number Already Registered...')</script>";
    // echo "<script>window.open('index.php','_self')</script>";



// }
    //   }else{

        $sql="INSERT INTO `costumers` (`costumer_name`, `costumer_email`, `costumer_pass`, `costumer_country`,`state`, `costumer_city`, `costumer_contact`, `costumer_address`, `costumer_image`) VALUES('$name','$email','$password','$country','$state','$city','$number','$address','$image')";
        $run2 = mysqli_query($con, $sql);

    
    if($run2){

        $_SESSION['LOGINMSG'] = '<b class="text-success">'.$name.' </b>' .  '  You Have Successfully Registered, Now You Can Login..!';
        echo "<script>window.open('index.php','_self')</script>";
    }
    //  }
 }
?>











