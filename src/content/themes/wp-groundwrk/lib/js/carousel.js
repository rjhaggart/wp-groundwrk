$(function(){

	var $carousel = $('#page-carousel');
	$carousel.find('.item:first').addClass('active');

	$carousel.carousel({
		interval: 10000
	});

});