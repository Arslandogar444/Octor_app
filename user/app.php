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
<?php 


if(isset($_GET['doc'])){

$doc = $_GET['doc'];


$query = "SELECT * FROM doctor_profile WHERE id = '{$doc}' ORDER BY id DESC LIMIT 1";
$result = $db->query($query);
$num = $result->num_rows;
if($num == 0){

echo '<p class="alert text-center">No doctor.</p>';


}else{


$row = $result->fetch_assoc();



$id     = $row['id'];
$name     = $row['name'];
$email     = $row['email'];
$phone     = $row['phone_no'];
$specialty     = $row['specialty'];
$location     = $row['location'];
$address     = $row['address'];
$pic     = $row['pic'];





?>



<center><h1><?php echo ucfirst($name); ?></h1></center>
<div class="agileinfo_single" style="margin-top: -3em !important">

<div class="col-md-4 agileinfo_single_left">
<img src="<?php echo "../doctor/$pic"; ?>" class="img img-responsive img-thumbnail" style="margin-top:30%;width: 70% !important; height: 300px !important" />
</div>
<div class="col-md-8 agileinfo_single_right">





<div class="snipcart-item block">


<table class="table table-bordered" style="margin-left:50%;margin-top:-30%">
  
    <tr>
      <th>Email</th>
      <td><?php echo $email; ?></td>
    </tr>

    <tr>
      <th>Phone #</th>
      <td><?php echo $phone; ?></td>
    </tr>

    <tr>
      <th>Specialty:</th>
      <td><?php echo $specialty; ?></td>
    </tr>


    <tr>
      <th>Location</th>
      <td><?php echo $location; ?></td>
    </tr>

<tr>
<th>Address</th>
<td><?php echo $address; ?></td>
</tr>
<tr><td colspan="5"><input type="submit" name="chat" value ="Start Converstion" class="btn btn-info">&nbsp;&nbsp;&nbsp;<a href="doc_book.php?book=<?php echo $id; ?>"><input type="submit"  value ="Book Appointment" class="btn btn-info"></td></a></tr>


</table>
<?php
}
}

?>



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
<center><h1>Appointments</h1></center>
<table border="1" class="table table-bordered table-hover">
    <tr>
      <th>Sr.</th>
      <th>Doctor Name.</th>
      <th>Doctor Email.</th>
      <th>Patient Name.</th>
      <th>Patient Email.</th>
      <th>Age.</th>
      <th>Gender.</th>
      <th>Date.</th>
      <th>Time.</th>
      <th>Status.</th>
    
    </tr>
<?php
$email = $_SESSION['email'];
include '../db.php'; 

$cat_fetch = "SELECT * FROM booking_doc WHERE paitent_email = '$email' ";
$result_fetch = $db->query($cat_fetch);

$num_rows = $result_fetch->num_rows;
if($num_rows == 0){

echo "<td>No Category Found.</td>";
}else{

$count = 0;
while($rows = $result_fetch->fetch_assoc()){

$id     = $rows['id'];
$name     = $rows['doc_name'];
$email    =$rows['email'];
$p_name    =$rows['patient_name'];
$paitent_email    =$rows['paitent_email'];
$age    =$rows['age'];
$gender    =$rows['gender'];
$date_user    =$rows['date'];
$time_slot    =$rows['time_slot'];
$status =   $rows['status'];



$count++;


?>
<tr>
  <td><?php echo $count;  ?></td>
  <td><?php echo $name;  ?></td>
  <td><?php echo $email;  ?></td>
  <td><?php echo $p_name;  ?></td>
  <td><?php echo $paitent_email;  ?></td>
  <td><?php echo $age;  ?></td>
  <td><?php echo $gender;  ?></td>
  <td><?php echo $date_user;  ?></td>
  <td><?php echo $time_slot;  ?></td>
  <td><?php echo $status;  ?></td>
</tr>
<?php
}
}

?>
</table>

  
</div>
</body>
</html>s