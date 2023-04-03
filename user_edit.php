<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
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
      <a class="navbar-brand" href="index.php">Boson Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="user_view.php" >View</a></li>
      <li><a href="user_edit.php">Edit</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  <h2>Edit User</h2>

  <?php
   $conn = mysqli_connect('localhost','root','','bcrud');
   if(isset($_GET['edit'])){
     $edit_id = $_GET['edit'];

     $select = "SELECT * FROM users WHERE user_id = '$edit_id'";
     $run = mysqli_query($conn,$select);
     $row_user = mysqli_fetch_array($run);
      
     $user_name = $row_user['user_name'];
     $user_email = $row_user['user_email'];
     $user_password = $row_user['user_password'];
     $user_image = $row_user['user_image'];
     $user_details = $row_user['user_details'];
   }

?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name;?>" placeholder="Enter Name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"value="<?php echo $user_email;?>"   placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"value="<?php echo $user_password;?>"   placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control" value=""   placeholder="Enter Image" name="image">
    </div>
    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control"value="<?php echo $user_details;?>"  name="user_details"  ></textarea>
    </div>
    
    
    <input type="submit" name="insert_btn" class="btn btn-primary">
  </form>


  <?php
  $conn = mysqli_connect('localhost','root','','bcrud');


if(isset($_POST['insert_btn'])){
    
    $edituser_name = $_POST['user_name'];
    $edituser_email = $_POST['user_email'];
    $edituser_password = $_POST['user_password'];
    $editimage = $_FILES['image']['name'];
    $editimage_tmp = $_FILES['image']['tmp_name'];
    $edituser_details = $_POST['user_details'];
    
    if(empty($editimage)){
        $editimage = $user_image;
    }
    

    $update = "UPDATE  users SET user_name = '$edituser_name', user_email='$edituser_email', user_password='$edituser_password', user_image='$editimage', user_details=' $edituser_details' WHERE user_id = '$edit_id'";

    $run_update = mysqli_query($conn,$update);
    if($run_update === true){
        echo "Data update successfully";
        move_uploaded_file($editimage_tmp,"upload/$editimage");
    }else{
        echo "Failed,Try Again";
    }
}

  ?>
  <br>
  <a href="user_view.php" class="btn btn-primary">User View</a>
</div>

</body>
</html>
