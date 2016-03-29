<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect("localhost", "root", ""); // Establishing connection with server..
$db = mysql_select_db("vintage", $connection);
$Client_id=$_SESSION['Client_id'];
$Prod_type=$_POST['type1'];
$review=$_POST['review1'];
//if(($data)==0)
{
$query=mysql_query("insert into review(Client_id, Product_code, Review) values('$Client_id','$Prod_type','$review')");
if($query)
{
	header("Location:Laptops.php");
  exit();
}
}
?>