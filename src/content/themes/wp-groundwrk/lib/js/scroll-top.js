$(function(){

	// Scroll body to 0 on click
	$('.back-top').click(function(e){
		e.preventDefault();
		$('body, html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
});