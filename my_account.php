<STYLE>
    .container{width: 100%;}
.user-box {
    width: 200px;
    border-radius: 0 0 3px 3px;
    padding: 10px;
    position: relative;
}
.user-box .name {
    word-break: break-all;
    padding: 10px 10px 10px 10px;
    background: #EEEEEE;
    text-align: center;
    font-size: 20px;
}
.user-box form{display: inline;}
.user-box .name h4{margin: 0;}
.user-box img#imagePreview{width: 100%;}

.editLink {
    position:absolute;
    top:28px;
    right:10px;
    opacity:0;
    transition: all 0.3s ease-in-out 0s;
    -mox-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    background:rgba(255,255,255,0.2);
}
.img-relative:hover .editLink{opacity:1;}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    background: rgba(255,255,255,0.7);
}
.overlay-content {
    position: absolute;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
.uploadProcess img{
    max-width: 207px;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    display: inline;
}

</STYLE>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php
session_start();

include("includes/db.php");

$Cemail = $_SESSION['COSTUMER_EMAIL'];

$show="SELECT * FROM costumers WHERE costumer_email='$Cemail'";
$run=mysqli_query($con,$show);
$row=mysqli_fetch_array($run);


?>

<?php include("header.php"); ?>



    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="account.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  
  <div class="container emp-profile">
           
                <div class="row">
                    <div class="col-lg-4 col-4">
               <?php
              
$name=$_SESSION['COSTUMER_NAME'];
//Get user data from database
$result = $con->query("SELECT * FROM costumers WHERE costumer_email='$Cemail'");
$row = $result->fetch_assoc();

//User profile picture
$userPicture = !empty($row['costumer_image'])?$row['costumer_image']:'no-image.png';
$userPictureURL = 'customers_image/'.$userPicture;
?>
<div class="container">
    <div class="user-box">
        <div class="img-relative">
            <!-- Loading image -->
            <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="loading.gif"/></div>
            </div>
            <!-- Hidden upload form -->
            <form method="post" action="upload.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                <input type="file" name="picture" id="fileInput"  style="display:none"/>
            </form>
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <!-- Image update link -->
            <a class="editLink" href="javascript:void(0);"><img src="edit.png" height="40"/></a>
            <!-- Profile image -->
            <img src="<?php echo $userPictureURL; ?>" id="imagePreview" height="200" width="100">
        </div>
        <div class="name">
            <h4><?php echo $row['costumer_name']; ?></h3>
        </div>
    </div>
</div>
</div>             <div class="col-md-6">
                        <div class="profile-head text-center">
                                    <h5>
                                    <?php echo $row['costumer_name'];  ?>
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                               <hr style="width:80%; height:1px; background-color:#7fad39;">
                               <?php
            if(isset($_SESSION['MSGUP'])){ 
            ?>
<div class="alert alert-success" role="alert">
 <?php echo $_SESSION['MSGUP'];
  unset($_SESSION['MSGUP']); ?>
</div>
<?php } ?>
                        </div>
                    </div>
                    </form> 
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>About</p>
                            <a href="">Name &nbsp;&nbsp;&nbsp; - </a>&nbsp; <span class="text-primary"><?php echo $row['costumer_name'];  ?></span><br/>
                            <a href=""> Email&nbsp;&nbsp; &nbsp;&nbsp; - </a>&nbsp; <span class=""><?php echo $row['costumer_email'];  ?></span><br/>
                            <a href="">Phone &nbsp;&nbsp;&nbsp; - </a>&nbsp; <span class=""><?php echo $row['costumer_contact'];  ?></span></br>
                            <a href="">Address&nbsp; - </a>&nbsp; <span class=""><?php echo $row['costumer_city'];  ?></span></br>
                            <p>Details / Help / Care</p>
                            <a href="my_order.php">My Orders</a><br/>
                            <a href="checkout.php">Check Out</a><br/>
                            
                            <a href="contact.php">Contact Us</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <div class="card text-light" style="background-color:#7fad39;">
  
  <details class="warning">

    <summary>Update Your Personal Information</summary>

    <form class="text-center pt-3" method="POST">
    <span style="float:left;">Name</span> <input type="text" class="form-control" name="name1" value="<?php echo $row['costumer_name'];  ?>"></br>
    <span style="float:left;">Email</span> <input type="text" class="form-control" name="email1" value="<?php echo $row['costumer_email'];  ?>" readonly></br>
    <span style="float:left;">Phone</span> <input type="text" class="form-control" name="phone1" value="<?php echo $row['costumer_contact'];  ?>"></br>
    <span style="float:left;">Address</span> <input type="text" class="form-control" name="add1" value="<?php echo $row['costumer_city'];  ?>"></br>

    <button type="submit" class="btn btn-primary" name="update" style=" padding: 5px 60px;">Update</button>

    </form>
  </details>




<?php

if(isset($_POST['update'])){

$name1= $_POST['name1']; 
$email1= $_POST['email1']; 
$phone1= $_POST['phone1']; 
$add1= $_POST['add1']; 

$update="UPDATE costumers SET costumer_name='$name1', costumer_email='$email1', costumer_contact='$phone1', costumer_city='$add1' WHERE costumer_email='$Cemail'";
$u_run=mysqli_query($con,$update);
 
if($u_run){

    $_SESSION['MSGUP']='PROFILE UPDATED..!';
    echo"
    <script>
    window.location.href= 'my_account.php';
    </script>
    ";
    
   }else{
   
       $_SESSION['MSGUP']='Some Thing Went Wrong';
   
   }
   
   
   
   }
   


?>


                        
              </div>        
        </div>
                </div>
</div>

<!-- <script>
$('.file-upload').on('click', function(e) {
  e.preventDefault();
  $('#file-input').trigger('click');
});
</script> -->

<script type="text/javascript">
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        
        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        }else{
            $('.uploadProcess').show();
            $('#uploadForm').hide();
            $( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName) {
    if(success == 1){
        $('#imagePreview').attr("src", "");
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
    }else{
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}
</script>







    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




    <?php include("footer.php"); ?>
 