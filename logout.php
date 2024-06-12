<?php
session_start();
unset($_SESSION['COSTUMER_NAME']);
unset($_SESSION['COSTUMER_EMAIL']);

header('Location: index.php');
?>