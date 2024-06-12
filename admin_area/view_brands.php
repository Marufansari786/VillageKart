<?php

@session_start();
include("include/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";


}

else{
    


?>


              <div class="card mt-5">
                <div class="card-body text-center">
                  <h3 class="pb-3 pt-3">View All Brands</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered m-0 p-0">
                      <thead>
                        <tr style="background-color:lightyellow;">
                       
                          <th>#</th>
                          <th>Brand Title</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                       </thead>


                       <?php 


$get_brands="SELECT * from brands";
$run_brands= mysqli_query($con, $get_brands);
while($row_brands=mysqli_fetch_array($run_brands)){

    $brand_id= $row_brands['brand_id'];
    $brand_title= $row_brands['brand_title'];



?>


                      <tbody>
                        <tr>

                        <td><?php echo $brand_id; ?></td>
                        <td> <?php echo $brand_title; ?></td>

                          <td>
                          <h3><a href="index.php?edit_brand=<?php echo $brand_id; ?>"><i class="mdi mdi-pencil-box text-primary font-bold"></i></a></h3>
                          </td>

                          <td>
                          <h3><a href="index.php?delete_brand=<?php echo $brand_id; ?>"><i class="mdi mdi-close-circle text-danger font-bold"></i></a></h3>
                          </td>

                        </tr>
                        <?php } ?>
                        
                       

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <?php } ?>
        