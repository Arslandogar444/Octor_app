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
  <a href="order.php">Pharmacy Order</a>
  <a href="pharmacy.php">Pharmacy Products</a>
  <a href="add_disease.php">Add disease</a>
   <a href="logout.php">Logout</a>
</div>
<div>
  
 <form method="post" enctype="multipart/form-data" style="text-align: center;">
  <center>
    <h2>Add Disease</h2>
   <table border="1">
     <tr><td>Disease</td><td><input type="text" name="dis" placeholder="Enter Disease"></td></tr>
     <tr><td>picture</td><td><input type="file" name="pic"></td></tr>
     <tr><td colspan="2"><input type="submit" name="submit" value="Add"></td></tr>
   </table>
   </center>
 </form>  

</body>
</html> 
<?php
include 'db.php';
if (isset($_POST['submit'])) {
  $dis = $_POST['dis'];
  $name = $_FILES['pic']['name'];
  $tmp_name = $_FILES['pic']['tmp_name'];
  $folder = "image/".$name;
   move_uploaded_file($tmp_name , $folder);
   $sql = mysqli_query($db,"INSERT INTO disease(disease,pic) VALUES ('$dis','$folder')");
   if ($sql) {
     echo "Add Disease";
   }
}
?>
