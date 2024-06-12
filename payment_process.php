<?php
session_start();
include("includes/db.php");
include("header.php");


if(isset($_POST['amount'])){
$Cemail=$_SESSION['COSTUMER_EMAIL'];
$invoice=time()+9*4;
$payment_status='Pending';
$amount=$_POST['amount'];


$paymentsSQL="INSERT INTO payments SET costumer_email='$Cemail',invoice_no='$invoice',amount='$amount', payment_status='$payment_status'";
$RunPayment=$con->query($paymentsSQL);

$_SESSION['PID']=mysqli_insert_id($con);
}



if(isset($_POST['payment_id'])){
   
$payment_status='Complete';
  
    $payment_id=$_POST['payment_id'];
    
    
    
    $paymentsSQL="UPDATE payments SET payment_id='$payment_id',payment_status='$payment_status' WHERE id='".$_SESSION['PID']."'";
    $RunPayment=$con->query($paymentsSQL);

    
    $updateCart="UPDATE cart SET payment_id='$payment_id' WHERE costumer_email='$Cemail'";
    $runupdate=$con->query($updateCart);

    if($runupdate){
        $updateM_order="UPDATE m_order SET payment_status='Complete' WHERE costumer_email='$Cemail'";
           $M_orderupdate=$con->query($updateM_order); }
       
}
?>
<?php
$payments="SELECT * FROM payments WHERE costumer_email='$Cemail'";
$run_payments=$con->query($payments);
// $row_payments=$run_payments->fetch_assoc();
if(mysqli_num_rows($run_payments) > 0){
 $del="DELETE FROM cart WHERE payment_id='$payment_id'";
 $rundel=$con->query($del);

}
?>




































<?php
include("footer.php");
?>