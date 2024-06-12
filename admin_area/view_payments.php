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
                  <h3 class="pb-3 pt-3">View All Payments</h3>
             
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-danger">
                          <th>#</th>
                          <th>Payment ID</th>
                          <th>Invoice.No</th>
                          <th>Amount</th>
                          <th>Costumer Email</th>
                          <th>Payment Date</th>
                          <th>Payment Status</th>

                          <!-- <th>
                            Delete
                          </th> -->
                        </tr>
                      </thead>
                     
                      <tbody>

                      <?php



$get_payments ="SELECT * FROM payments";
$run_payments = mysqli_query($con, $get_payments);
$i=0;
while($row_payments=mysqli_fetch_array($run_payments)){


$payment_id=$row_payments['payment_id'];
$invoice=$row_payments['invoice_no'];
$amount=$row_payments['amount'];
$costumer_email=$row_payments['costumer_email'];
$date=$row_payments['payment_date'];
$payment_status=$row_payments['payment_status'];
 $i++;



?>
                        <tr>

                        <td><?php echo $i; ?></td>
                        <td><?php echo $payment_id; ?></td>
                        <td><?php  echo $invoice;?></td>
                        <td class="bg-warning"><?php echo $amount; ?></td>
                        <td><?php echo $costumer_email;?></td>
                        <td><?php echo $date; ?></td>
                        <td class="text-dark bg-info"><?php echo $payment_status; ?> </td>

                        </tr>

                        <?php } ?>
                       

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              <?php } ?>