<?php
include_once 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  <style>
	#box{
		width:95%;
		margin-left:5%;
	}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
    <a class="navbar-brand" href="../index.php" style="margin: 0;">
      <img src="logo.png">
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
              <a href="doctor_reg.php">Doctor</a>
              <a href="../user/index.php">Patient</a>
            </div>
          </div>
        <li class="nav-item" style="">
          <a href="../chat.php"><img src="chat.png" style="max-width: 40px;"><br>Consult With Doctor</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  <h4 class="card-title mt-3 text-center">Login Account</h4>
  
    
  
  
  <form method = "post">

    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input type="email" name="email" class="form-control" placeholder="Email address" required="required" >
    </div> 
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input type="password" name="pass" class="form-control" placeholder="Create password" required="required">
    </div> <!-- form-group// -->
                                        
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="login" value="Login"> 
    </div> 
    </form><!-- form-group// -->      
                                                                     

</article>
</div> <!-- card.// -->

</body>
</html>
<?php
include '../db.php';
session_start();
if(isset($_REQUEST['login'])){
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['pass'];
    $get_user = mysqli_query($db,"select * from doctor where email ='$email' && password ='$pass' && status = 'Approved'");
    $count = mysqli_num_rows($get_user);
    if($count==true){
        $_SESSION['email']=$email;
        echo"<script>alert('$user Successfully Login!')</script>";
        echo"<script>window.open('view_pro.php','_self')</script>";
    }
    else{
        echo"<script>alert('$user Not Successfully Login!')</script>";
    }
}


?>