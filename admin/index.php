<?php include_once 'head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <center><h1 class="display-3">Welcome To Admin</h1></center>
    
  </div>
</div>
<center><h1>Admin Login</h1></center>
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Admin Name</label>
    <input type="text" name = "name" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input type="password" name="psw" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
  <input type="submit" class="btn btn-primary btn-lg" name="login" value="Login">
</form>
</body>
</html>
<?php
include("db.php");
session_start();
if(isset($_REQUEST['login'])){
    $user = $_REQUEST['name'];
    $pass = $_REQUEST['psw'];
    $get_user = mysqli_query($db,"select * from admin where name='$user' && password='$pass' ");
    $count = mysqli_num_rows($get_user);
    if($count==true){
        $_SESSION['user']=$user;
        echo"<script>alert('$user Successfully Login!')</script>";
        echo"<script>window.open('home.php','_self')</script>";
    }
    else{
        echo"<script>alert('$user Not Successfully Login!')</script>";
    }
}



?>