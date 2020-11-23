<?php
include_once "head.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  html,body{
    background-image:url(hd.jpg);
    background-size:cover;
  }
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  width : 100%;
  
  
  background-color: #111;
  overflow-x: hidden;

  padding-top: 60px;
  float: left;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  float: left;
  
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="jumbotron jumbotron-fluid" style="background-image:url(head.jpg); background-size:cover; ">
  <div class="container">
    <center><h1 class="display-3">Welcome To Admin</h1></center></div></div>
<div id="mySidenav" class="sidenav">
  
  <a href="home.php">Home</a>
  <a href="doc.php">Doctors</a>
  <a href="user.php">Users</a>
  <a href="add_product.php">Add Pharmacy Product</a>
  <a href="order.php">Pharmacy order</a>
  <a href="pharmacy.php">Pharmacy Products</a>
  <a href="add_disease.php">Add disease</a>
   <a href="logout.php">Logout</a>
</div>
<div>
  
   
</body>
</html> 
