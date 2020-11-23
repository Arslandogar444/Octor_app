<?php
include_once 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> 
  addEventListener("load", function(){
    setTimeout(hideURLbar, 0);
  }, false);
  function hideURLbar(){
    window.scrollTo(0,1);
  }
</script>
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
    <font color="white"><h1 class="display-3">Patients Register</h1>
    <p class="lead">Availbale For Doctor</p></font>
  </div>
</div>
<div class="main-w3layouts wrapper" style="background-color: #2370C7;">
    <h1>Patient Register</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">
        <form action="#" method="post">
          <input class="text" type="text" name="username" placeholder="Username" required="">
          <input class="text email" type="email" name="email" placeholder="Email" required="">
          <input class="text email" type="text" name="phone" placeholder="phone no..." required="">
          <input class="text" type="password" name="password" placeholder="Password" required="">
          <input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
          <div class="wthree-text">
            <label class="anim">
              <input type="checkbox" class="checkbox" required="">
              <span>I Agree To The Terms & Conditions</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" name="reg" value="SIGNUP">
        </form>
        <p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
      </div>
    </div><br><br>


    <div class="wthree_footer_copy" style="background-color: #2B427A;">
    <p style="padding: 26px; text-align:center;color:white;"> © 2020 Online Doctors</p>
  </div>


<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$(".dropdown").hover(            
function() {
$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
$(this).toggleClass('open');        
},
function() {
$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
$(this).toggleClass('open');       
}
);
});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
$(document).ready(function() {
/*
var defaults = {
containerID: 'toTop', // fading element id
containerHoverID: 'toTopHover', // fading element hover id
scrollSpeed: 1200,
easingType: 'linear' 
};
*/

$().UItoTop({ easingType: 'easeOutQuart' });

});
</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
paypal.minicart.render();

paypal.minicart.cart.on('checkout', function (evt) {
var items = this.items(),
len = items.length,
total = 0,
i;

// Count the number of each item in the cart
for (i = 0; i < len; i++) {
total += items[i].get('quantity');
}

if (total < 3) {
alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
evt.preventDefault();
}
});

</script>

</body>
</html>

<?php
include ("../db.php");
if(isset($_POST['reg'])){

$email = $_POST['email'];

$check = "SELECT email FROM user WHERE email = '{$email}'";


$result = $db->query($check);
$rows = $result->num_rows;
if($rows > 0){


echo "<script>alert('Email Already taken.')</script>";

}else{




$name       = $_POST['username'];
$password     = $_POST['password'];
$con_password   = $_POST['cpassword'];
$phone      = $_POST['phone'];



if($password === $con_password){




$reg_query = "INSERT INTO user(user_name,email,phone,password,status) VALUES ('$name','$email','$phone','$password','pending')";


$result_reg = $db->query($reg_query);

if($result_reg){

echo "<script>alert('Account has been Created.')</script>";

}else{

  die($db->error);
}





}else{


echo "<script>alert('password not match try again.')</script>";



}






} 



}



  

?>




