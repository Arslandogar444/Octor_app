<?php
include_once 'head.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title></title>
  <style>
    html,
    body {
      background-image: url(hdbg.jpg);
      background-size: cover;
      background-repeat: no-repeat;
    }

    .img {
      border: 8px solid black;
      border-radius: 50%;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
    <a class="navbar-brand" href="index.php" style="margin: 0;">
      <img src="logo.png">
    </a>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="" style="width: 100%;">
      <ul class="nav" style="display: flex; align-items: center; justify-content: space-evenly; flex-wrap: wrap;">
        <li class="nav-item">
          <a class="nav-link" href="doctor/doctor.php">
            <font color="black">Doctors</font><br>Book an Appointment
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pharmacy/pharmacy.php">
            <font color="black">Pharmacy</font><br>Medicines & health Product
          </a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="dropbtn" style="background-color:#0974DA;border-radius: 12px;padding:10px 20px;">Login/Register</button>
            <div class="dropdown-content">
              <a href="doctor_reg.php">Doctor</a>
              <a href="user/index.php">Patient</a>
            </div>
          </div>
        <li class="nav-item" style="">
          <a href="chat.php"><img src="chat.png" style="max-width: 40px;"><br>Consult With Doctor</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- <br> -->
  <div class="card" style="background-image: url(bg2.jpg);background-size: cover;width: 100%;height: 100vh;display: flex;justify-content: center;">
    <div style="margin-left: 8%;">
      <h1 style="margin-bottom: 50px;">
        <font color="#204AB2">Lorem ipsum<br>dolorist cons</font>
      </h1>
    </div>
  </div>
  
  <br><br>
  
  <div class="container">
    <div class="container" style="">
      <form action="doctor/search.php" method="get" novalidate="novalidate">
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

    <table width="100%" border="0">
      <tr>
        <td>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d27208.51508685792!2d74.3325803883194!3d31.522391521720646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shospital!5e0!3m2!1sen!2s!4v1606115798193!5m2!1sen!2s"
            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
        </td>
      </tr>
    </table>

    <br><br><br><br>
    
    <div class="container">
      <div class="doctors-box" style="display: flex; align-items: center; justify-content: space-evenly;">
        <div class="doctor-1" style="text-align:center;">
          <img src="doc2.jpg" alt="" width="25%" class="img"><br><br>
          <b>Doctor Ahmad</b><br>
          <b>MBBS Specailst Eye</b><br>
          <b>Services Hospital Lahore</b>
        </div>
        <div class="doctor-2" style="text-align:center;">
          <img src="doc2.jpg" alt="" width="25%" class="img"><br><br>
          <b>Doctor Abdullah</b><br>
          <b>MBBS Specailst Ear</b><br>
          <b>Genral Hospital Lahore</b>
        </div>
        <div class="doctor-3" style="text-align:center;">
          <img src="doc2.jpg" alt="" width="25%" class="img"><br><br>
          <b>Doctor Kamran</b><br>
          <b>MBBS Specailst Teeth</b><br>
          <b>Meo Hospital Lahore</b>
        </div>
        <div class="doctor-4" style="text-align:center;">
          <img src="doc2.jpg" alt="" width="25%" class="img"><br><br>
          <b>Doctor Asad</b><br>
          <b>MBBS Specailst Liver</b><br>
          <b>Jinah Hospital Lahore</b>
        </div>
      </div>
    </div>
  </div>

  <br><br><br><br>

  <div class="container">
    <div class="row" style="justify-content: center; flex-wrap: wrap;">
      <div class="col-5" style="min-width:300px;border-style: dotted; border-color: blue; display: flex; align-items: center; justify-content: space-evenly; margin:10px; padding: 30px 15px;">
        <img src="phar.jpg" style="margin-right: 10px;">
        <div style="">
          <font color="blue">
            <h5>Online Pharmacy</h5>
          </font><br>
          <p>Purchase medicine<br><br></p><a href="pharmacy/pharmacy.php">
          <input type="submit" name="pharmacy"
              class="btn btn-primary" value="Pharmacy" style="width:100%;"></a>
        </div>
      </div>
      <div class="col-5" style="min-width:300px;border-style: dotted; display: flex; align-items: center; justify-content: space-evenly; margin:10px; padding: 30px 15px;">
        <img src="doc.jpg" style="margin-right: 10px;">
        <div style="">
          <font color="blue">
            <h5>Online Doctors</h5>
          </font><br>
          <p>Booking Doctors<br><br></p><a href="doctor/doctor.php">
          <input type="submit" name="pharmacy"
              class="btn btn-primary" value="Start Consulting" style="width:100%;"></a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <center>
    <p>
      <font color="blue">
        <h3>Find doctors by health concern</h3>
      </font>
  </center><br><br>

  <div class="container">
      <div style="display:flex;align-items: center; justify-content: space-evenly; flex-wrap: wrap;">
        <?php
          include 'db.php';
          $sql = "SELECT * FROM disease";
          $result_fetch = $db->query($sql);
          $num_rows = $result_fetch->num_rows;
          if($num_rows == 0){
          echo "<td>No Disease Found.</td>";
          }else{
            while($rows = $result_fetch->fetch_assoc()){
          $id     = $rows['id'];
          $dis     = $rows['disease'];
          $pic     = $rows['pic'];
        ?>
          <div style="float: left; margin: 0 10px;">
            <img src="<?php echo "admin/$pic" ?>" style="display:block;margin: auto;">
            <!-- <br> -->
            <a href="doctor/sp_doc.php?doc=<?php echo $dis; ?>">
              <p style="color: white;line-height:2.3;"><?php echo ucfirst($dis) ?></p>
            </a>
          </div>
        <?php
            }
          }
        ?>
      </div>
    </div>
  <br><br>


  <div class="wthree_footer_copy" style="background-color: #2B427A;">
    <p style="padding-bottom: 26px;"> © 2020 Online Doctors</p>
  </div>


  <!-- //footer -->
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".dropdown").hover(
        function () {
          $('.dropdown-menu', this).stop(true, true).slideDown("fast");
          $(this).toggleClass('open');
        },
        function () {
          $('.dropdown-menu', this).stop(true, true).slideUp("fast");
          $(this).toggleClass('open');
        }
      );
    });
  </script>
  <!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function () {
      /*
      var defaults = {
      containerID: 'toTop', // fading element id
      containerHoverID: 'toTopHover', // fading element hover id
      scrollSpeed: 1200,
      easingType: 'linear' 
      };
      */

      $().UItoTop({
        easingType: 'easeOutQuart'
      });

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