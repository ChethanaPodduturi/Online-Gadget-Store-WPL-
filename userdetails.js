$(document).ready(function()
	  {
		  $('#userdetails').click(function()
			{
						$.ajax({
						type: "POST",
						url: "userdetails.php",
						//data: dataString,
						cache: false,
						success: function(result){
							$("body").load("userdetails.php").hide().fadeIn(4000).delay(6000);
							//alert("Hi");
						}
						});
			});
			return false;
		});