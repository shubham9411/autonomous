jQuery( document ).ready(function() {
	pillsResponsive();
	faculty_modal();
 });
jQuery( window ).scroll(function() {
	navbarAffix();
 });
jQuery( window ).resize(function() {
	pillsResponsive();
	faculty_modal();
	scroller();
 });
function scroller(){
	jQuerywindow = jQuery( window );
	if ( jQuerywindow.width() > 768 ) {
	 jQuery('.update-marquee').easyTicker({
		 direction: 'up'
	 });
 }
}
function navbarAffix() {
	if ( jQuery( '#site-header-nav' ).hasClass( 'affix' ) ) {
		if ( ! jQuery( '#site-header-nav' ).hasClass( 'navbar-fixed-top' ) && jQuery( window ).width() > 767 ) {
			jQuery( '#site-header-nav' ).addClass( 'navbar-fixed-top' ).css( 'display', 'none' );
			setTimeout(function() {
				jQuery( '#site-header-nav' ).css( 'opacity', '0' ).css( 'display', 'block' );
			}, 1 );
			setTimeout(function() {
				jQuery( '#site-header-nav' ).css( 'opacity', '1' ).addClass( 'nav-transition' );
			}, 100 );
		}
	} else {
		jQuery( '#site-header-nav' ).removeClass( 'navbar-fixed-top' );
	}
}
function pillsResponsive() {
	jQuerywindow = jQuery( window );
	if ( jQuerywindow.width() > 768 ) {
		jQuery( '.tabs-home' ).addClass( 'nav-justified' ).removeClass( 'nav-proper' );
	} else {
		jQuery( '.tabs-home' ).removeClass( 'nav-justified' ).addClass( 'nav-proper' );
	}
}
(function( $ ) {
	var $myCarousel = $( '#myCarousel' ),
		$firstAnimatingElems = $myCarousel.find( '.item:first' ).find( '[data-animation ^= "animated"]' ); //Variables on page load
	function doAnimations( elems ) { //Function to animate slider captions
		var animEndEv = 'webkitAnimationEnd animationend'; //Cache the animationend event in a variable
		elems.each(function() {
			var $this = $( this ),
				$animationType = $this.data( 'animation' );
			$this.addClass( $animationType ).one( animEndEv, function() {
				$this.removeClass( $animationType );
			});
		});
	}
	$myCarousel.carousel(); //Initialize carousel
	doAnimations( $firstAnimatingElems ); //Animate captions in first slide on page load
	$myCarousel.carousel( 'pause' ); //Pause carousel
	$myCarousel.on( 'slide.bs.carousel', function(e) { //Other slides to be animated on carousel slide event
		var $animatingElems = $( e.relatedTarget ).find( '[data-animation ^= "animated"]' );
		doAnimations( $animatingElems );
	});
	$( '#myCarousel' ).carousel({
		interval: 3000,
		pause: 'false'
	});

 })( jQuery );
(function( $ ){
	$('.dept-img').click(function(){
		var modal_no = this.id.match(/\d+/);
		$('#dept-modal-' + modal_no ).css( 'display', 'block' );
		$('#dept-img-modal-' + modal_no).attr( 'src', this.src );
		$('#dept-img-caption-' + modal_no).html( this.alt );
	});
	if ( 0 != $('#joinAlumniModal').length) {
		setTimeout( function(){
			$('#joinAlumniModal').modal();
		}, 5000 );
	}
 })( jQuery );
function faculty_modal() {
	(function( $ ){
		if( $( window ).width() < 991 ) {
			$('#link-modal-faculty').attr( 'data-target' , '' ).attr( 'data-toggle' , '' );
		}
	 })( jQuery );
}
