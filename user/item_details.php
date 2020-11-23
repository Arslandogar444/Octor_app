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
	<div style="background-color: #0C2E80;"><a href="../index.php"><img src="../logo.png"></a><font color="white" size="40px"><h2 style="margin-left: 40%; margin-top: -3%;">Online Pharmacy</h2s></font><div class="product_list_header" style="margin-left: 80%;">  
    <?php 

include "../db.php";
$email = $_SESSION['email'];
  $sql = "SELECT * FROM cart WHERE user_mail = '$email'";
  $result = $db->query($sql);
  $num = $result->num_rows;
?><font color="red">
      <?php 

      echo "cart($num)";
      ?></font>
      <?php



      ?>
</div>
  </div></div>

	<div class="container" style="margin-left: 20%;">
        <form action="searchp.php" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width:200%">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" style="width:200%;" name="dis">
                                <?php 
include"db.php";

$cate_fetch = "SELECT * FROM health_pro";
$result_cate = $db->query($cate_fetch);
if($result_cate){

while($rows = $result_cate->fetch_assoc()){

$sp = $rows['disease'];


echo "<option value=\"$sp\">$sp</option>";


}
}


?>



                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-left: 20%;">
                           <input type="submit" name="search" value="Search" class="btn btn-primary">
                        </div>
                        
                    </div>

                </div>
            </div>

        </form>
      </div><br><br>
<?php 

include "../db.php";
if (isset($_GET['item'])) {
  $edit_id = $_GET['item'];
  $doc = "SELECT * FROM health_pro WHERE id = '$edit_id'";
  $result = $db->query($doc);
  $num = $result->num_rows;
  if($num == 0){

    echo '<p class="alert text-center">No product is Available.</p>';


  }else{


    while($rows = $result->fetch_assoc()){

 $id     = $rows['id'];
$name     = $rows['product'];
$dis     = $rows['disease'];
$pic     = $rows['pic'];
$price   = $rows['price'];
      

      ?>
  
<div class="agileinfo_single" style="margin-top: -3em !important">
<h5><?php echo ucfirst($name); ?></h5>
<div class="col-md-4 agileinfo_single_left">
<img src="../admin/<?php echo $pic; ?>" class="img img-responsive img-thumbnail" style="width: 100% !important; height: 300px !important" />
</div>
<div class="col-md-8 agileinfo_single_right">





<div class="snipcart-item block">


<table class="table table-bordered">
   <tr>
      <th</th>
      <td>Rs. <?php echo $dis; ?></td>
    </tr>

    <tr>
      <th>Price</th>
      <td>Rs. <?php echo $price; ?></td>
    </tr>

    


</table>

<form method="post">
  <table>
    <tr>
      <td>User Email</td>
      <td><input type="email" name="email" placeholder="user Email" value="<?php echo $email = $_SESSION['email']; ?>"></td>
    </tr>
    <tr>
      <td>Product Name</td>
      <td><input type="text" name="pro_name" value ="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td>Disease</td>
      <td><input type="text" name="dis" value ="<?php echo $dis ?>"></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type="text" name="price" value ="<?php echo $price; ?>"></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>

</form>
<?php
if (isset($_POST['submit'])) {
  $user_email = $_POST['email'];
  $pro  = $_POST['pro_name'];
  $dise = $_POST['dis'];
  $price = $_POST['price'];
  $sql = mysqli_query($db,"INSERT INTO cart(user_mail,pro_name, dis,price,status)VALUES('$user_email','$pro','$dise','$price','pending')");
  if ($sql) {
     echo "<script>alert('succefull add to cart')</script>";
   } 
}
?>








      <?php

    }


  }

}




 ?>


</body>
</html>