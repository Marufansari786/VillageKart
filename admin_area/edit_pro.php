<?php


@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


//getting products
if(isset($_GET['edit_pro'])){

    $edit_id =$_GET['edit_pro'];

    $get_edit ="SELECT * from products where product_id='$edit_id'";

    $run_edit =mysqli_query($con, $get_edit);

    $row_edit = mysqli_fetch_array($run_edit);

    $update_id=$row_edit['product_id'];

      $p_title=$row_edit['product_title'];
      $cat_id=$row_edit['cat_id'];
      $brand_id=$row_edit['brand_id'];
      $p_image1=$row_edit['product_img1'];
      $p_image2=$row_edit['product_img2'];
      $p_image3=$row_edit['product_img3'];
      $p_price=$row_edit['product_price'];
      $p_dsc=$row_edit['product_dsc'];
      $p_keywords=$row_edit['product_keywords'];
}
//gettin cats
$get_cat = "SELECT * from categories where cat_id='$cat_id'";
$run_cat = mysqli_query($con, $get_cat);
$row_cat = mysqli_fetch_array($run_cat);
$cat_edit_title = $row_cat['cat_title'];
//getting brands
$get_brand = "SELECT * from brands where brand_id='$brand_id'";
$run_brand = mysqli_query($con, $get_brand);
$row_brand = mysqli_fetch_array($run_brand);
$brand_edit_title = $row_brand['brand_title'];


?>

<div class="card text-center">
                <div class="card-body">
                  <h3 class="">Update Product</h3>
                  <hr  style="background-color:#7fad39; height:1px; width:55%;">
                  <form class="forms-sample pt-3" method="POST" enctype="multipart/form-data">


                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Title</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_title" class="form-control" id="exampleInputUsername2"  value="<?php echo $p_title;   ?>">
                      </div>
                    </div>

                    

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Categories</label>
                          <div class="col-sm-9">
                            <select name="product_cat" class="form-control">
                            <option value="<?php echo $cat_id; ?>"><?php echo $cat_edit_title; ?></option>

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
                            <option value="<?php echo $brand_id ?>"> <?php echo $brand_edit_title ?></option>

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
                        <input type="file" name="product_img1" class="form-control" id="exampleInputMobile" ><br><img src="product_images/<?php echo $p_image1; ?>" width="80" height="80" /> 
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product image2</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_img2" class="form-control" id="exampleInputMobile" ><br><img src="product_images/<?php echo $p_image2; ?>" width="80" height="80" /> 
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product image3</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_img3" class="form-control" id="exampleInputMobile" ><br><img src="product_images/<?php echo $p_image3; ?>" width="80" height="80" /> 
                      </div>
                    </div>
                  

                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product Price</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_price" class="form-control" id="exampleInputMobile" value="<?php echo $p_price; ?>">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Product Description</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" name="product_dsc" aria-label="With textarea"><?php echo $p_dsc; ?> </textarea>
                      </div>
                    </div>

                    
                      



                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Keyword</label>
                      <div class="col-sm-9">
                        <input type="text" name="product_keywords" class="form-control" id="exampleInputConfirmPassword2"  value="<?php echo $p_keywords; ?>">
                      </div>
                    </div>
                

                    <button type="submit" class="btn mr-2" style="background-color:#7fad39; color:white;" name="update_product">Update Product</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>



              
<?php
if(isset($_POST['update_product'])) {
    //text variable
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_dsc = $_POST['product_dsc'];
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


    if ($product_title == '' or $product_cat == '' or  $product_brand == '' or $product_price == '' or $product_dsc == '' or $product_keywords == '' or  $product_img1 == '') {

        echo "<script>alert('please fill all the field!')</script>";

        exit();} 
    else {

        //uploading images to its folder
        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");


       // $update_product = "UPDATE products set cat_id='$product_cat', brand_id='$product_brand,     date=NOW(), product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_price='$product_price', product_dsc='$product_dsc', product_keywords='$product_keywords where product_id='$update_id' ";

       $update_product= "UPDATE products SET cat_id='$product_cat',brand_id='$product_brand',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_dsc='$product_dsc',product_keywords='$product_keywords' WHERE product_id='$update_id'";

        // $query = "insert into  products( product_id ,  cat_id ,  brand_id ,  date ,  product_title ,  product_img1 ,  product_img2 ,  product_img3 ,  product_price ,  product_dsc, status) VALUES ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";

        // echo "<script>alert("+$query+")</script>";
       // echo $update_product;
        $run_update = mysqli_query($con,$update_product);


        //echo $run_update;
        if($run_update)
        {
            echo "<script>alert('Product Updated Succesfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }

    }
}
?>

<?php } ?>