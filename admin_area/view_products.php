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
                  <h3 class="">View All Products</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>

                        <tr style="background-color:lightblue;">
                          <th>#</th>
                          <th>Product Title</th>
                          <th> Product Image</th>
                          <th>Product Price</th>
                          <th> Total Sold</th>
                          <th>Product Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>

                      </thead>

                      <?php



$i=0;

$get_pro = "SELECT * from products";

$run_pro =mysqli_query($con, $get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$p_id =$row_pro['product_id'];
$p_title =$row_pro['product_title'];
$p_img =$row_pro['product_img1'];
$p_price =$row_pro['product_price'];
$status =$row_pro['status'];
$i++;




?>


                      <tbody>

                        <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $p_title ?></td>
                        <td><img src='product_images/<?php echo $row_pro["product_img1"];?>' width="50" height="50">
                        </td>
                        <td><?php echo $p_price ?></td>
                        <td>

                        <?php 
                        $get_sold = "SELECT * from pending_orders where product_id='$p_id'";
                        $run_sold = mysqli_query($con, $get_sold);
                        $count_sold = mysqli_num_rows($run_sold);
                        echo $count_sold;
                        ?> 

                         </td>

                         <td> <?php echo $status; ?></td>

                          <td>
                          <h3><a href="index.php?edit_pro=<?php echo $p_id; ?>"><i class="mdi mdi-pencil-box text-primary font-bold"></i></h3>
                         </td>

                          <td>
                          <h3><a href="delete_pro.php?delete_pro=<?php echo $p_id;?>"><i class="mdi mdi-close-circle text-danger font-bold"></i></h3>
                         </td>

                        </tr>

                      </tbody>

                      <?php } ?>

                    </table>
                  </div>
                </div>
              </div>

              <?php } ?>
        