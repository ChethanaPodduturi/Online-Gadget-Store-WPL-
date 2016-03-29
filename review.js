$(document).ready(function() {
$("#submit").click(function() {
	var review = $("#review").val();
	var type=$("#type").val();
	var dataString = 'type1='+ type +'&review1='+ review;
				
if(review=='')
{
	alert("Please fill the fields");
}
else{
				$.ajax({
						type: "POST",
						url: "review.php",
						data: dataString,
						cache: false,
						success: function(result){
							//$("body").load("products.html").hide().fadeIn(4000).delay(6000);
							alert("Thanks for your review...!");
							$("form")[0].reset();
						}
						});
	/*$.post("review.php",{
	review1:review
}, function(data) {
if (data == 'You have Successfully Reviewed.....') {
$("form")[0].reset();
}
alert(data);
});*/
}
return false;
});
});	
