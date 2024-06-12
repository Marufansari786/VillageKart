<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<?php
session_start();
include("includes/db.php");
include("header.php");
$total=0;
$costumer_email = $_SESSION['COSTUMER_EMAIL'];

$bn = $_POST['bn'];
$be = $_POST['be'];
$bp = $_POST['bp'];
$ba = $_POST['ba'];
$ba2 = $_POST['ba2'];
$sn = $_POST['sn'];
$se = $_POST['se'];
$sp = $_POST['sp'];
$sa = $_POST['sa'];
$sa2 = $_POST['sa2'];
$order_date=time();


$sql_ins="INSERT INTO m_order SET bn='$bn', be='$be', bp='$bp', ba='$ba', ba2='$ba2',sn='$sn', se='$se', sp='$sp', sa='$sa', sa2='$sa2', costumer_email='$costumer_email',order_date=NOW()";
$con->query($sql_ins);

$moid = $con->insert_id;

$selCart="SELECT * FROM cart WHERE costumer_email='$costumer_email'";
$runCart=$con->query($selCart);

while($row=$runCart->fetch_assoc()){

    $pid=$row['p_id'];
    $qty=$row['qty'];
    $cart_id=$row['cart_id'];

    $sqlProduct="SELECT * FROM products WHERE product_id='$pid'";
    $runProduct=$con->query($sqlProduct);

    while($rowProduct =$runProduct->fetch_assoc()){

        $price=$rowProduct['product_price'];
        $total=$total+($row['qty'] * $rowProduct['product_price']);

        
        $icart="INSERT INTO s_order SET m_order_id='$moid', p_id='$pid', qty='$qty', product_price='$price', costumer_email='$costumer_email'";
        $con->query($icart);

    }


}


?>





<script>
            
            var amount = <?php echo $subtotalPrice; ?>;
            jQuery.ajax({
type : "POST",
url : "payment_process.php",
data : "amount="+amount,
success : function(result){

    var options = {
    // "key": "rzp_test_SfdpsUwGnAP2s4", // Enter the Key ID generated from the Dashboard
    "key": "rzp_test_rvt0HRLUj3hHOn",
    "amount": "<?php echo $subtotalPrice*100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "handler": function(response){

        console.log(response);
  jQuery.ajax({
type : "POST",
url : "payment_process.php",
data : "payment_id="+response.razorpay_payment_id,
success : function(result){

    window.location.href="thankyou.php";
}

    });


    },
    "prefill": {
        "name": "<?php echo $ba ?>",
        "email": "<?php echo $be ?>",
        "contact": "<?php echo $bp ?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
$(document).ready(function(e){
    rzp1.open();
    e.preventDefault();
})
}

    });


</script>




<?php
include("footer.php");
?>


