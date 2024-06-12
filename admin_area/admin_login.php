<?php
session_start();
include("include/db.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-center p-3">
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning"></i>
              <!-- <i class="mdi mdi-star text-warning"></i>
              <i class="mdi mdi-star text-warning rehni hona eitar soniye"></i> -->
            
               </h6>
              <form class="pt-3 text-left" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="admin_email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="admin_pass" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>                        
                  </div>
                </div>
              
                <div class="my-3">
                  <button type="submit" class="btn btn-block btn-lg font-weight-bold auth-form-btn"  name="login" style="background-color:#7fad39; color:white; font-size:15px;">LOGIN</button>
                </div>
                
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2022-2023  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>



  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>





 
<?php

if(isset($_POST['login'])){
    
$user_email = $_POST['admin_email'];
$user_pass = $_POST['admin_pass'];

$sel_admin = "SELECT * from admins WHERE admin_email='$user_email' and admin_pass='$user_pass'";


$run_admin = mysqli_query($con, $sel_admin);

$check_admin =mysqli_num_rows($run_admin);

if($check_admin==1){
  $row_admin =mysqli_fetch_assoc($run_admin);
  $_SESSION['admin_email']= $row_admin['admin_name'];

echo "<script>window.open('index.php?logged_in=You Succesfully Logged In..!','_self')</script>";

}
else{
    echo "<script>alert('Admin`s Email Or Password Is Incorrect, Try Again')</script>";
}



}








?>