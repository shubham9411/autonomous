jQuery(window).scroll(function(){
	if( jQuery( '#site-header-nav' ).hasClass( 'affix' ) ){
		if( ! jQuery( '#site-header-nav' ).hasClass( 'navbar-fixed-top' )){
			jQuery( '#site-header-nav' ).addClass( 'navbar-fixed-top' ).css( 'display','none' );
			setTimeout(function() {
				jQuery( '#site-header-nav' ).css( 'opacity', '0' ).css( 'display','block' );
			}, 1);
			setTimeout(function() {
				jQuery( '#site-header-nav' ).css( 'opacity', '1' ).addClass( 'nav-transition' );
			}, 100);
		}
	}
	else
		jQuery( '#site-header-nav' ).removeClass( 'navbar-fixed-top' );
});

(function( $ ) {

    //Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	//Variables on page load 
	var $myCarousel = $('#myCarousel'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
		
	//Initialize carousel 
	$myCarousel.carousel();
	
	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);
	
	//Pause carousel  
	$myCarousel.carousel('pause');
	
	
	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function (e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});  
    $('#myCarousel').carousel({
        interval:3000,
        pause: "false"
    });
	
})(jQuery);	