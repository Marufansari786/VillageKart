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
                  <h3 class="pt-4">Insert New Brands</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:30%; margin-top:0px;">

                  <form class="forms-sample pt-5" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">New Brand Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="brand_title" id="exampleInputUsername2" placeholder="Brand" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Brand Image</label>
                      <div class="col-sm-9">
                        <input type="file" name="brand_img" class="form-control" id="exampleInputEmail2" required>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div> -->

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select Categories</label>
                          <div class="col-sm-9">
                          <select name="cat_id"  class="form-control" required>
                           <option>-Choose Categories-</option>

    <?php

    $sql_cat="SELECT * FROM categories";
    $run_cat=mysqli_query($con,$sql_cat);
    if(mysqli_num_rows($run_cat) > 0){
        while($row_cat=mysqli_fetch_assoc($run_cat)){ ?>


            <option value="<?php echo $row_cat['cat_id']; ?>"><?php echo $row_cat['cat_title']; ?></option>

            <?php
        }
    }
    ?>

</select>
                          </div>
                        </div>

                  
                  
                    <button type="submit" name="insert_brand" class="btn mr-2" style="background-color:#7fad39; color:white;">Insert Brand</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>


<?php



if(isset($_POST['insert_brand'])){ 



$cat_id =$_POST['cat_id'];

$brand_title =$_POST['brand_title'];
$brand_img =$_FILES['brand_img']['name'];
$brand_tmp =$_FILES['brand_img']['tmp_name'];

move_uploaded_file($brand_tmp,"brand_img/$brand_img");

$insert_brand ="INSERT into brands (brand_title,brand_img,cat_id) VALUES ('$brand_title','$brand_img','$cat_id')";

$run_brand = mysqli_query($con, $insert_brand);

if($run_brand){

echo "<script>alert('New Brand Has Been Inserted')</script>";


echo "<script>window.open('index.php?view_brands','_self')</script>";

}



}

?>


<?php } ?>