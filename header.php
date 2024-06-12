<?php
@session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VillageKart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="css/owl.carousel.css">
 <link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/owl.theme.green.min.css">
 <script src="js/jquery.min.js"></script> 
 <script src="js/owl.carousel.min.js"></script>

 


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php
$totalPrice = 0;
$subtotalPrice = 0;

@$Cemail =$_SESSION['COSTUMER_EMAIL'];

$checkOutSql="SELECT * FROM cart WHERE costumer_email='$Cemail'";
$runCheckOut=mysqli_query($con,$checkOutSql);
$countcart=mysqli_num_rows($runCheckOut);

    while($rowCheck=mysqli_fetch_assoc($runCheckOut)){

    $product_id=$rowCheck['p_id'];

    $fetchProduct="SELECT * FROM products WHERE product_id='$product_id'";
    $runfetch=mysqli_query($con,$fetchProduct);
    if(mysqli_num_rows($runfetch) > 0){


                                    while($rowProduct=mysqli_fetch_assoc($runfetch)){
                                      $totalPrice = $rowCheck['qty'] * $rowProduct['product_price']; 
                                      
$subtotalPrice=$subtotalPrice+($rowCheck['qty'] * $rowProduct['product_price']);
                                    } } } 
?>
 <!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
        <a href="index.php"><h2><i class="fa fa-heart text-danger"></i> VillageKart.in</h2></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
            <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $countcart ?></span></a></li>
                <?php }else{ ?>
                    <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i><span> 0</span></a></li>
                <?php } ?>
            </ul>
            <div class="header__cart__price">item: <span>₹ <?php echo $subtotalPrice ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div id="google_translate_element"></div>
                <span class=""></span>
                <ul>
                    <li>
                   
                 
                 <script type="text/javascript">
 function googleTranslateElementInit() {
   new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
 }
 </script>
 
 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                     
              
                    </li>
                </ul>
            </div>
<?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
    <div class="header__top__right__auth">
                <a href="logout.php"><i class="fa fa-user"></i> LogOut</a>
            </div>
<?php }else{ ?>

            <div class="header__top__right__auth">
                <a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user"></i> Login</a>
            </div>|
            <div class="header__top__right__auth">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i>SignUp</a>
            </div>
            <?php } ?>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                
                <?php    $checkOutSql="SELECT * FROM cart WHERE costumer_email='$Cemail'";
$runCheckOut=mysqli_query($con,$checkOutSql);
$countcart=mysqli_num_rows($runCheckOut);

$rowCheck=mysqli_fetch_assoc($runCheckOut); ?>
<?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
    <li><a href="#">Services</a>
    <ul class="header__menu__dropdown">
        <li><a href="my_account.php">My Account</a></li>
        <!-- <li><a href="shop-details.php">Shop Details</a></li> -->
        <!-- <li><a href="shoping-cart.php">Shoping Cart</a></li> -->
        <li><a href="my_order.php">My Orders</a></li>
        <li><a href="shoping-cart.php">Shopping Cart</a></li>
        <?php if(@$rowCheck['cart_id']){ ?>
                        <li><a href="checkout.php">Check Out</a></li>
                        <!-- <li><a href="blog-details.php">Blog Details</a></li> -->
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
              
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
            <ul>
                <li><i class="fa fa-envelope"></i> Hello,<strong> <?php echo $_SESSION['COSTUMER_EMAIL']; ?></strong></li>
                <li>Free Shipping for all Order of ₹499</li>
            </ul>

            <?php } ?>
        </div>
    </div>
    <!-- Humberger End -->
    
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                        <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
            <ul>
                <li><i class="fa fa-envelope"></i> Hello, <strong><?php echo $_SESSION['COSTUMER_EMAIL']; ?></strong></li>
                <li>Free Shipping for all Order of ₹499</li>
            </ul>

            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div id="google_translate_element">English</div>
                                <span class="" id="google_translate_element1"></span>
                <ul>
                 
            
                    
                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
                                        
                                <a href="logout.php"><i class="fa fa-user"></i> LogOut</a>
                            </div>
                            <?php }else{ ?>
                                <a href="#" class="nav-link" href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user"></i> Login</a>
                            </div> |
            <div class="header__top__right__auth">
                <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i>SignUp</a>
            </div>
            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><h2><img class="rounded-circle" src="./img/image.png" alt="" width="45" height="40"> VillageKart.in</h2></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
                                
                                
                            
                                
                                
                                <li><a href="#">Services</a>
                                
                                <ul class="header__menu__dropdown">
                                    <li><a href="my_account.php">My Account</a></li>
                                    <li><a href="my_order.php">My Orders</a></li>
                                    <li><a href="shoping-cart.php">Shopping Cart</a></li>
                                    <?php    
                                    $checkOutSql="SELECT * FROM cart WHERE costumer_email='$Cemail'";
                                    $runCheckOut=mysqli_query($con,$checkOutSql);
                                    
                                    $rowCheck=mysqli_fetch_assoc($runCheckOut);
                                    if(@$rowCheck['cart_id']){ ?>
                                    <li><a href="checkout.php">Check Out</a></li>
                                    <?php }  ?>
                                </ul>
                            </li>
                            <?php } ?>
                                    <!-- <li><a href="blog-details.php">Blog Details</a></li> -->
                        
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                   
                        <ul>
                        <?php if(isset($_SESSION['COSTUMER_EMAIL'])){ ?>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $countcart ?></span></a></li>
                <?php }else{ ?>
                    <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i><span> 0</span></a></li>
                <?php } ?>
                        </ul>
                        <div class="header__cart__price">item: <span>₹ <?php echo $subtotalPrice ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    <!-- Login Form Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="position: absolute;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center font-weight-bold" id="exampleModalLabel">Login Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form action="login.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    
    
    <hr>

  
    <input class="form-control" type="text" placeholder="Enter Email OR Number" name="c_email" id="email" onBlur="checkAvailability()" required><span id="user-availability-status" style="font-size:12px;"></span> <br>
    
    
    
    <input class="form-control" type="password" placeholder="Enter Password" name="c_pass" id="psw" required>

    

    <hr>
    

    <button class="btn btn-info btn-lg btn-block" name="login" type="submit" class="registerbtn">LogIn</button>
    <h6 class="p-2 text-center mt-2 font-weight-bold">Don't Have Account, You Can <a href="#" class="text-danger" data-toggle="modal" data-target="#myModal">Create Account</a></h6>
  </div>
  
  
