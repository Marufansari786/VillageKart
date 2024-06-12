<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #7fad39;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<center>
  <div style="margin-top: 180px;">
<h1 style="padding: 10px; ">Thanks For Payments... </h1>
<p style="padding: 5px; ">Please Wait Page Will Redirect...</p>

<div class="loader" style="padding: 10px; "></div>
</div>
</center>
</body>
</html>


<script>

setTimeout(function(){

window.location.href='index.php';
}, 2000);
</script>

