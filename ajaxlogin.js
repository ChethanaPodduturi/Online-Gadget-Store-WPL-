$(document).ready(function()
	  {
		  $('#login').click(function()
			{
				var username=$("#email").val();
				var password=$("#password").val();
				var dataString = 'username='+username+'&password='+password;
				if(username==''||password=='')
				{
					alert("Please fill all the fields!!");
				}
				else
					{
						/*$.ajax({
						type: "POST",
						url: "login.php",
						data: dataString,
						cache: false,
						success: function(result){
							//$("body").load("products.html").hide().fadeIn(4000).delay(6000);
							alert("Hi");
						}
						});*/
						
					}
				return false;
		});
});