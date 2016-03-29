<?php
	session_start();
	include_once("config.php");
	if(isset($_POST['submit']))
	{
		if(isset($_GET['go']))
		{
			if(preg_match("^/[A-Za-z]+/", $_POST['name']]))
			{
				$name=$_POST['name'];
				//$category=$_POST['category'];
				$db = mysql_connect("localhost", "root", "");
				$mydb = mysql_select_db("vintage", $db);
				$sql="SELECT * FROM products where product_name like '%" .$name. "%'";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{
					$Prod_name=$row['product_name'];
					$ID=$row['product_code'];
					echo "<ul>";
					echo "<li>" . "<a href=\"search.php?id=$ID\">" .$Prod_name. "</a></li>";
					echo "</ul>";
				}
			}
			else if(preg_match("^/[A-Za-z]+/", $_POST['category']]))
			{
				//$name=$_POST['name'];
				$category=$_POST['category'];
				$db = mysql_connect("localhost", "root", "");
				$mydb = mysql_select_db("vintage", $db);
				$sql="SELECT * FROM products where product_type like '%" .$category. "%'";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{
					//$Prod_name=$row['product_name'];
					$ID=$row['product_code'];
					$Type=$row['product_type'];
					echo "<ul>";
					echo "<li>" . "<a href=\"search.php?id=$ID\">" .$Type. "</a></li>";
					echo "</ul>";
				}
			}
			else if(preg_match("^/[A-Za-z]+/", $_POST['name']]) && preg_match("^/[A-Za-z]+/", $_POST['category']]))
			{
				$name=$_POST['name'];
				$category=$_POST['category'];
				$db = mysql_connect("localhost", "root", "");
				$mydb = mysql_select_db("vintage", $db);
				$sql="SELECT * FROM products where product_name like '%" .$name. "%' and product_type like '%" .$category. "%'";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
				{
					$Prod_name=$row['product_name'];
					$Type=$row['product_type'];
					$ID=$row['product_code'];
					echo "<ul>";
					echo "<li>" . "<a href=\"search.php?id=$ID\">" .$Prod_name. " ". $Type ."</a></li>";
					echo "</ul>";
				}
			}
			else
			{
				echo "<br /><br /><p>Please enter a search query...</p>"
			}
		}
	}
?>