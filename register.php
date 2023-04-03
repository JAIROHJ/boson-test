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
  <h2>Register New User</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label >Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  placeholder="Enter Image" name="image">
    </div>
    <div class="form-group">
      <label >Details:</label>
      <textarea class="form-control" name="user_details"  ></textarea>
    </div>
    
    
    <input type="submit" name="insert_btn" class="btn btn-primary">
  </form>


  <?php
  $conn = mysqli_connect('localhost','root','','bcrud');


if(isset($_POST['insert_btn'])){
    
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $user_details = $_POST['user_details'];
    

    $insert = "INSERT INTO users (user_name, user_email, user_password, user_image, user_details) VALUES ('$user_name', '$user_email', '$user_password','$image','$user_details')";

    $run_insert = mysqli_query($conn,$insert);
    if($run_insert === true){
        echo "Data Insert successfully";
        move_uploaded_file($image_tmp,"upload/$image");
    }else{
        echo "failed";
    }
}

  ?>
</div>

</body>
</html>
