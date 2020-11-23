<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "doctor";
$db = mysqli_connect($host,$user,$pass,$db_name);
if ($db) {
	echo "connected";
}
?>