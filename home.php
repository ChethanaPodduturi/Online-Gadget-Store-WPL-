<?php
include('login.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>Vintage Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="../tool-shop/style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="signin.js"></script>
<!--<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="ajaxlogin.js"></script>-->
<script>
PositionX = 100;
PositionY = 100;
defaultWidth  = 500;
defaultHeight = 500;
var AutoClose = true;
if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=150,height=100,left='+PositionX+',top='+PositionY;
function popImage(imageURL,imageTitle){
if (isNN){imgWin=window.open('about:blank','',optNN);}
if (isIE){imgWin=window.open('about:blank','',optIE);}
with (imgWin.document){
writeln('<html><head><title>Loading...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(300,300);');
writeln('width=300-(document.body.clientWidth-document.images[0].width);');
writeln('height=300-(document.body.clientHeight-document.images[0].height);');
writeln('window.resizeTo(width,height);}');writeln('if (isNN){');       
writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
if (!AutoClose) writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
else writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
close();		
}}
</script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div class="top_right">
		<div class="big_banner"> <a href="#"><img src="images/banner728.png" alt="" border="0" height="120" margin-right="40"/></a> </div>
    </div>
    <div id="logo"> <a href="#"><img src="images/logo.jpg" alt="" border="0" width="40%" height="40%"/></a> </div>
  </div>
 <!-- <div id="main_content">
    <div id="menu_tab">
      <ul class="menu" >
        <li><a href="index.html" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="#" class="nav">My account</a></li>
        <li class="divider"></li>
		<li><a href="cart.html" class="nav">Cart</a></li>
        <li class="divider"></li>
        <li><a href="../home.html" class="nav">Sign Up/Login</a></li>
        <li class="divider"></li>
        <li><a href="contact.html" class="nav">Contact Us</a></li>
        <li class="divider"></li>
      </ul>
    </div> -->
    <!-- end of menu tab -->

    <div class="left_content">
	  <div class="title_box"><a href="prod.html" class="anc">Home</a></div>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="#">Apple iPad Air 2 </a></div>
        <div class="product_img"><a href="#"><img src="images/p1.jpg" height="180px" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
    </div>
    <!-- end of left content -->
    <div class="center_content">
		<div class="oferta"> <img src="images/oferta.jpg" width="160px" height="113px" border="0" class="oferta_img" alt="" />
			<div class="oferta_details">
			<div class="oferta_title">The Gadget Shop</div>
			<div class="oferta_text"> The Gadget Shop creates unique products that stimulate the imagination. Shop here for home and office gadgets, collectibles, and more. <br /><b>Free shipping available!!</b> </div>
			</div>
		</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
            <div class="form_row">
              <h2> Sign In/ Register</h2>
			  <img src="images/avatar.png" class="avatar" /><br /> <br />
			</div>
			<form action="login.php" method="post">
            <div class="form_row">
			  <input type="text" id="email" name="email" placeholder="Username"/>
            </div>
            <div class="form_row">
				<input type="password" id="password" name="password" placeholder="Password" />
            </div>
            <div class="form_row">
			<input id="login" type="submit" name="submit" class="outofform" value="Sign In" /><br />
			
			<!--<button class="outofform" onclick="window.location.href='registration.html'"> Register </button><br />-->
			<a href='registration.html'>Register</a>
			</form>
			<span><?php echo $error; ?></span>
			</div>
			
			
          </div>
        </div>
      </div>
	  <!--	  <form action="" method="post">
<label>User name :</label>
<input id="email" name="email" type="text">
<label>Password :</label>
<input id="password" name="password" type="password"><br/><br/>
<input name="submit" type="submit" id="register" value=" Login ">
<span><?php echo $error; ?></span>
</form>-->

	  <div class="center_title_bar">Recommended Products</div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="#">Apple iPhone 6</a></div>
          <div class="product_img"><a href="#"><img height="100px" src="images/iphone6.png" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="#">Samsung Note 4</a></div>
          <div class="product_img"><a href="#"><img class="prod" src="images/note4.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
        </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="#">Nexus 9</a></div>
          <div class="product_img"><a href="#"><img class="prod" src="images/N9.jpg" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
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
    </div>
    <!-- end of right content -->
  
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
