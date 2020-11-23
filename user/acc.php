<?php
include '../db.php';
?>
<?php include 'head.php'; ?>
<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');

$email = $_SESSION['email'];

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
      overflow-x: hidden;
      background-color: #2B427A;
      
     
    
     
  
}
  </style>
   
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
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
            <button class="dropbtn" style=" background-color:#0974DA;border-radius: 12px;padding:10px 20px;"><a href="logout.php" style="color:white">Logout</a></button>
            
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

<br>
<div class="card" style="background-image: url(../bg.jpg);background-size: cover;">
  <div style="margin-left: 8%;"><h1><p style="text-align: center; margin-top:70px;">Find and book the <span style="color: Brown; "> best doctors </span> near you</p></h1><br><br>
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
                              <option >Search Disease </option> 
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
      </div> <br> <br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d27208.51508685792!2d74.3325803883194!3d31.522391521720646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shospital!5e0!3m2!1sen!2s!4v1606115798193!5m2!1sen!2s" width="1000" height="450" frameborder="0" style="border:0; align:center; display:flex; margin-left:12%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div><br><br><br>

  <div class="row justify-content-start" style="margin-left: 24%; ">
    <div class="col-4" style="border-style: none; border-color: blue;  ">
      <img src="../phar.jpg"><div style="margin-left: 45%; margin-top: -38% "><font color="blue"><h5 >Online Pharmacy</h5></font><br><p>Purchase medicine<br><br></p><a href="../pharmacy/pharmacy.php"><input type="submit" name="pharmacy" class="btn btn-primary" value="Pharmacy"  style="width:100%; "></a></div>
    </div>
    <div class="col-4" style="border-style: none; ">
      <img src="../doc.jpg"><div style="margin-left: 45%; margin-top: -40%"><font color="blue"><h5>Online Doctors</h5></font><br><p>Booking Doctors<br><br></p><a href="doc.php"><input type="submit" name="pharmacy" class="btn btn-primary" value="Start Consulting"  style="width:100%;"></a></div>
    </div>
</div>
<br><br><br>
<center>
<p><font color="blue"><h3>Find Doctors By Health Concern</h3></font>
</center><br><br>

<?php
include '../db.php';
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
<div style="margin-left: 7%; float: left; ">
<img src="<?php echo "../admin/$pic" ?>" style ="margin-left: 14%;"><br><a href="doctor/sp_doc.php?doc=<?php echo $dis; ?>"><p style=""><?php echo ucfirst($dis) ?></p></a></div>

 
<?php } }

 ?>
<br><br><br>


<div class="wthree_footer_copy" style="background-color: #2B427A; padding:20px;">
<p style="text-align:center; color:#fff; padding-top:10px;"> © 2020 Online Doctors</a></p>
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
