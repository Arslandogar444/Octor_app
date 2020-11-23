<?php
include '../db.php';
?>
<?php include 'head.php'; ?>
<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');
echo "<h2 align='right'>".$date."</h2>";
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
  background-repeat: no-repeat;s
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h2>Welcome To User: <?php echo $email ?></h2>
 <ul class="nav justify-content-center" style="margin-left:40%;">
    &nbsp;&nbsp;
  <li class="nav-item">
  <div class="dropdown">
  <button class="dropbtn" style="background-color:#0974DA;border-radius: 12px;">user</button>
  <div class="dropdown-content">
    <a href="doc.php">Doctor</a>
    <a href="app.php">View Appointment</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;
  
  <li class="nav-item">
  <div class="dropdown">
  <a href="chat.php"><img src="chat.png"></a>
  </div>
  </li>
</ul> 
  </div>
</nav>
<br>
<div class="card" style="background-image: url(../bg.jpg);background-size: cover;">
  <div style="margin-left: 8%;"><h1><font color = "#204AB2">Lorem ipsum<br>dolorist cons</font></h1></div><br><br><br><br><br><br><br><br>
  <div class="container" style="margin-left: 20%;">
        <form action="search.php" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter City" name="city">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width:200%">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" style="width:200%;" name="dis">
                              <option>Disease Search</option>
                                <?php 
include"../db.php";
$cate_fetch = "SELECT * FROM doctor_profile";
$result_cate = $db->query($cate_fetch);
if($result_cate){

while($rows = $result_cate->fetch_assoc()){

$sp = $rows['specialty'];


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
      </div>
</div><br><br><br>

  </div>
<?php 
include "../db.php";
if (isset($_GET['search'])) {
  
  $city  = $_GET['city'];
  $dis   = $_GET['dis'];

  $doc = "SELECT * FROM  doctor_profile WHERE specialty = '$dis' OR location = '$city' ";
  $result = $db->query($doc);
  $num = $result->num_rows;
  if($num == 0){

    echo '<p class="alert text-center">No Doctor is Available.</p>';


  }else{


    while($rows = $result->fetch_assoc()){


      $id     = $rows['id'];
$name     = $rows['name'];
$email     = $rows['email'];
$phone     = $rows['phone_no'];
$specialty     = $rows['specialty'];
$location     = $rows['location'];
$address     = $rows['address'];
$pic     = $rows['pic'];
      

      ?>
  



    
<div class="container-fluid" style="background-color: #FFFFFF;height: auto;">
  <img src="<?php echo "../doctor/$pic";  ?>" style ="width:150px;">
<div style="margin-left: 20%; margin-top: -10%;"><h3> <?php echo $name;?></h3><?php echo $specialty;  ?><br>Location:<?php echo $location; ?><br><?php echo "Phone# $phone"; ?><br><?php echo "Address: $address"; ?><br>Rating:<br><a href="doc_book.php?doc=<?php echo $id ?>"><input type="submit" name="booking" value="Booking Appointment" class="btn btn-primary" style="margin-left: 80%; margin-top: -20%; "></a><input type="submit" name="chat" value ="Start Converstion" class="btn btn-info" style="margin-left: 80%;margin-top: -15%; "></div>

</div><br><br><br><br><br>






      <?php

    }


  }

}

 ?>

</body>
</html>
