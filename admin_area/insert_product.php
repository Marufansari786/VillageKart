<?php

@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    

?>









<div class="card text-center">
                <div class="card-body">
                  <h3 class="">Insert New Product</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:55%;">
                  <form class="forms-sample pt-3" method="POST" enctype="multipart/form-data">


                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Title</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_title" class="form-control" id="exampleInputUsername2" placeholder="Username">
                      </div>
                    </div>

                    

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Categories</label>
                          <div class="col-sm-9">
                            <select name="product_cat" class="form-control">
                            <option>Select A Category</option>

                            <?php
                        $get_cats = "select* from categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];


                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                        ?>
                            </select>
                          </div>
                        </div>

                        
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Brand</label>
                          <div  class="col-sm-9">
                            <select name="product_brand" class="form-control">
                            <option>Select Brand</option>

<?php

$get_brands = "select* from brands";
$run_brands = mysqli_query($con, $get_brands);


while ($row_brands = mysqli_fetch_array($run_brands)) {
    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];

    echo "<option value='$brand_id'>$brand_title</option> ";
}
?>                            </select>
                          </div>
                        </div>

                        
                    


                        <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product image1</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_img1" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product image2</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_img2" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product image3</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_img3" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div>
                  

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product Price</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_price" class="form-control" id="exampleInputMobile" placeholder="Enter Price In INR ₹">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Product Description</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" name="product_desc" aria-label="With textarea"></textarea>
                      </div>
                    </div>

                    
                      



                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Keyword</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_keywords" class="form-control" id="exampleInputConfirmPassword2" placeholder="Product Keyword">
                      </div>
                    </div>
                

                    <button type="submit" name="insert_product" class="btn mr-2" style="background-color:#7fad39; color:white;">Inserting</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>



              <?php
if(isset($_POST['insert_product'])) {
    //text variable
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $status = 'on';
    $product_keywords = $_POST['product_keywords'];

    //image name

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];


    //image temp name
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];


    if ($product_title == '' or $product_cat == '' or  $product_brand == '' or $product_price == '' or $product_desc == '' or $product_keywords == '' or  $product_img1 == '') {

        echo "<script>alert('please fill all the field!')</script>";

        exit();
    } else {

        //uploading images to its folder
        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");


        $insert_product = "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_dsc,status,product_keywords) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status','$product_keywords')";

        // $query = "insert into  products( product_id ,  cat_id ,  brand_id ,  date ,  product_title ,  product_img1 ,  product_img2 ,  product_img3 ,  product_price ,  product_dsc, status) VALUES ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";

        // echo "<script>alert("+$query+")</script>";
        // echo $insert_product;
        $run_product = mysqli_query($con,$insert_product);


        // echo $run_product;
        if($run_product)
        {
            echo "<script>alert('Product Inserted Succesfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }else{
            echo "<script>alert('Product Inserting failed')</script>";
        }

    }
}
?>
<?php } ?>