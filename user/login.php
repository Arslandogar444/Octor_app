<?php
include_once 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

<!-- Custom Theme files -->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
    <a class="navbar-brand" href="../index.php" style="margin: 0;">
      <img src="../logo.png">
    </a>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="" style="width: 100%;">
      <ul class="nav" style="display: flex; align-items: center; justify-content: space-evenly; flex-wrap: wrap;">
        <li class="nav-item">
          <a class="nav-link" href="../doctor/doctor.php">
            <font color="black">Doctors</font><br>Book an Appointment
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pharmacy/pharmacy.php">
            <font color="black">Pharmacy</font><br>Medicines & health Product
          </a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="dropbtn" style="background-color:#0974DA;border-radius: 12px;padding:10px 20px;">Login/Register</button>
            <div class="dropdown-content">
              <a href="../doctor_reg.php">Doctor</a>
              <a href="index.php">Patient</a>
            </div>
          </div>
        <li class="nav-item" style="">
          <a href="../chat.php">
            <img src="chat.png" style="max-width: 40px;">
            <br>Consult With Doctor</a>
        </li>
      </ul>
    </div>
  </nav>

<br>
<div class="jumbotron jumbotron-fluid" style="background-image: url(12.gif); background-size: cover;">


  <div class="container" >
    <font color="white"><h1 class="display-3">Patients Account Login</h1>
    <p class="lead">Availbale For Doctor</p></font>
  </div>
</div>
<div class="main-w3layouts wrapper" style="background-color: #2370C7">
    <h1>Patient Login</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">
        <form method="post">
          
          <input class="text email" type="email" name="email" placeholder="Email" required="">
          <input class="text" type="password" name="password" placeholder="Password" required="">
          
          <div class="wthree-text" style="display:block;margin-top:20px;">
            <label class="anim">
              <input type="checkbox" class="checkbox" required="">
              <span>I Agree To The Terms & Conditions</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" name="login" value="SIGN IN">
        </form>
        <p>Don't have an Account? <a href="index.php"> Sign Up!</a></p>
      </div>
    </div><br><br>


    <div class="wthree_footer_copy" style="background-color: #2B427A;">
    <p style="padding: 26px; text-align:center;color:white;"> © 2020 Online Doctors</p>
  </div>


<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script src="js/minicart.js"></script>

</body>
</html>
<?php
include '../db.php';
session_start();
if (isset($_REQUEST['login'])) {
  $email = $_REQUEST['email'];
  $psw   = $_REQUEST['password'];
  $query = mysqli_query($db,"SELECT * FROM user WHERE email = '$email' && password = '$psw'");
  $result = mysqli_num_rows($query);
  if ($result==true) {
    $_SESSION['email']=$email;
    echo "<script>alert('$email login success full.')</script>";
    echo "<script>window.open('acc.php','_self')</script>";
  }
}
?>



