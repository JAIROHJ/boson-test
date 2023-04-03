<?php
session_start();
$conn = mysqli_connect('localhost','root','','bcrud');

if(!isset($_SESSION['email'])){
  echo "<script> window.open('login.php','_self');</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Boson test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Boson Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="user_view.php" >View</a></li>
      <li><a href="user_edit.php">Edit</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
  


  
</div>

</body>
</html>
