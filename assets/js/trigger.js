$(document).ready(function(){
	$(".carousel").carousel();
	$("#joinNow").on("click",function(){
		$(".register > p.help-block, .register > button.btn-block").addClass("hide").removeClass("in");
		$(".register > form").removeClass("min").addClass("in");
		});
	$("#joinLater").on("click",function(){
		$(".register > p.help-block, .register > button.btn-block").removeClass("hide").addClass("in");
		$(".register > form").addClass("min").removeClass("in");
		return false;
		});
});