(function( $ ){
	var width = jQuery(window).width();
	var owl = $('#hof-carousel');
	if( width < 480) {
		owl.owlCarousel({
			items:2,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:2000,
			autoplayHoverPause:true
		});
		console.log('lol480')
	} else if( width < 767) {
		owl.owlCarousel({
			items:3,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:2000,
			autoplayHoverPause:true
		});
		console.log('lol767')
	} else {
		owl.owlCarousel({
			items:4,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:2000,
			autoplayHoverPause:true
		});
	}
	$('.play').on('click',function(){
		owl.trigger('play.owl.autoplay',[1000])
	})
	$('.stop').on('click',function(){
		owl.trigger('stop.owl.autoplay')
	})
})( jQuery );