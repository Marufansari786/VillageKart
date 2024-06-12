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
//DB details
session_start();
include("includes/db.php");
//Get current user ID from session

$email=$_SESSION['COSTUMER_EMAIL'];
$name=$_SESSION['COSTUMER_NAME'];
//Get user data from database
$result = $con->query("SELECT * FROM costumers WHERE costumer_email='$email'");
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





<input list="heroes" type="text" id="searchBar">
<datalist id="heroes"></datalist>



<script>
  var heroes = [
    "Abaddon",
    "Alchemist",
    "Ancient Apparition",
    "Anti-Mage",
    "Axe",
    "Bane",
  ];

  for (var key in heroes) {
    var optionElement = document.createElement("option");
    optionElement.value = heroes[key];
    document.getElementById("heroes").appendChild(optionElement);
  }
</script>






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



