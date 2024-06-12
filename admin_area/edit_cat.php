<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    




if(isset($_GET['edit_cat'])){

$cat_id =$_GET['edit_cat'];

$edit_cat ="SELECT * from categories where cat_id='$cat_id'";

$run_edit = mysqli_query($con, $edit_cat);

$row_edit=mysqli_fetch_array($run_edit);

$cat_edit_id =$row_edit['cat_id'];

$cat_title=$row_edit['cat_title'];


}


?>

<div class="card mt-3">
                <div class="card-body text-center">
                  <h3 class="pt-4">Update Category</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:35%; margin-top:0px;">

                  <form class="forms-sample pt-5" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">New Category Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="cat_title1" id="exampleInputUsername2" placeholder="Category" value="<?php echo $cat_title; ?>">
                      </div>
                    </div>

                    <!-- <div class="form-group row hide">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Category Image</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" name="cat_img" id="exampleInputEmail2">
                      </div>
                    </div> -->
                    <!-- <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div> -->
                  
                  
                    <button type="submit" class="btn mr-2" name="update_cat" style="background-color:#7fad39; color:white;">Update Category</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>

              
<?php
if(isset($_POST['update_cat'])){

$cat_title123 =$_POST['cat_title1'];

$update_cat = "UPDATE categories set  cat_title='$cat_title123' where cat_id= '$cat_edit_id'";

$run_update = mysqli_query($con, $update_cat);

if($run_update){

    echo "<script>alert('Category Has Been Updated')</script>";


    echo "<script>window.open('index.php?view_cats','_self')</script>";
    


}


}
?>

<?php } ?>
