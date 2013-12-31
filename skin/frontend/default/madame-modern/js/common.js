//Menu
	jQuery(document).ready(function() { 
	jQuery('ul.sf-menu').superfish({ 
		delay:       600,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       '600',                          
		autoArrows:  false,                          
		dropShadows: false                            
	}); 
}); 

//Back to Top Button
jQuery(function() {
	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() > 300) {
			jQuery('#back_top').fadeIn();	
		} else {
			jQuery('#back_top').fadeOut();
		}
	});
 
	jQuery('#back_top').click(function() {
		jQuery('body,html').animate({scrollTop:0},500);
	});	
});

//Top Cart
function slideEffectAjax() {
      jQuery('.shoppingCart').mouseenter(function() {
           // $(this).find(".cartView").stop(true, true).slideDown();
           alert("Funcipmasdfasdf");
        });
        //hide submenus on exit
        $('.top-cart-contain').mouseleave(function() {
            $(this).find(".top-cart-content").stop(true, true).slideUp();
        });
}


	 
//Home Page Main Slider
jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({
        animation: "slide",
		animationLoop: true,
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
});


jQuery(document).ready(function() {

    slideEffectAjax();

	jQuery(".topnav").accordion({
		accordion:false,
		speed: 300,
		closedSign: '[+]',
		openedSign: '[-]'
	});


});