<?php include_once 'head.php'; ?>
<?php
include '../db.php';
?>
<?php include 'head.php'; ?>
<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');

$email = $_SESSION['email'];
echo $email;
if(!$email){
  header('location:../index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		html,body{
			background-image:url(hd.jpg);
      background-size: cover;
		}
		
		* {
  box-sizing: border-box;
}

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
  float: left;
  padding: 15px;
  border: 1px solid red;
}

	</style>
</head>
<body>
	<div style="background-color: #0C2E80;"><a href="../index.php"><img src="../logo.png"></a><font color="white" size="40px"><h2 style="margin-left: 40%; margin-top: -3%;">Online Pharmacy</h2s></font>
 <div class="product_list_header" style="margin-left: 80%;margin-top:-5%;">  


<?php 

include "../db.php";
$email = $_SESSION['email'];
  $sql = "SELECT * FROM cart WHERE user_mail = '$email'";
  $result = $db->query($sql);
  $num = $result->num_rows;
?><button class="btn btn-warning"><font color="red">
      <?php 

      echo "cart($num)";
      ?></font></button>








</div>
  </div>
   

	<div class="container" style="margin-left: 20%;">
        <form action="searchp.php" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        
                        </div>
                        
                    </div>

                </div>
            </div>
<center><h1>Your Order</h1></center>
<table border="1" class="table table-bordered table-hover">
    <tr>
      <th>Sr.</th>
      <th>Email.</th>
      <th>Product.</th>
      <th>Disease</th>
      <th>Price</th>
      <th>Status.</th>
    </tr>
<?php


$cat_fetch = "SELECT * FROM cart WHERE user_mail = '$email'";
$result_fetch = $db->query($cat_fetch);

$num_rows = $result_fetch->num_rows;
if($num_rows == 0){

echo "<td>No Category Found.</td>";
}else{

$count = 0;
while($rows = $result_fetch->fetch_assoc()){

$id     = $rows['id'];
$email    =$rows['user_mail'];
$product =$rows['pro_name'];
$disease = $rows['dis'];
$price =$rows['price'];
$status =   $rows['status'];



$count++;


?>
<tr>
  <td><?php echo $count;  ?></td>
  <td><?php echo $email;  ?></td>
  <td><?php echo $product;  ?></td>
  <td><?php echo $disease;  ?></td>
  <td><?php echo $price;  ?></td>

  <td><?php echo $status;  ?></td>
  
</tr>
<?php
}
}

?>
</table>
</div>

</body>
</html>