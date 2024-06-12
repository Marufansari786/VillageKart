<?php

// $ip = $_SERVER['REMOTE_ADDR'];
// echo $ip;

$json =file_get_contents("http://ipinfo.io/2405:201:3011:8115:e85e:b67b:c0f2:ee5c/json");

$data=json_decode($json);
?>

<h1>Country : <?php echo $data->country ; ?></h1>
<h1>State : <?php echo $data->region ; ?></h1>
<h1>City : <?php echo $data->city ; ?></h1>
<h1>Geoloc : <?php echo $data->loc ; ?></h1>
