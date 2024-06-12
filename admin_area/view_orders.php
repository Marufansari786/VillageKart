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
                  <h3 class="pb-3 pt-3">View All Orders</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr style="background-color:lightblue;">
                          <th>Order.No</th>
                          <th>Customer Name</th>
                          <th>Customer Email</th>
                          <th>Customer Phone</th>
                          <th>Invoice.No</th>
                          <th>Products</th>
                          <th>Quantity</th>
                          <th>Payment Status</th>
                          <th>Payment ID</th>
                          <th>Payment</th>
                          <th>Deliver Status</th>
                          <th>View Shiping Address</th>

                        </tr>
                      </thead>
                     
                      <tbody>


                      <?php



$get_orders ="SELECT * from s_order ORDER BY id DESC";
$run_orders = mysqli_query($con, $get_orders);
$i=0;
while($row_orders=mysqli_fetch_array($run_orders)){

$p_id=$row_orders['p_id'];
$costumer_email = $row_orders['costumer_email'];


$get_costumer = "SELECT * from costumers where costumer_email='$costumer_email'";
$run_costumer=mysqli_query($con, $get_costumer);
$row_costumer=mysqli_fetch_array($run_costumer);


$costumer_name=$row_costumer['costumer_name'];

$costumer_contact=$row_costumer['costumer_contact'];

$invSQL="SELECT DISTINCT id,	payment_id,	invoice_no,	amount, payment_date, payment_status,costumer_email FROM `payments` WHERE costumer_email='$costumer_email'";
$runinv=mysqli_query($con,$invSQL);
while($rowinv=mysqli_fetch_assoc($runinv)){

$invoice=$rowinv['invoice_no'];
 

$proSQL="SELECT * FROM `products` WHERE product_id='$p_id'";
$runpro=mysqli_query($con,$proSQL);
while($rowpro=mysqli_fetch_assoc($runpro)){
$p_id=$rowpro['product_title'];




$qty=$row_orders['qty'];

$status=$rowinv['payment_status'];
 $i++;



?>

                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $costumer_name; ?></td>
                        <td>
                        <?php 

                     
                        echo $costumer_email;
                        ?>
                        <td><?php echo $costumer_contact; ?></td>
                        </td>

                        <td><?php  echo $invoice;?></td>
                        <td><?php echo $p_id;?></td>
                        <td><?php echo $qty; ?></td>

                        <td>
                        <?php 
                      $mOrder="SELECT * FROM m_order WHERE costumer_email='$costumer_email'";
                      $runorder=mysqli_query($con,$mOrder);
                      if(mysqli_num_rows($runorder) > 0){
                          $roworder=mysqli_fetch_assoc($runorder);
                         if($roworder['payment_status'] == 'Pending'){
                             echo $roworder='Pending';
                         }
                         else{
                             echo $roworder='Complete';
                         }

                         ?>
                         </td>

                          <td>

                          <?php echo $payment_id=$rowinv['payment_id']; ?>
                          </td>

 <td>  <?php echo $total = $row_orders['product_price'] * $row_orders['qty']; ?></td>


<td class="font-weight-bold text-danger"><?php echo $D_status =$row_orders['deliver_status']; ?></td>
<td><a href="view_shipping_add.php?id=<?php echo $row_orders['m_order_id']; ?>">View</a></td>




                        </tr>

                        <?php } } } } } ?>
                     

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>

              <?php  ?>
        