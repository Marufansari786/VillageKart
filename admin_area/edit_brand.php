<?php
@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    



if(isset($_GET['edit_brand'])){

$brand_id =$_GET['edit_brand'];

$edit_brand ="SELECT * from brands where brand_id='$brand_id'";

$run_brand = mysqli_query($con, $edit_brand);

$row_brand=mysqli_fetch_array($run_brand);

$brand_edit_id =$row_brand['brand_id'];

$brand_title=$row_brand['brand_title'];



}


?>


<div class="card mt-3">
                <div class="card-body text-center">
                  <h3 class="pt-4">Update Brands</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:30%; margin-top:0px;">

                  <form class="forms-sample pt-5" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Update Brand Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="brand_title1" id="exampleInputUsername2"  value="<?php echo $brand_title; ?> ">
                      </div>
                    </div>
<!-- 
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Brand Image</label>
                      <div class="col-sm-9">
                        <input type="file" name="brand_img" class="form-control" id="exampleInputEmail2" required>
                      </div>
                    </div> -->
                    <!-- <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div> -->
<!-- 
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select Categories</label>
                          <div class="col-sm-9"> -->
                          <!-- <select name="cat_id"  class="form-control" required>
                           <option>-Choose Categories-</option>

    <?php

    //$sql_cat="SELECT * FROM categories";
    //$run_cat=mysqli_query($con,$sql_cat);
    //if(mysqli_num_rows($run_cat) > 0){
        //while($row_cat=mysqli_fetch_assoc($run_cat)){ ?>


            <option value="<?php //echo $row_cat['cat_id']; ?>"><?php //echo $row_cat['cat_title']; ?></option>

            <?php
//}
//}
    ?>

</select> -->


                  
                  
                    <button type="submit" name="update_brand" class="btn mr-2" style="background-color:#7fad39; color:white;">Update Brand</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>


              <?php
if(isset($_POST['update_brand'])){

$brand_title123 =$_POST['brand_title1'];


$update_brand = "UPDATE brands set  brand_title='$brand_title123' where brand_id='$brand_edit_id'";

$run_update = mysqli_query($con, $update_brand);

if($run_update){

    echo "<script>alert('Brand Has Been Updated')</script>";


    echo "<script>window.open('index.php?view_brands','_self')</script>";
    


}


}
}
?>


