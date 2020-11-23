<?php
session_start();
date_default_timezone_set('asia/karachi');
$date = date('d/m/y h:i:s A');
echo "<h2 align='right'>".$date."</h2>";
$email = $_SESSION['email'];
if(!$email){
  header('location:../index.php');
}

?>
<?php
include '../db.php';
$email = $_SESSION['email'];
if(isset($_POST['send'])){
  $msg = $_POST['msg'];
$insert_query = mysqli_query($db,"INSERT INTO chat(user_email,doc_email,msg)VALUES('user','$email','$msg')");
if ($insert_query) {
	echo "<script>window.open('chat.php','_self')</script>";
}
}
?>