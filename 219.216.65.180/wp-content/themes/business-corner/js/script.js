jQuery(document).ready(function() {
	/* Menu */
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('.nav li.dropdown').find('i').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 768) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
	 
});
	/* Menu */
	
jQuery(document).ready(function() {
	/* Slider */
	var swiper = new Swiper('.home-slider', {
		nextButton: '.slider-next',
        prevButton: '.slider-prev',
        slidesPerView: '1',
		spaceBetween: 10,
		autoplay:3000,
		loop:true
    });
   
	/* Slider */
	
	
 });
 
	
	