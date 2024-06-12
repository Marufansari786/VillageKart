<?php
@session_start();
include("include/db.php");
if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


?>




<div class="card mt-3">
                <div class="card-body text-center">
                  <h3 class="pt-4">Insert New Categories</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:35%; margin-top:0px;">

                  <form class="forms-sample pt-5" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">New Category Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="cat_title" id="exampleInputUsername2" placeholder="Category">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category Image</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="cat_img" id="exampleInputEmail2">
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div> -->
                  
                  
                    <button type="submit" class="btn mr-2" name="insert_cat" style="background-color:#7fad39; color:white;">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>



              
<?php


if(isset($_POST['insert_cat'])){

$cat_title =$_POST['cat_title'];
$cat_img =$_FILES['cat_img']['name'];
$cat_tmp =$_FILES['cat_img']['tmp_name'];

move_uploaded_file($cat_tmp,"cat_img/$cat_img");

$insert_cat ="INSERT into categories (cat_title,cat_img) VALUES ('$cat_title','$cat_img')";

$run_cat = mysqli_query($con, $insert_cat);

if($run_cat){

echo "<script>alert('New Category Has Been Inserted')</script>";


echo "<script>window.open('index.php?view_cats','_self')</script>";

}



}

?>


<?php } ?>