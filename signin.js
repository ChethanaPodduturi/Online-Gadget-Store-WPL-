$(document).ready(function()
	{
		$('.product_img').click(function()
		{
			alert("Please login for further details");
			window.location.href="home.php";
		});
		$('#review').click(function()
		{
			alert("Please login to provide a review");
			window.location.href="home.php";
		});
	});