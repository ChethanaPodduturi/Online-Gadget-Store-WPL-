<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	// Connection constants
	define('MEMCACHED_HOST', '127.0.0.1');
	define('MEMCACHED_PORT', '11211');
 
	// Connection creation
	$memcache = new Memcache;
	$cacheAvailable = $memcache->connect(MEMCACHED_HOST, MEMCACHED_PORT);
	
	include_once("config.php");
	$connection = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("vintage", $connection);
?>
<!DOCTYPE html>
<html>
<head>
<title>Vintage Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="userdetails.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
		<div class="big_banner"> <a href="#"><img src="images/banner728.png" alt="" border="0" height="120" margin-right="40"/></a> </div>
    </div>
    <div id="logo"> <a href="#"><img src="images/logo.jpg" alt="" border="0" width="40%" height="40%"/></a> </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu" >
        <li><a href="products.html" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="search.php" class="nav"> Product Search </a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav"><span id="userdetails">My Account</span></a></li>
        <li class="divider"></li>
		<li><a href="view_cart.php" class="nav">My Cart</a></li>
        <li class="divider"></li>
		<li><a href="orders.php" class="nav">My Orders</a></li>
		<li class="divider"></li>
        <li><a href="contact.html" class="nav">Contact Us</a></li>
        <li class="divider"></li>
        <li><a href="logout.php" class="nav">Log out</a></li>
      </ul>
    </div>
    <!-- end of menu tab -->

    <div class="left_content">
      <div class="title_box">Categories</div>
      <ul class="left_menu">
        <li class="odd"><a href="laptops.php">Laptops</a></li>
        <li class="even"><a href="tablets.php">Tablets</a></li>
        <li class="odd"><a href="mobiles.php">Mobiles</a></li>
        <li class="even"><a href="digicam.php">Digital Cameras</a></li>
        <li class="odd"><a href="sd.php">Storage Devices</a></li>
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Apple iPad Air 2 </a></div>
        <div class="product_img"><a href="#"><img src="images/p1.jpg" height="180px" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
		<h3>Product Search</h3>
		<?php
			$query="SELECT * FROM products";
			$result=mysql_query($query);
			$i=0;
			while($rows=mysql_fetch_array($result))
			{
				$name[$i]=$rows['product_name'];
				$i++;
			}
			$total_elmt=count($name);
		?>
		<form method="post" action="" id="searchform">
			Select Product Name: <br />
			<select name="sel">
				<option>Select</option>
				<?php
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php
					echo $name[$j];
					?></option><?php
				}
				?>
			</select>
			<input type="submit" name="submit" value="Search" class="outofform" /><br />
		</form>
		<?php
		$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		if(isset($_POST['submit']))
		{
			$value=$_POST['sel'];
			$query2="SELECT * FROM products where product_name='$value'";
			$results=$mysqli->query($query2) or die("Query Failed : ".mysql_error());
			while($obj = $results->fetch_object())
			{
				/*echo "Product Name: ".$row['product_name']."<br />";
				echo "Product Type: ".$row['product_type']."<br />";
				echo "Price: ".$row['price']."<br />";
				echo "Manufacturer: ".$row['manufacturer']."<br />";*/
				echo '<div class="product">'; 
            echo '<form method="post" action="cart_update.php">';
			echo '<div class="product-thumb"><img width="100px" src="images/'.$obj->product_img_name.'"></div>';
            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
            echo '<div class="product-info">';
			echo 'Price '.$currency.$obj->price.' | ';
            echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
			echo '<button class="add_to_cart">Add To Cart</button>';
			echo '</div></div>';
            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
            echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';
			}
			mysql_close($connection);
		}
		?>
		
	</div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Whats new</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Apple Watch</a></div>
        <div class="product_img"><a href="#"><img class="prod" src="images/iwatch.jpg" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
      <div class="title_box">Manufacturers</div>
      <ul class="left_menu">
        <li class="odd"><a href="apple.php">Apple</a></li>
        <li class="even"><a href="samsung.php">Samsung</a></li>
        <li class="odd"><a href="sony.php">Sony</a></li>
        <li class="even"><a href="sandisk.php">Sandisk</a></li>
        <li class="odd"><a href="canon.php">Canon</a></li>
        <li class="even"><a href="lenovo.php">Lenovo</a></li>
      </ul>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="images/logo.jpg" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> Vintage Website. All Rights Reserved 2015<br />
      <a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
    </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
