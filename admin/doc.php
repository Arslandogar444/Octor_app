<?php
include_once "head.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  html,body{
    background-image:url(hd.jpg);
    background-size:cover;
  }
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  width : 100%;
  
  
  background-color: #111;
  overflow-x: hidden;

  padding-top: 60px;
  float: left;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  float: left;
  
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="jumbotron jumbotron-fluid" style="background-image:url(head.jpg); background-size:cover; ">
  <div class="container">
    <center><h1 class="display-3">Welcome To Admin</h1></center></div></div>
<div id="mySidenav" class="sidenav">
  
  <a href="home.php">Home</a>
  <a href="doc.php">Doctors</a>
  <a href="user.php">Users</a>
  <a href="add_product.php">Add Pharmacy Product</a>
  <a href="order.php">Pharmacy order</a>
  <a href="pharmacy.php">Pharmacy Products</a>
  <a href="add_disease.php">Add disease</a>
   <a href="logout.php">Logout</a>
</div>
<div>
  
  <table border="1" class="table table-bordered table-hover">
    <tr>
      <th>Sr.</th>
       <th>PMDC#.</th>
      
      <th>Name.</th>
      <th>Email.</th>
      <th>Specialty.</th>
      <th>Status.</th>
      <th>Update.</th>
      <th>Delete.</th>
    </tr>
<?php
include 'db.php'; 

$cat_fetch = "SELECT * FROM doctor";
$result_fetch = $db->query($cat_fetch);

$num_rows = $result_fetch->num_rows;
if($num_rows == 0){

echo "<td>No Category Found.</td>";
}else{

$count = 0;
while($rows = $result_fetch->fetch_assoc()){

$pmdc     = $rows['pmdc'];
$name     = $rows['name'];
$email    =$rows['email'];
$specialty =$rows['specialty'];
$status =   $rows['status'];



$count++;


?>
<tr>
  <td><?php echo $count;  ?></td>
  <td><?php echo $pmdc;  ?></td>
  <td><?php echo $name;  ?></td>
  <td><?php echo $email;  ?></td>
  <td><?php echo $specialty;  ?></td>
  <td><?php echo $status;  ?></td>
  <td><a class="btn btn-warning" href="doc.php?edit=<?php echo $id ?>">Edit</a></td>
<td><a class="btn btn-danger" href="doc.php?delete=<?php echo $id ?>">Delete</a></td>
</tr>
<?php
}
}

?>
</table>

  
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
</body>
</html> 
<?php 


if(isset($_GET['edit'])){
$edit_id = $_GET['edit'];
$edit_query = "SELECT * FROM doctor WHERE id = '{$edit_id}' ";
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
$update_query = "UPDATE doctor SET status = \"$e_st\" WHERE id = '{$edit_id}' ";

$result_update = $db->query($update_query);
if($result_update){
  echo "<script>alert('Approved Doctor')</script>";
  echo "<script>window.open('doc.php','_self')</script>";
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

$del_cat = "DELETE FROM doctor WHERE id = '{$del_id}' ";
$result_del = $db->query($del_cat);
if($result_del){

header("Location: doc.php");

}else{

die($db->error);

}





}


?>