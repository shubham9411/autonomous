jQuery(document).ready(function(){

});
jQuery(window).scroll(function(){
	if( jQuery('#site-header-nav').hasClass('affix') ){
		if( ! jQuery('#site-header-nav').hasClass('navbar-fixed-top')){
			jQuery('#site-header-nav').addClass('navbar-fixed-top').css('display','none');
			setTimeout(function() {
				jQuery('#site-header-nav').css('opacity' , '0').css('display','block');
			}, 1);
			setTimeout(function() {
				jQuery('#site-header-nav').css('opacity' , '1').addClass('nav-transition');
			}, 100);
		}
	}
	else
		jQuery('#site-header-nav').removeClass('navbar-fixed-top');
});