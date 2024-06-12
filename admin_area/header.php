<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('admin_login.php','_self')</script>";


}

else{
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Digizest Ecom AdminPanel</title>
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

<!-- <h2 style="color: red; text-align:center; padding: 20px;"><?php //echo @$_GET['logged_in'] ?></h2> -->

  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
      <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="mdi mdi-tie menu-icon"></i>
            <span class="menu-title"><i>Admin Dashboard</i></span>
          </a>
        </li>
        <li>
        <hr style="height:1px; background-color:white; color:white;">
        <li class="nav-item">
          <a class="nav-link" href="index.php?insert_cat">
            <i class="mdi mdi-plus-circle menu-icon"></i>
            <span class="menu-title">Insert New Category</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?insert_brand">
            <i class="mdi mdi-plus-circle menu-icon"></i>
            <span class="menu-title">Insert New Brand</span>
          </a>
        </li>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?insert_product">
            <i class="mdi mdi-plus-circle menu-icon"></i>
            <span class="menu-title">Insert New Product</span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link" href="index.php?view_cats">
            <i class="mdi mdi-eye menu-icon"></i>
            <span class="menu-title">View All Categories</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="index.php?view_brands">
            <i class="mdi mdi-eye menu-icon"></i>
            <span class="menu-title">View All Brand</span>
          </a>
        </li>




        

        <li class="nav-item">
          <a class="nav-link" href="index.php?view_products">
            <i class="mdi mdi-shopping menu-icon"></i>
            <span class="menu-title">View All Product</span>
          </a>
        </li>





        <li class="nav-item">
          <a class="nav-link" href="index.php?view_customers">
            <i class="mdi mdi-account-circle menu-icon"></i>
            <span class="menu-title">View All Customers</span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link" href="index.php?view_orders">
            <i class="mdi mdi-cart-outline menu-icon"></i>
            <span class="menu-title">View Orders</span>
          </a>
        </li>



        <li class="nav-item">
          <a class="nav-link" href="index.php?view_payments">
            <i class="mdi mdi-currency-inr menu-icon"></i>
            <span class="menu-title">View Payments</span>
          </a>
        </li>
        <li>


        <hr style="height:1px; background-color:white; color:white;">
        </li>
        <li class="nav-item pt-3">
          <a class="nav-link bg-danger" href="admin_logout.php">
            <i class="mdi mdi-toggle-switch-off menu-icon"></i>
            <span class="menu-title">Admin LogOut</span>
          </a>
        </li>



 
        <!-- <li class="nav-item sidebar-category">
          <p>Components</p>
          <span></span>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">UI Elements</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
            </ul>
          </div> -->
        <!--</li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="pages/forms/basic_elements.html">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Form elements</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">Charts</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Tables</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Icons</span>
          </a>
        </li> -->
        <!-- <li class="nav-item sidebar-category">
          <p>Pages</p>
          <span></span>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item sidebar-category">
          <p>Apps</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="docs/documentation.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <?php
date_default_timezone_set("Asia/Kolkata");

?>
          <ul class="navbar-nav navbar-nav-right d-block">
          <li class="">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?php echo $_SESSION['admin_email']; ?></h4>
            
<br>

            
              <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?php $today = date("g:ia- l- jS- F Y"); echo $today; ?></h4>
            </li>

</ul>
              
             
<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labe              lledby="notificationDropdown">
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                    </div>
                  </div>
                  <div class="preview-item-content">
                   
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                    </div>
                  </div>
                  <div class="preview-item-content">
                    
                  </div>
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
       
      </nav>

      <?php
      
}
      ?>