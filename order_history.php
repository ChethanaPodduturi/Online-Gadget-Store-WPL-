<?php 
/*	if (isset($_POST['submit'])) {
		
	$Client_id=$_SESSION["Client_id"];
	$connection=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connection,"vintage");
	//$result=mysqli_query($connection, "SELECT * FROM orders where Client_id='$_SESSION[Client_id]'");
	
	if($_POST)
	{
		$ItemPrice = $mysqli->query("SELECT Price FROM products WHERE item_code = product_code");
		
		foreach($_POST['item_name'] as $key=>$itmname)
		{
			$product_code 	= filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING); 
		
			$results = $mysqli->query("SELECT product_name, product_desc, price FROM products WHERE product_code='$product_code' LIMIT 1");
			$obj = $results->fetch_object();
			
			$qnty = $_POST['item_qty'];
			
			$subtotal = ($obj->price*$_POST['item_qty'][$key]);
			
			//$ItemTotalPrice = $ItemTotalPrice + $subtotal;
			
			$query=mysqli_query($connection, "INSERT into orders(Client_id, Product_id, Quantity) values('$Client_id', '$product_code', '$qnty'");
			
		}
	}
	$prod_id=$_POST["item_code"];
	$prod_name=$_POST["item_name"];
	$qty=$_POST["item_qty"];
	$price=$_POST["price"];
	
	/*while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
	{
		if($price>0)
		{
			$query=mysqli_query($connection, "INSERT into orders(Client_id, Product_id, Product_name, Quantity, Price) values('$Client_id', '$prod_id', '$prod_name', '$qty', '$price')");
		}
	}*/
	
error_reporting(E_ALL ^ E_DEPRECATED);
$connection = mysql_connect("localhost", "root", ""); // Establishing connection with server..
$db = mysql_select_db("vintage", $connection); // Selecting Database.
$Client_id=$_SESSION['Client_id'];
if (isset($_POST['submit'])) 
{
$prod_name=$_POST['item_name']; // Fetching Values from URL.
$prod_id=$_POST['item_code'];
$qnty=$_POST['item_qty'];
$price=$_POST['item_price'];
$result = mysql_query("SELECT * from products where item_code = product_code");
//$ItemPrice = $mysqli->query("SELECT Price FROM products WHERE item_code = product_code");


/*while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
{
	$price=$row['Price'];
}
*/
if($price>0)
{
	$query=mysqli_query($connection, "INSERT into orders(Client_id, Product_id, Product_name, Quantity, Price) values('$Client_id', '$prod_id', '$prod_name', '$qnty', '$price')");
}

if($query)
{
	echo"You have successfully placed order!!";
}
}
mysql_close ($connection);
?>