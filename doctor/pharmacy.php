<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');
echo "<h2 align='right'>".$date."</h2>";
$user = $_SESSION['email'];
if(!$user){
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
    <a class="nav-link" href="paient"><font color="black">Paient appointment</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="pharmcy.php"><font color="black">Pharmacy</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><font color="black">Logout</font><br></a>
  </li>
    &nbsp;&nbsp;
  
</ul> 
  </div>
</nav>
<style>
	#box{
		width:95%;
		margin-left:5%;
	}
</style>


</body>
</html>