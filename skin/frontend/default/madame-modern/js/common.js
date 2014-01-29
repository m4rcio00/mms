//Menu
	jQuery(document).ready(function() { 
	jQuery('ul.sf-menu').superfish({ 
		delay:       600,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       '600',                          
		autoArrows:  false,                          
		dropShadows: false                            
	}); 
// COMECO BARRA FIXA TOP
	 var bar;
        bar=$(".floatingTopBar");
        $("body").addClass("hideFloatingBar");
		
		var price;
        price = $(".comprabot2");
        $("body").addClass("hidePrice");
		
		if(bar.length)
			$(window).QD_scroll(function(scrollTop){
				if(scrollTop>220){
					bar.slideDown(function(){ $("body").addClass("showFloatingBar").removeClass("hideFloatingBar"); });
				}
				else{
					bar.slideUp();
					$("body").removeClass("showFloatingBar").addClass("hideFloatingBar");
				}
				
				if(price.length){
				
					if(!price.hasClass('inativo'))
					if(scrollTop>450){
						price.slideDown(function(){ $("body").addClass("showPrice").removeClass("hidePrice"); });
					}
					else{
						price.slideUp();
						$("body").removeClass("showPrice").addClass("hidePrice");
					}
				}
				
	});
// FIM BARRA FIXA TOP
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
           jQuery(this).find(".cartView").stop(true, true).slideDown();
           //alert("Funcipmasdfasdf");
        });
        //hide submenus on exit
        jQuery('.shoppingCart').mouseleave(function() {
            jQuery(this).find(".cartView").stop(true, true).slideUp();
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