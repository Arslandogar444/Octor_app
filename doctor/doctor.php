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
  padding: 1500px;
  border: 1px solid red;
}

	</style>
</head>
<body>
	<!-- <div style="background-color: #0C2E80;">
    <a href="../index.php">
      <img src="logo.png">
    </a>
    <font color="white">
      <h3 style="margin-left: 45%; margin-top: -3%;">Online Doctors</h3>
    </font>
  </div> -->

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


	  <div class="container" style="">
      <form action="search.php" method="get" novalidate="novalidate">
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
      $doc = "SELECT * FROM  doctor_profile ";
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
          $rank    = $rows['rank'];
    ?>
      <div class="container-fluid" style="background-color: #FFFFFF;height: auto;">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12" style="display: flex; align-items: center; flex-direction: column; justify-content: center;">
            <img src="<?php echo $pic;  ?>" style ="width:150px;">
            <br>
            <font color="orange" style="font-size:60px;line-height:.7;">
              <?php
                echo $rank;
              ?>
            </font>
          </div>
          <div class="col-lg-6 col-md-4 col-sm-12" style="display: flex; flex-direction: column; justify-content: center;">
            <h3>
            <?php echo $name;?>
            </h3>
            Speacialty:<?php echo $specialty;  ?>
            <br>
            Location:<?php echo $location; ?>
            <br>
            Email:<?php echo $email; ?>
            <br>
            <?php echo "Phone# $phone"; ?>
            <br>
            <?php echo "Address: $address"; ?>
            <br>
            <span style="display: flex; align-items: center;">
              Rating:
              <font color="orange" style="font-size:40px;">
                <?php
                  echo $rank;
                ?>
              </font>
            </span>
            <!-- <br> -->
          </div>
          <div class="col-lg-3 col-md-4 col-sm-12" style="display: flex; align-items: center; flex-direction: column; justify-content: center;">
            <input type="submit" name="booking" value="Booking Appointment" class="btn btn-primary" style="margin-bottom:20px">
            <input type="submit" name="chat" value ="Start Converstion/after login" class="btn btn-info" style="">
          </div>
        </div>
      </div>

<br><br><br>
  <?php
      }
    }
  ?>

  

</body>
</html>