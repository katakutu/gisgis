$(document).ready(function(){
	$('li ul').hide();

	$('li').mouseenter(function() {
		$(this).children('ul').slideDown(200);
	}).mouseleave(function() {
		$(this).children('ul').slideUp(200);
	});
});