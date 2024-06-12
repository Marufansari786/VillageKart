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
                  <h3 class="pb-3 pt-3">View All Categories</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered m-0 p-0">
                      <thead>
                        <tr style="background-color:lightyellow;">
                      
                          <th>#</th>
                          <th>Category Title</th>
                          <th>Category Image</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          </tr>


                      </thead>

                      <tbody>

                      <?php 


$get_cats="SELECT * from categories";
$run_cats= mysqli_query($con, $get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){

    $cat_id= $row_cats['cat_id'];
    $cat_title= $row_cats['cat_title'];
    $cat_img =$row_cats['cat_img'];


?>

                        <tr>

                          <td><?php echo $cat_id; ?></td>
                          <td><?php echo $cat_title; ?></td>

                          <td><img src='cat_img/<?php echo $row_cats["cat_img"];?>' width="50" height="50"></td>
                         
                        
                          <td>
                          <h3><a href="index.php?edit_cat=<?php echo $cat_id; ?>"><i class="mdi mdi-pencil-box text-primary font-bold"></i></a></h3>
                          </td>

                          <td>
                          <h3><a href="index.php?delete_cat=<?php echo $cat_id; ?>"><i class="mdi mdi-close-circle text-danger font-bold"></i></a></h3>
                          </td>

                        </tr>

                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <?php } ?>
        