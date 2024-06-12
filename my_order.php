<?php
session_start();
include("includes/db.php");
include("header.php");

?>



<div class="container">
    <div class="row">
        <h2 class="col-12 text-center p-2 mt-2 m-2 rounded" style="background-color: #E5E4E4;">Ordered Product's Detail</h2>
<table class="table table-striped tableResponse">
  <thead>
    <tr class="table-success" align="center">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      
      <th scope="col">Price</th>
      <th scope="col">Order Date</th>
      <th scope="col">Delivery Date</th>
      <th scope="col">Payment Status</th>
    </tr>
  </thead>
  <?php
$Cnt = 0;


$Cemail =$_SESSION['COSTUMER_EMAIL'];



$MyOrderSql="SELECT * FROM m_order WHERE costumer_email='$Cemail' ORDER BY id DESC";
$RunMyOrder=mysqli_query($con,$MyOrderSql);
if(mysqli_num_rows($RunMyOrder) > 0){


    while($RowsMyOrder=mysqli_fetch_assoc($RunMyOrder)){

    $M_id=$RowsMyOrder['id'];

    $SubOrderSql="SELECT * FROM s_order WHERE m_order_id='$M_id'";
    $RunSubOrder=mysqli_query($con,$SubOrderSql);
    if(mysqli_num_rows($RunSubOrder) > 0){


                                    while($RowSubOrder=mysqli_fetch_assoc($RunSubOrder)){
                                        $pro_id=$RowSubOrder['p_id'];
                                    $Cnt=$Cnt+1;

                                    $SQLPro="SELECT * FROM products WHERE product_id='$pro_id' ORDER BY product_id DESC";
                                    $RUNPro=mysqli_query($con,$SQLPro);
                                    $ROWPro=mysqli_fetch_assoc($RUNPro);
                                 
?>
  <tbody>
    <tr class="table-danger">
      <th scope="row"><?php echo $Cnt ?></th>
      <td class="font-weight-bold" align="center"><a href="view_all_pro.php?pid=<?php echo $ROWPro['product_id'];?>"><?php echo $ROWPro['product_title'] ?></a></td>
      <td align="center">₹ <?php echo $RowSubOrder['product_price'] ?></td>
      <td align="center"><?php echo  date('d/m/Y H:i:s', strtotime($RowsMyOrder['order_date'])) ?></td>
      <!-- <td align="center"><?php// echo $RowsMyOrder['order_date'] ?></td> -->
      <td align="center"><?php echo date('d/m/Y', strtotime($RowsMyOrder['order_date'] . ' +3 days')); ?></td>

      <?php if($RowsMyOrder['payment_status'] == 'Complete'){ ?>
      <td class="text-success font-weight-bold" align="center">Paid</td>
     <?php }else{ ?> 
      <td class="text-danger font-weight-bold" align="center">Pending</td>
      
      <?php } ?>
    </tr>

  </tbody>
  <?php    } } } } ?>

</table>



</div>
<center>
  <!-- <form method="POST">
<button class="btn btn-info" id="clear" disabled>Clear All</button>
  </form>
</center> -->
</div>



<script>
$(document).ready(function(){
  $('#clear').click(function(e){
    var click = 'echo';  

 e.preventDefault();

 $.ajax({

  url :"clear.php",
  type: "POST",
data: {

  click : click

},

success : function(response){

  $('.tableResponse').html(response);

}
 });

  });


})

</script>














<?php
include("footer.php");
?>