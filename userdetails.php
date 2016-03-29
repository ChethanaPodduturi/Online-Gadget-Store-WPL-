<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Vintage Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
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
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Apple iPad Air 2 </a></div>
        <div class="product_img"><a href="#"><img src="images/p1.jpg" height="180px" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
	<?php
	// Connect to database server
	$connection=mysqli_connect("localhost", "root", "");

	// Select database
	$db=mysqli_select_db($connection,"vintage");

	// SQL query
	$strSQL = "SELECT * FROM user_details where Client_id= $_SESSION[Client_id]";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysqli_query($connection,$strSQL);
	
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	while($row = mysqli_fetch_array($rs,MYSQL_ASSOC)){ 

	   // Write the value of the column FirstName (which is now in the array $row)
	 // echo $row["Fname"] . "<br />";
            
            $fname= $row["Fname"] ; 
            $lname=$row["Lname"];
            $phn=$row["Phn_no"];
            $email=$row["email_id"];
            
	}  

         $st= "SELECT * FROM address where Client_id=$_SESSION[Client_id]";

         $resul=mysqli_query($connection,$st);

        while( $res=mysqli_fetch_array($resul,MYSQL_ASSOC) ){

			$street=$res["Street"];
            $apt=$res["Apt_no"];
			$city=$res["City"];
			$state=$res["State"];
			$zip=$res["Zip"];
          
}
	// Close the database connection
	mysqli_close($connection);
	
?>

	<h2>MY PROFILE</h2>

	<table class="profile">
		<tr>
			<td><b>Client id:</b></td>
			<td> <?php echo $_SESSION["Client_id"]?></td>
		</tr>
		<tr>
			<td><b>First Name: </b></td>
			<td><?php echo $fname ?></td>
		</tr>
		<tr>
			<td><b>Last Name:</b> </td>
			<td><?php echo $lname ?></td>
		</tr>
		<tr>
		    <td><b>Email: </b></td>
			<td><?php echo $email ?></td>
		</tr>
		<tr>
			<td><b>Phone Number: </b></td>
			<td><?php echo $phn ?></td>
		</tr>
			<td><b>Street: </b></td>
			<td><?php echo $street ?></td>
		</tr>
		<tr>
			<td><b>Apt No: </b></td>
			<td><?php echo $apt ?></td>
		</tr>
		<tr>
			<td><b>City: </b></td>
			<td><?php echo $city ?></td>
		</tr>
		<tr>
			<td><b>State: </b></td>
			<td><?php echo $state ?></td>
		</tr>
		<tr>
			<td><b>Zip:</b> </td>
			<td><?php echo $zip ?></td>
		</tr>
	</table>

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
