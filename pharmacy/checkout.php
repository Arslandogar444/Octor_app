<?php include_once 'head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		html,body{
			background-image:url(hd.jpg);
      background-size: cover;
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
	<div style="background-color: #0C2E80;"><a href="../index.php"><img src="../logo.png"></a><font color="white" size="40px"><h2 style="margin-left: 40%; margin-top: -3%;">Online Pharmacy</h2s></font>
 <div class="product_list_header" style="margin-left: 80%;">  


<?php 

include "../db.php";
  $sql = "SELECT * FROM cart WHERE status = 'pending'";
  $result = $db->query($sql);
  $num = $result->num_rows;
?><a href="checkout.php"><button class="btn btn-warning"><font color="red">
      <?php 

      echo "cart($num)";
      ?></font></button></a>







</div>
  </div>
   

	<div class="container" style="margin-left: 20%;">
        <form action="search.php" method="get" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="width:200%">
                            <select class="form-control search-slt" id="exampleFormControlSelect1" style="width:200%;" name="dis">
                                <?php 
include"db.php";
$cate_fetch = "SELECT * FROM health_pro";
$result_cate = $db->query($cate_fetch);
if($result_cate){

while($rows = $result_cate->fetch_assoc()){

$sp = $rows['disease'];


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
      </div><br><br>

<div class="top-brands" style="background-color: white !important">
<div class="container">

<h3>Shopping Cart</h3>
<div class="agile_top_brands_grids">



<!-- content -->



<div class="col-sm-12">         

<table class="table table-dark table-striped">
<thead>
<tr>
<th class="text-center">User Email</th>
<th class="text-center">Product Name</th>
<th class="text-center">Disease</th>
<th class="text-center">Price</th>
<th class="text-center">Status</th>
</tr>
</thead>
<?php 

include "db.php";
  $cart = "SELECT * FROM cart";
  $result = $db->query($cart);
  $num = $result->num_rows;
  if($num == 0){

    echo '<p class="alert text-center">No product is Available.</p>';


  }else{


    while($rows = $result->fetch_assoc()){

 $id     = $rows['id'];
$user_email = $rows['user_mail'];
$pro     = $rows['pro_name'];
$dis     = $rows['dis'];
$price   = $rows['price'];
$status  = $rows['status'];
      

      ?>
  


<tbody> 
<tr> 
  <td><?php echo $user_email ?></td>
  <td><?php echo $pro ?></td>
  <td><?php echo $dis ?></td>
  <td><?php echo $price ?></td>
  <td><?php echo $status ?></td>
</tr>
<?php
}
}

?>
</tbody>
</table>
</div>
</div>
</div>
</div>




</body>
</html>