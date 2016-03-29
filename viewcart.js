$(document).ready(function() {
$("#submit").click(function() {
	var total = $("#total").val();	
if(total == '')
{
	alert("no items placed");
}
else{
	$.post("viewcart.php",{
	total1:total,
}, function(data) {
if (data == 'You have Successfully Placed Your Order.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});	