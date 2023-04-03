<!DOCTYPE html>
<html lang="en">
<head>
  <title>User View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
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
<div class="container">
  <h2>User Detail View</h2>
            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect('localhost','root','','bcrud');
      if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $delete = "DELETE FROM users WHERE user_id = '$del_id'";
        $run_delete = mysqli_query($conn,$delete);
        if($run_delete === true){
          echo "Record has been deleted";
        }else{
          echo "Failed,Try again";
        }
      }

      $select = "SELECT * FROM users";
      $run = mysqli_query($conn,$select);
      while ($row_user = mysqli_fetch_array($run)){

    
      $user_id = $row_user['user_id'];
      $user_name = $row_user['user_name'];
      $user_email = $row_user['user_email'];
      $user_password = $row_user['user_password'];
      $user_image = $row_user['user_image'];
      $user_details = $row_user['user_details'];
      ?>
      <tr>
        <td><?php echo $user_id; ?></td>
        <td><?php echo $user_name ;?></td>
        <td><?php echo $user_email; ?></td>
        <td><?php echo $user_password ;?></td>
        <td> <img src="upload/<?php echo $user_image;?>" height="50px"></td>
        <td><?php echo $user_details; ?></td>
        <td><a class="btn btn-success" href="user_edit.php?edit=<?php echo $user_id; ?>">Edit</a></td>
        <td><a class="btn btn-danger" href="user_view.php?del=<?php echo $user_id; ?>">Delete</a></td>
       
      </tr>
      <?php } ?>
      
    </tbody>
  </table>
</div>

</body>
</html>