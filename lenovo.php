<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Vintage Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="style/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="userdetails.js"></script>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
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
      <div class="title_box">Popular Manufacturers</div>
      <ul class="left_menu">
        <li class="odd"><a href="apple.php">Apple</a></li>
        <li class="even"><a href="samsung.php">Samsung</a></li>
        <li class="odd"><a href="sony.php">Sony</a></li>
        <li class="even"><a href="sandisk.php">Sandisk</a></li>
        <li class="odd"><a href="canon.php">Canon</a></li>
        <li class="even"><a href="lenovo.php">Lenovo</a></li>
      </ul>
    </div>
    <!-- end of left content -->
    <div class="center_content">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
	$results = $mysqli->query("SELECT * FROM products where manufacturer='Lenovo' ORDER BY id ASC");
    if ($results) { 
	
        //fetch results set as object and output HTML
        while($obj = $results->fetch_object())
        {
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
    
    }
    ?>
	</div>
    <!-- end of center content -->
    <div class="right_content">
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
	echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>
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
