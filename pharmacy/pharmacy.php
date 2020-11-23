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
	<div style="background-color: #0C2E80;display: flex;align-items: center;justify-content: space-between;flex-wrap:wrap;">
    <a href="../index.php">
      <img src="../logo.png">
    </a>
    <font color="white" size="40px">
      <h2 style="">Online Pharmacy</h2>
    </font>

<div class="product_list_header" style="margin-right:20px;">  

<?php 

include "../db.php";
  $sql = "SELECT * FROM cart WHERE status = 'pending'";
  $result = $db->query($sql);
  $num = $result->num_rows;
?>
<a href="checkout.php">
<button class="btn btn-warning">
<font color="red">
      <?php 

      echo "cart($num)";
      ?></font></button></a>
</div>
  </div>
   

	<div class="container" style="">
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
<?php 

include "db.php";
  $doc = "SELECT * FROM health_pro";
  $result = $db->query($doc);
  $num = $result->num_rows;
  if($num == 0){

    echo '<p class="alert text-center">No product is Available.</p>';


  }else{


    while($rows = $result->fetch_assoc()){

 $id     = $rows['id'];
$name     = $rows['product'];
$dis     = $rows['disease'];
$pic     = $rows['pic'];
$price   = $rows['price'];
      

      ?>
  



    
<div class="col-md-3 top_brand_left" style="float: left; width: 17%;background-color: #6287E2 ; margin-left: 6%;">

<div class="hover14 column">
<div class="agile_top_brand_left_grid">

<div class="agile_top_brand_left_grid1"><figure>

<div class="snipcart-thumb" style="float: left;">
<img class="img img-responsive img-thumbnail" src="../admin/<?php echo $pic; ?>" style="width: 200px !important; height: 140px !important" />  
<p><?php echo ucfirst($name); ?></p>
<h4><?php echo ucfirst($dis); ?></h4><br>
<h4><?php echo $price; ?></h4><br>
<a href="item_details.php?item=<?php echo $id ?>" class="btn btn-success btn-sm">Add To Cart</a>
</div>


<div class="snipcart-details top_brand_home_details">



</div>
</div>
</figure>
</div>
</div>
</div>
</div>






      <?php

    }


  }




 ?>


</body>
</html>