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
           jQuery(this).find(".cartView").stop(true, true).slideDown();
           //alert("Funcipmasdfasdf");
        });
        //hide submenus on exit
        jQuery('.shoppingCart').mouseleave(function() {
            jQuery(this).find(".cartView").stop(true, true).slideUp();
        });
}
//COMEÇO BARRA FIXA DO TOP
function barraTopoFixaAjax() {
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
}
//FINAL BARRA FIXA DO TOP
	 
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
	barraTopoFixaAjax();

	jQuery(".topnav").accordion({
		accordion:false,
		speed: 300,
		closedSign: '[+]',
		openedSign: '[-]'
	});


});

/* Quatro Digital jQuery Scroll // 1.0 // Carlos Vinicius // Todos os direitos reservados */
(function(a){"function"!==typeof a.fn.QD_scroll&&(a.fn.QD_scroll=function(d,b){var c;b=b||100;window.QuatroDigital_scroll=window.QuatroDigital_scroll||{};window.QuatroDigital_scroll.scrollTop=null;window.QuatroDigital_scroll.lastScrollTop=null;a(this).scroll(function(){c=this;window.QuatroDigital_scroll.scrollTop=a(window).scrollTop()});(function(){window.QuatroDigital_scroll.interval=setInterval(function(){window.QuatroDigital_scroll.lastScrollTop!==window.QuatroDigital_scroll.scrollTop&&(null!==
window.QuatroDigital_scroll.scrollTop&&d.call(c,window.QuatroDigital_scroll.scrollTop),window.QuatroDigital_scroll.lastScrollTop=window.QuatroDigital_scroll.scrollTop)},b)})()})})(jQuery);