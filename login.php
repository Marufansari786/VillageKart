<?php
session_start();
include("includes/db.php");



    if (isset($_POST['login'])) {

        $costumer_email = $_POST['c_email'];
        $costumer_pass = md5($_POST['c_pass']);
        $sel_costumer = "SELECT * FROM costumers WHERE '$costumer_email' IN(costumer_email,costumer_contact) AND costumer_pass='$costumer_pass'";

        $run_costumer = mysqli_query($con, $sel_costumer);
    if(mysqli_num_rows($run_costumer)){

$row_costumer=mysqli_fetch_assoc($run_costumer);

$_SESSION['COSTUMER_NAME'] = $row_costumer['costumer_name'];
$name =$_SESSION['COSTUMER_NAME'];
$_SESSION['COSTUMER_EMAIL'] = $row_costumer['costumer_email'];
$_SESSION['LOGINMSG']="Welcome <b class='text-info'> $name </b>" ;
 
$response= true;

echo"<script>window.open('index.php','_self')</script>";
    }else{
        echo"<script>window.open('index.php','_self')</script>";
        $_SESSION['LOGINMSG']='User Has No Registered, Please Registered Your Account..!';
    }
       
}
        


    ?>


