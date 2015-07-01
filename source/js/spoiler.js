$(document).ready(function(){
	$('.spoiler').hide();

	$('.spoiler_button').click(function(){
		$(this).next('.spoiler').slideToggle(200);
	});
});