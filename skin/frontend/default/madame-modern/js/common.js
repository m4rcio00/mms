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

// TOP CART
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

// TOP CART BARRA
function slideEffectAjaxBarra() {
      jQuery('.shoppingCartBarra').mouseenter(function() {
           jQuery(this).find(".cartViewBarra").stop(true, true).slideDown();
           //alert("Funcipmasdfasdf");
        });
        //hide submenus on exit
        jQuery('.shoppingCartBarra').mouseleave(function() {
            jQuery(this).find(".cartViewBarra").stop(true, true).slideUp();
        });
}
//COMEÇO BARRA FIXA DO TOP
function barraTopoFixaAjax() {
		var bar;
        bar=jQuery(".floatingTopBar");
        jQuery("body").addClass("hideFloatingBar");
		
		var price;
        price = jQuery(".comprabot2");
        jQuery("body").addClass("hidePrice");
		
		if(bar.length)
			jQuery(window).QD_scroll(function(scrollTop){
				if(scrollTop>220){
					bar.slideDown(function(){ jQuery("body").addClass("showFloatingBar").removeClass("hideFloatingBar"); 
					jQuery('#buttonFixedBar').show();
					});
				}
				else{
					bar.slideUp();
					jQuery("body").removeClass("showFloatingBar").addClass("hideFloatingBar");
				}
				
				if(price.length){
				
					if(!price.hasClass('inativo'))
					if(scrollTop>450){
						price.slideDown(function(){ jQuery("body").addClass("showPrice").removeClass("hidePrice"); });
					}
					else{
						price.slideUp();
						jQuery("body").removeClass("showPrice").addClass("hidePrice");
					}
				}
				
	});
}
//FINAL BARRA FIXA DO TOP

//FUNÇÃO PARA O TOOLTIP
function tooltipmms(){
	jQuery('.tooltip-contato').tooltipster({
				interactive: true,
				delay:100,
				content: 
				jQuery('<div class="fale-conosco"><div class="dropdown dropTelevendas"><i class="ic icBigFone"></i><div class="laranja">Atendimento</div><p class="fale-msg">Tire suas dúvidas sobre produtos, preços ou pedidos</p><div class="borderSection"><div class="titleTele"><i class="icemail"></i> Horário de Atendimento</div><span class="colLabelTele">Segunda a Sexta</span> <span class="colInfoTele">8h00 às 20h00</span><span class="colLabelTele">Sábados</span> <span class="colInfoTele">8h00 às 14h00</span></div><div class="borderSection"><div class="titleTele"><i class="ichora"></i> Horário de Atendimento</div><span class="colLabelTele">Segunda a Sexta</span> <span class="colInfoTele">8h00 às 20h00</span><span class="colLabelTele">Sábados</span> <span class="colInfoTele">8h00 às 14h00</span></div><div class="borderSection"><div class="titleTele"><i class="ic icmoney"></i> Custo da Chamada</div><span class="colLabelTele">4007 1307</span> <span class="colInfoTele">Custo da ligação + impostos <br> <span class="small">(de acordo com operadora e Estado)</span></span><span class="colLabelTele">0800604 8200</span> <span class="colInfoTele">Gratuito, somente para ligações de telefone fixo</span></div></div></div>'), 
	});			
}
//FIM FUNÇÃO PARA O TOOLTIP
	 
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
	slideEffectAjaxBarra();
	tooltipmms();

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

