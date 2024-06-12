<?php
include("include/db.php");

session_start();



session_destroy();

echo "<script>window.open('admin_login.php','_self')</script>";

?>