</form>

      
      </div>
      
    </div>
  </div>
</div>

    <!-- Login Form Modal -->







    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form Modal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* CSS to remove spinner from number input */
        /* For Chrome, Safari, Edge, Opera */
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* For Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>

<!-- SignUp Form Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center font-weight-bold" id="exampleModalLabel">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="signup.php" method="POST" enctype="multipart/form-data" onsubmit="return validateSignupForm()">
          <div class="container">
            <p class="text-info">Please fill in this form to create an account.</p>
            <hr>

            <input class="form-control" type="text" placeholder="Enter Full Name" name="c_name" id="signupName" required oninput="validateName()"><br>
            <input class="form-control" type="number" placeholder="Enter Mobile Number" name="c_contact" id="signupContact" required><br>
            <input class="form-control" type="email" placeholder="Enter Email" name="c_email" id="signupEmail" onBlur="checkAvailability()" required>
            <span id="user-availability-status" style="font-size:12px;"></span><br>
            
            <div class="row justify-content-between">
              <div class="col-6">
                <select name="c_country" class="form-control" required>
                  <option value="">--Choose Country--</option>
                  <option value="India">India</option>
                </select>
              </div>
              <div class="col-6">
                <select name="c_state" class="form-control" required>
                  <option value="">--Choose State--</option>
                  <?php
                    $indianStates = [
                      'AR' => 'Arunachal Pradesh',
                      'AS' => 'Assam',
                      'BR' => 'Bihar',
                      'CT' => 'Chhattisgarh',
                      'GA' => 'Goa',
                      'GJ' => 'Gujarat',
                      'HR' => 'Haryana',
                      'HP' => 'Himachal Pradesh',
                      'JK' => 'Jammu and Kashmir',
                      'JH' => 'Jharkhand',
                      'KA' => 'Karnataka',
                      'KL' => 'Kerala',
                      'MP' => 'Madhya Pradesh',
                      'MH' => 'Maharashtra',
                      'MN' => 'Manipur',
                      'ML' => 'Meghalaya',
                      'MZ' => 'Mizoram',
                      'NL' => 'Nagaland',
                      'OR' => 'Odisha',
                      'PB' => 'Punjab',
                      'RJ' => 'Rajasthan',
                      'SK' => 'Sikkim',
                      'TN' => 'Tamil Nadu',
                      'TG' => 'Telangana',
                      'TR' => 'Tripura',
                      'UP' => 'Uttar Pradesh',
                      'UT' => 'Uttarakhand',
                      'WB' => 'West Bengal',
                      'AN' => 'Andaman and Nicobar Islands',
                      'CH' => 'Chandigarh',
                      'DN' => 'Dadra and Nagar Haveli',
                      'DD' => 'Daman and Diu',
                      'LD' => 'Lakshadweep',
                      'DL' => 'National Capital Territory of Delhi',
                      'PY' => 'Puducherry'
                    ];
                    foreach($indianStates as $stateCode => $stateName) {
                      echo "<option value=\"$stateName\">$stateName</option>";
                    }
                  ?>
                </select><br><br><br>
              </div>
              <div class="col-12">
                <input class="form-control" type="text" placeholder="--Enter City--" name="c_city" id="signupCity" required>
              </div>
            </div><br>
            <input class="form-control" type="text" placeholder="--Enter Full Address--" name="c_address" id="signupAddress" required><br>

            <label for="c_image">Profile Image</label>

            <input class="form-control" type="file" name="c_image" id="signupImage" required><br>

            <input class="form-control" type="password" placeholder="Enter Password" name="c_pass" id="psw" required>

<input class="form-control" type="password" placeholder="Repeat Password" name="confirm_pass" id="psw-repeat" required>
<?php 
// if(isset($_SESSION['PASS'])){ 
//   echo '<div class="alert alert-danger" role="alert">' . $_SESSION['PASS'] . '</div>';
//   unset($_SESSION['PASS']); 
// } 
?>







            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button class="btn btn-success btn-lg btn-block" name="register" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function validateSignupForm() {
    var name = document.getElementById("signupName").value;
    var contact = document.getElementById("signupContact").value;
    var email = document.getElementById("signupEmail").value;
    var city = document.getElementById("signupCity").value;
    var address = document.getElementById("signupAddress").value;
    var password = document.getElementById("signupPassword").value;

    if (name === "" || contact === "" || email === "" || city === "" || address === "" || password === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}



function validateName() {
    var nameField = document.getElementById("signupName");
    var nameValue = nameField.value;
    var regex = /^[A-Za-z\s]+$/;

    if (!regex.test(nameValue)) {
        nameField.setCustomValidity("Please enter only letters and spaces.");
    } else {
        nameField.setCustomValidity("");
    }
}


</script>

</body>
</html>
