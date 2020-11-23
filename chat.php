<?php
include 'db.php';
?>
<?php include 'head.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
  <style>
    html,body{
  background-image:url(hd.jpg);
  background-size: cover;
  background-repeat: no-repeat;s
}
  </style>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

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

<?php 
if (isset($_GET['chat'])) {
  $get = $_GET['chat'];

$query = "SELECT * FROM doctor_profile WHERE email = '{$get}'";
$result = $db->query($query);
$num = $result->num_rows;
$row = $result->fetch_assoc();
$email1 = $row['email'];
}
?>
<?php
if(isset($_POST['send'])){
  $user_email = $_POST['user_email'];
  $doc = $_POST['email_doc'];
  $msg = $_POST['msg'];
$insert_query = mysqli_query($db,"INSERT INTO chat(user_email,doc_email,msg)VALUES('$user_email','$doc','$msg')");
}
?>
<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="chat.php" method="post" class="form-container">
    <h1>Chat</h1>
    <label>User Email</label>
   <input type="email" name="user_email">
   <label>Doctor Email</label>
   <input type="email" name="email_doc">
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required="required">user.</textarea>

    <button type="submit" class="btn" name="send">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<body data-spy="scroll" data-target=".navbar" data-offset="50">


<div id="section1" class="container-fluid">
  <font color="red"><h2>Consult With Doctor</h2></font>
  <?php
  $query = "SELECT * FROM chat ";
$result = $db->query($query);
$num = $result->num_rows;
if($num == 0){

echo '<p class="alert text-center">No chat.</p>';


}else{
$rows = $result->fetch_assoc();
$doc_email1 = $rows['doc_email'];
while($row = $result->fetch_assoc()){
$id     = $row['id'];
$email =   $row['user_email'];
$doc_email = $row['doc_email'];
$msg     = $row['msg'];

?>



  
  <p><?php echo "$msg" ?><a href="chat.php?delete=<?php echo $id ?>"><input type="submit" value="Delete" style="margin-left: 30%;"></a></p>

  <?php
}
}

?>
</div>
<?php 

if(isset($_GET['delete'])){

$del_id = $_GET['delete'];

$del_cat = "DELETE FROM chat WHERE id = '{$del_id}' ";
$result_del = $db->query($del_cat);
if($result_del){

header("Location: chat.php");

}else{

die($db->error);

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
</body>
</html>
