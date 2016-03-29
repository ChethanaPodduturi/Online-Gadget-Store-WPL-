<?php
session_start();
include_once("config.php");
//include("order_history.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Vintage Website</title>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="userdetails.js"></script>
<!--<script type="text/javascript" src="viewcart.js"></script> -->
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
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
    <div id="products-wrapper">
 <h1>My Cart</h1>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="viewcart.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $mysqli->query("SELECT product_name,product_desc, price FROM products WHERE product_code='$product_code' LIMIT 1");
		   $obj = $results->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj->price.'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->product_name.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->product_desc.'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" id="itemname" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
			echo '<input type="hidden" id="itemcode" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_desc.'" />';
			echo '<input type="hidden" id="qty" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			echo '<input type="hidden" id="price" name="item_price['.$cart_items.']" value="'.$cart_itm["price"].'" />'; 
			//echo '<input type="hidden" id="total" name="total_price['.$cart_items.']" value="$total" />';
			
			$cart_items ++;
			
        }
		echo '<input type="hidden" id="total" name="total_price" value=".$total." />';
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Total : '.$currency.$total.'</strong>  ';
		echo '</span> <br />';
		echo '<br /><p align="right"> <input type="submit" class="outofform" id="submit" name="submit" value="Process Order"></p>';
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	?>
    </div>
</div>
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
