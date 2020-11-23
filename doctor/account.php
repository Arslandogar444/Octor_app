<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');
echo "<h2 align='right'>".$date."</h2>";
$email = $_SESSION['email'];
if(!$email){
  header('location:../index.php');
}

?>
<?php
include_once 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="jumbotron jumbotron-fluid" style="background-color: blue;">
  <div class="container">
    <center><h1 class="display-3">Welcome To Doctor</h1></center>
    
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="navbar-brand" href="account.php"><img src="../logo.png"></a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="">
    <ul class="nav justify-content-center">
  

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="view_pro.php"><font color="black">View Profile</font><br></a>
  </li>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="app.php"><font color="black">Paient appointment</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><font color="black">Logout</font><br></a>
  </li>
    &nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item" style="">
  
  <a href="chat.php"><img src="chat.png"><br>Consult With Doctor</a>
</ul> 
  </div>
</nav>
<style>
	#box{
		width:95%;
		margin-left:5%;
	}
</style>
<?php 
$email = $_SESSION['email'];
include 'db.php';
$sql = mysqli_query($db,"SELECT * FROM doctor WHERE email = '$email'");
$result = mysqli_fetch_array($sql);
$name = $result['name'];
$sp = $result['specialty'];
 ?>
<div class="container">
  <h2>Make Your Profile</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Phone NO.:</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter Phone #" name="ph" >
    </div>
    <div class="form-group">
      <label for="pwd">Speacialty:</label>
      <input type="text" class="form-control" id="pwd"  name="sp" value="<?php echo $sp; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Location:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Location" name="loc">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter address" name="address">
    </div>
    <div class="form-group">
      <label for="pwd">Picture:</label>
      <input type="file" class="form-control" id="pwd" placeholder="Enter Location" name="pic">
    </div>
  
    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  </form>
</div>

</body>
</html>
<?php
include '../db.php';
if (isset($_POST['submit'])) {
  $name1 = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['ph'];
  $spe   = $_POST['sp'];
  $loc   = $_POST['loc'];
  $add   = $_POST['address'];
  $name2 = $_FILES['pic']['name'];
  $tmp_name = $_FILES['pic']['tmp_name'];
  $folder = "image/".$name2;
   move_uploaded_file($tmp_name , $folder);
   $sql = mysqli_query($db,"INSERT INTO doctor_profile(name,email,phone_no,specialty,location,address,pic) VALUES ('$name1','$email','$phone','$spe','$loc','$add','$folder')");
   if ($sql) {
     echo "<script>alert('Submit Profile')</script>";
   }
}
?>