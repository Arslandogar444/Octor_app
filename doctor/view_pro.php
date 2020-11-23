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
  <style>
html,body{
  background-image: url(bg.jpg);
  background-size: cover;
}
s
.header {
  border: 1px solid red;
  padding: 15px;
}

.menu {
  width: 25%;
  float: left;
  padding: 15px;
  border: 1px solid red;
}

.main {
  width: 75%;
  height: auto;
  float: left;
  padding: 100px;
  
}
</style>
</head>
<body>
  <div style="background-image: url(hd.jpg); width:100%;">
    <center><h1 class="display-3"><font color="#3F81A9"><b>Welcome To Doctor</b></font></h1></center>
    
  </div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="navbar-brand" href="account.php"><img src="../logo.png"></a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="">
    <ul class="nav justify-content-center">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="account.php"><font color="black">Make profile</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="view_pro.php"><font color="black">View Profile</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="app.php"><font color="black">Paitent Appointments</font><br></a>
  </li>
  <?php 
include 'db.php';
$email = $_SESSION['email'];
$fetch1 = "SELECT * FROM chat WHERE doc_email = '$email'";
$result_fetch1 = $db->query($fetch1);
$num = $result_fetch1->num_rows;

?>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><font color="black">Logout</font><br></a>
  </li>
    &nbsp;&nbsp;
      &nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <li class="nav-item" style="">
  
  <a href="chat.php"><img src="chat.png"><font color="red"><?php echo $num; ?></font><br>Consult With user</a>
</ul> 
  </div>
</nav>
<?php 
include 'db.php';
$email = $_SESSION['email'];
$fetch = "SELECT * FROM doctor_profile WHERE email = '$email'";
$result_fetch = $db->query($fetch);
$num_rows = $result_fetch->num_rows;
if($num_rows == 0){

}else{


while($rows = $result_fetch->fetch_assoc()){

$id     = $rows['id'];
$name     = $rows['name'];
$email     = $rows['email'];
$phone     = $rows['phone_no'];
$specialty     = $rows['specialty'];
$location     = $rows['location'];
$address     = $rows['address'];
$pic     = $rows['pic'];



?>
<div class="header" style="text-align: center;border-color: blue; background-color: skyblue;">
  <h1><?php echo $name; ?></h1>
</div>
<div style="border-color: blue;">
<div class="menu" style="width:15%;margin-left: 10%;">
  <img src="<?php echo $pic; ?>" style = "width:50%;">
</div>
<br>

 <form method="post">
  <div style="background-color:;">
  <div class="form-group" style = "margin-left: 31%;">
   <label for="email"><font color="white">Email:</font></label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" style = "width:70%; padding: 20px;">
    </div>
    <div class="form-group" style = "margin-left: 30%; padding: 20px;"  >
      <label for="pwd"><font color="white">Phone NO:</font></label>
      <input type="number" class="form-control" id="pwd" value="<?php echo $phone ?>" name="ph" style = "width:70%;padding: 20px;" >
    </div>
    <div class="form-group" style = "margin-left: 31%;" >
      <label for="pwd"><font color="white">Speacialty:</font></label>
      <input type="text" class="form-control" id="pwd"  name="sp" value="<?php echo $specialty; ?>" style = "width:70%; padding: 20px;">
    </div>
    <div class="form-group" style = "margin-left: 31%;">
      <label for="pwd"><font color="white">Location:</font></label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Location" name="loc" value="<?php echo $location ?>"style = "width:70%; padding: 20px;">
    </div>
    <div class="form-group" style = "margin-left: 30%; padding: 20px;">
      <label for="pwd"><font color="white">Address:</font></label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter address" name="address" value="<?php echo $address ?>" style = "width:70%; padding: 20px;">
    </div>
 <div class="form-group" style = "margin-left: 30%; padding: 20px;">
      <input type="submit" class="btn btn-primary" name="update" value="Update" style="width:70%;">
    </div>
</form>
 </div>  
</div>
</div>

<?php  }}?>
</body>
</html>
<?php
include '../db.php';
if (isset($_POST['update'])) {
  $u_email = $_POST['email'];
  $u_ph    = $_POST['ph'];
  $sp      = $_POST['sp'];
  $loc     = $_POST['loc'];
  $u_add   = $_POST['address'];
 $update_query = "UPDATE doctor_profile SET email = \"$u_email\", phone_no = \"$u_ph\", specialty = \"$sp\", location = \"$loc\", address = \"$u_add\"   WHERE email = '{$email}' ";

$result_update = $db->query($update_query);
if ($result_update) {
  echo "<script>alert('Update Profile')</script>";
}
}
?>