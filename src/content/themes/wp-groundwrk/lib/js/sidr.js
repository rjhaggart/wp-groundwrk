$(function(){

	$('.nav-primary').find('.wrap').append('<i class="fa fa-bars menu-btn"></i>');

	$('.menu-btn').sidr({
		name: 'respNav',
		source: '.nav-primary',
		side: 'right'
	});

	//Dev open by default
	//$.sidr('open', 'respNav');

	//this code is close sidr menu if clicked outside  {optional}
	$(document)
		.bind('click', function (){
			$.sidr('close', 'respNav');
		})
		.bind('touchstart', function(){
			$.sidr('close', 'respNav');
		});

	var jRes = jRespond([
		{
			label: 'handheld',
			enter: 0,
			exit: 767
		},{
			label: 'tablet',
			enter: 768,
			exit: 979
		},{
			label: 'laptop',
			enter: 980,
			exit: 1199
		},{
			label: 'desktop',
			enter: 1200,
			exit: 10000
		}
	]);

	// Close sidr at breakpoint
	jRes.addFunc({
		breakpoint: 'tablet',
		enter: function(){
			$.sidr('close', 'respNav');
		}
	});

});