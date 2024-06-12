<?php
include("include/db.php");
?>

<!DOCTYPE html>
<html>
 
<head>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
     
    th,
    td {
        padding: 20px;
    }
    </style>
</head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<body>
    <div class="container">
<div class="row">
    <div class="col-6 col-md-6 col-lg-6">
        <h2 class="text-center mt-2">Shipping Address Table</h2>
        <table style="width:100%" class="mt-5 p-2 bg-dark text-light">
        <tr>
            <th>Shipping Name</th>
            <th>Shipping Email</th>
            <th>Shipping Number</th>
            <th>Shipping Address</th>
            <th>Shipping Address Line 2</th>
        </tr>
       <?php 
       if(isset($_GET['id'])){
           $mid = $_GET['id'];
$mOrder="SELECT * FROM m_order WHERE id='$mid'";
$runorder=mysqli_query($con,$mOrder);
if(mysqli_num_rows($runorder) > 0){
    $roworder=mysqli_fetch_assoc($runorder);?>
      
        <tr>
            <td><?php echo $roworder['sn']; ?></td>
            <td><?php echo $roworder['se']; ?></td>
            <td><?php echo $roworder['sp']; ?></td>
            <td><?php echo $roworder['sa']; ?></td>
            <td><?php echo $roworder['sa2']; ?></td>
        </tr>
    </table>

    </div>


    <div class="col-6 col-md-6 col-lg-6">
    
    <h2 class="text-center mt-2">Billing Address Table</h2>
        <table style="width:100%" class="mt-5 p-2 bg-dark text-light">
        <tr>
        <th>Billing Name</th>
            <th>Billing Email</th>
            <th>Billing Number</th>
            <th>Billing Address</th>
            <th>Billing Address Line 2</th>
        </tr>
        <tr>
            <td><?php echo $roworder['bn']; ?></td>
            <td><?php echo $roworder['be']; ?></td>
            <td><?php echo $roworder['bp']; ?></td>
            <td><?php echo $roworder['ba']; ?></td>
            <td><?php echo $roworder['ba2']; ?></td>
        </tr>
        
    </table>
    <?php } } ?>
</div>
</div>
</div>
</body>
 
</html>