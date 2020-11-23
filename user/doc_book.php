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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .checked {
  color: orange;
}
</style>
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
</nav><br>
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
<tr><td colspan="5"><a href="chat.php?chat=<?php echo $id; ?>"><input type="submit" name="chat" value ="Start Converstion" class="btn btn-info">&nbsp;&nbsp;&nbsp;<a href="doc_book.php?book=<?php echo $id; ?>"><input type="submit"  value ="Book Appointment" class="btn btn-info"></a>&nbsp;&nbsp;&nbsp;<a href="doc_book.php?feed=<?php echo $id; ?>"><input type="submit"  value ="Feedback" class="btn btn-info"></a></td></tr>


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

<div style="background-color:; width:50%; margin-left: 13% ;">
  <?php 
  if (isset($_GET['book'])) {
    $edit_id = $_GET['book'];
    $query = "SELECT * FROM doctor_profile WHERE id = '{$edit_id}' ORDER BY id DESC LIMIT 1";
$result = $db->query($query);
$num = $result->num_rows;
if($num == 0){

echo '<p class="alert text-center">No doctor.</p>';


}else{


$row = $result->fetch_assoc();



$id1     = $row['id'];
$name1     = $row['name'];
$email1     = $row['email'];
$phone1     = $row['phone_no'];
$specialty1     = $row['specialty'];
$location1     = $row['location'];
$address1     = $row['address'];
$pic1     = $row['pic'];
  ?>
  <center><h1>Booking Appointment</h1></center>
  <form method="post">
    <table style="padding: 10px; width:150%;" border="1">
      <tr>
        <td><label>Doctor Name:</label></td>
        <td><input type="text" name="doc_name" value="<?php echo$name1 ?>"></td>
      </tr>
      <tr>
        <td><label>Doctor Email:</label></td>
        <td><input type="text" name="doc_email" value="<?php echo $email1 ?>"></td>
      </tr>
      <tr>
        <td><label>Patient Name:</label></td>
        <td><input type="text" name="p_name" placeholder="Patient Name"></td>
      </tr>
<tr>
        <td><label>Patient email:</label></td>
        <td><input type="text" name="p_email" value="<?php  $email = $_SESSION['email'];
           echo $email;
        ?>"></td>
      </tr>
      <tr>
        <td><label>Age:</label></td>
        <td><input type="text" name="age" placeholder="Enter your Age"></td>
      </tr>
      <tr>
        <td><label>Gender:</label></td>
        <td><input type="radio" name="gender" value="male">Male<br><input type="radio" name="gender" value="Female">Female</td>
      </tr>
      <tr>
        <td><label>Date</label></td>
         <td><input type="date" name="date"></td>
      </tr>
       <tr>
        <td><label>Time Slot:</label></td>
        <td><select name="time_slot" style="width:50%;">
          <option value="10:00AM">10:00AM</option>
          <option value="10:00AM">11:00AM</option>
          <option value="12:00PM">12:00PM</option>
          <option value="1:00PM">1:00PM</option>
          <option value="2:00PM">2:00PM</option>
          <option value="3:00PM">3:00PM</option>
        </select></td>
      </tr>
      <tr><td colspan="3"><center><input type="submit" name="submit" value="Submit" style="width:50%; background-color: blue;"></center></td></tr>
    </table>
  </form>
</div>
<?php
include '../db.php';
if (isset($_POST['submit'])) {
  $doc_name = $_POST['doc_name'];
  $doc_email = $_POST['doc_email'];
  $p_name    = $_POST['p_name'];
  $p_email   = $_POST['p_email'];
  $age       = $_POST['age'];
  $gender    = $_POST['gender'];
  $date_u      = $_POST['date'];
  $time      = $_POST['time_slot'];
  $query= mysqli_query($db,"INSERT INTO booking_doc(doc_name,email,patient_name,paitent_email,age,gender,date,time_slot,status) VALUES ('$doc_name','$doc_email','$p_name','$p_email','$age','$gender','$date_u','$time','pending')");
  if ($query) {
    echo "<script>alert('Booking Appointment')</script>";
  }else{
    echo "<script>alert('No Booking Appointment')</script>";
  }
}
?>
<?php
}
}

?>
<div style="background-color:; width:50%; margin-left: 13% ;">
  <?php 
  if (isset($_GET['feed'])) {
    $edit_id1 = $_GET['feed'];
    $querys = "SELECT * FROM doctor_profile WHERE id = '{$edit_id1}' ORDER BY id DESC LIMIT 1";
$results = $db->query($querys);
$nums = $results->num_rows;
if($nums == 0){

echo '<p class="alert text-center">No doctor.</p>';


}else{


$rows = $results->fetch_assoc();



$id1     = $rows['id'];
$names     = $rows['name'];
$emails     = $rows['email'];

  ?>
  <h1 style="">Feedback</h1>
  <form method="post">
    <table style="padding: 15px; width:250%; margin-left: -5%;" border="1">
      <tr>
        <td><label>Doctor Email:</label></td>
        <td><input type="text" name="doc_name" value="<?php echo$emails;?>"></td>
      </tr>
      <tr>
        <td><label>feedback:</label></td>
        <td><select name="feedback" style="width:40%">
          <option>Choose feedback</option>
          <option value="fair">Fair</option>
          <option value="good">Good</option>
          <option value="exelent">Exelent</option>
        </select></td>
      </tr>
      <tr>
        <td><label>Rank</label></td>
        <td>
          <input type="radio" name="rank" value="*"><span class="fa fa-star checked"></span><br><input type="radio" name="rank" value="**"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><br><input type="radio" name="rank" value="***"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
        <br><input type="radio" name="rank" value="****"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
        </span><span class="fa fa-star checked"></span>
       <br> <input type="radio" name="rank" value="*****"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
        </span><span class="fa fa-star checked"><span class="fa fa-star checked"></span>
        </span>
        </td>
      </tr>

      <tr><td colspan="3"><center><input type="submit" name="submit" value="Submit" style="width:50%; background-color: orange;"></center></td></tr>
    </table>
  </form>
</div>

<?php
}
}
?>
<?php
include '../db.php';
if (isset($_POST['submit'])) {
  $doc_name = $_POST['doc_name'];
  $feed      = $_POST['feedback'];
  $rank      = $_POST['rank'];
  $sql  = mysqli_query($db,"INSERT INTO feedback(doc_email,feedback,rank) VALUES ('$doc_name','$feed','$rank')");
if ($sql) {
  echo "<script>alert('Send feedback')</script>";
}
?>

<?php 


if(isset($_GET['feed'])){
$edit_id = $_GET['feed'];
$edit_query = "SELECT * FROM doctor_profile WHERE id = '{$edit_id}' ";
$result_edit = $db->query($edit_query);
$row = $result_edit->fetch_assoc();

$id1 = $row['id'];



?>

<?php
$update_query = "UPDATE doctor_profile SET rank = \"$rank\" WHERE id = '{$id1}' ";

$result_update = $db->query($update_query);
if($result_update){



}else{

die($db->error);
}


}
?>
<?php
}
?>
</body>
</html>