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
                  <h3 class="pb-3 pt-3">View All Customers</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr style="background-color:lightblue;">

                          <th>#</th>
                          <th>Customer Name</th>
                          <th>Customer Email</th>
                          <th>Customer Number</th>
                          <th>Customer Image</th>
                          <th>Customer City</th>
                          <th>Customer Country</th>
                          <th>Delete</th>

                        </tr>
                      </thead>
                     
                      <tbody>


                      <?php



$get_c ="SELECT * from costumers";
$run_c = mysqli_query($con, $get_c);
$i=0;
while($row_c=mysqli_fetch_array($run_c)){

$c_id=$row_c['costumer_id'];
$c_name=$row_c['costumer_name'];
$c_email=$row_c['costumer_email'];
$c_image=$row_c['costumer_image'];
$c_contact=$row_c['costumer_contact'];
$c_city=$row_c['costumer_city'];
$c_country=$row_c['costumer_country'];

 $i++;



?>
                        <tr>

                        <td><?php echo $i; ?></td>
                        <td><?php echo $c_name; ?></td>
                        <td><?php  echo $c_email;?></td>
                        <td><?php  echo $c_contact;?></td>
                        <td><img src="../customers_image/<?php echo $row_c['costumer_image']  ?>" width="60" height="60"/></td>
                        
                        <td><?php  echo $c_city;?></td>
                        <td><?php echo $c_country; ?></td>

                        <td>
                         <h3><a href="delete_customers.php?delete_c=<?php echo $c_id;?>"><i class="mdi mdi-close-circle text-danger font-bold"></i></a></h3>
                        </td> 

                        </tr>
                        <?php } ?>
                        
                       

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              <?php } ?>