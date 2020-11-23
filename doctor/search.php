<?php include_once 'head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		html,body{
			background-color: #EEF0F4;
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
	<div style="background-color: #0C2E80;"><img src="logo.png"><font color="white"><h3 style="margin-left: 45%; margin-top: -3%;">Online Doctors</h3></font></div>
	<div class="container" style="margin-left: 20%;">
        <form action="" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Enter City" name="city">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width:200%">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" style="width:200%;" name="dis">
                                <?php 
include"db.php";
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
<?php 
include "db.php";
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
	<img src="<?php echo $pic;  ?>" style ="width:150px;">
<div style="margin-left: 20%; margin-top: -10%;"><h3> <?php echo $name;?></h3><?php echo $specialty;  ?><br>Location:<?php echo $location; ?><br><?php echo "Phone# $phone"; ?><br><?php echo "Address: $address"; ?><br>Rating:<br><input type="submit" name="booking" value="Booking Appointment" class="btn btn-primary" style="margin-left: 80%; margin-top: -20%; "><input type="submit" name="chat" value ="Start Converstion" class="btn btn-info" style="margin-left: 80%;margin-top: -15%; "></div>

</div><br><br><br><br><br>






      <?php

    }


  }

}

 ?>


</body>
</html>