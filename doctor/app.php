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
include_once 'head.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
    html,body{
      background-image:url(1.jpg);
      background-size: cover;
    }
  </style>
</head>
<body>
<div class="jumbotron jumbotron-fluid" style="background-color: blue;">
  <div class="container">
    <center><font color="white"><h1 class="display-3">Welcome To Doctor</h1></font></center>
    
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="navbar-brand" href="account.php"><img src="../logo.png"></a>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="">
    <ul class="nav justify-content-center">
  

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="view_pro.php"><font color="black">View Profile</font><br></a>
  </li>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="paient"><font color="black">Paient appointment</font><br></a>
  </li>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><font color="black">Logout</font><br></a>
  </li>
    &nbsp;&nbsp;
  
</ul> 
  </div>
</nav>
<style>
	#box{
		width:95%;
		margin-left:5%;
	}
</style>
<center><font color="white"><h1>Appointments</h1></font></center>
<table border="1" class="table table-bordered table-hover" style="background-color: white;">
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
      <th>Delete</th>
      <th>Update</th>
    
    </tr>
<?php
$email = $_SESSION['email'];
include '../db.php'; 

$cat_fetch = "SELECT * FROM booking_doc WHERE email = '$email' ";
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
  <td><a class="btn btn-warning" href="app.php?edit=<?php echo $id ?>">Edit</a></td>
<td><a class="btn btn-danger" href="app.php?delete=<?php echo $id ?>">Delete</a></td>
</tr>
<?php
}
}

?>
<?php 


if(isset($_GET['edit'])){
$edit_id = $_GET['edit'];
$edit_query = "SELECT * FROM booking_doc WHERE id = '{$edit_id}' ";
$result_edit = $db->query($edit_query);
$row = $result_edit->fetch_assoc();

$edit_title = $row['status'];



?>
<form method="post" action="" enctype="multipart/form-data">


<div class="form-group">
  <select class="form-control" id="cat-title" value="<?php if(isset($edit_title)){echo $edit_title; } ?>" name="status" required>
    <option value="Approved">Approved</option>

    
  </select>



</div>






<div class="form-group">

<input class="btn btn-danger btn-block" type="submit" name="update" value="Approved">

</div>
</form>
<?php 

if(isset($_POST['update'])){
$e_st = $_POST['status'];
$update_query = "UPDATE booking_doc SET status = \"$e_st\" WHERE id = '{$edit_id}' ";

$result_update = $db->query($update_query);
if($result_update){
  echo "<script>alert('Approved appointment')</script>";
  echo "<script>window.open('app.php','_self')</script>";
}else{

die($db->error);
}


}



?>
<?php
}

?>
<?php 

if(isset($_GET['delete'])){

$del_id = $_GET['delete'];

$del_cat = "DELETE FROM booking_doc WHERE id = '{$del_id}' ";
$result_del = $db->query($del_cat);
if($result_del){

header("Location: app.php");

}else{

die($db->error);

}





}


?>
</table>