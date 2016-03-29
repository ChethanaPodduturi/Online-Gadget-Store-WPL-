<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect("localhost", "root", ""); // Establishing connection with server..
$db = mysql_select_db("vintage", $connection);
$Client_id=$_SESSION['Client_id'];
$total=0;
foreach ($_SESSION["products"] as $cart_itm)
{
//$total=$_POST['total_price'];
	$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
	$total = ($total + $subtotal);
}
if(($total)>0)
{
$order_id=rand(50001,90000);
$query=mysql_query("insert into orders(Client_id, Order_id, Orderdate, tprice) values('$Client_id','$order_id',sysdate(), '$total')");
if($query)
{
	echo"Thanks for your Order <br />";
	echo "<a href=\"products.html\">Home</a>";
}}
?>