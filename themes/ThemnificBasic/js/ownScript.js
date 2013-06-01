$(document).ready(function(){

$('.folioinfo').css('opacity','0');	



/* slider image hover effect */	
$('#tabsmallss li img').animate({opacity: 0.3}, "slow");
	$('#tabsmallss li img').hover(function() {
		$(this).animate({opacity: 1}, "slow");
		}, function() {
	$(this).animate({opacity: 0.3}, "slow");
});


/* line posts hover */
$('ul.bigtips li,ul.smalltips li').hover(function() {
	$(this).find('img')
		.animate({
			opacity: '0.2', 	
		}, 400); 
	$(this).find('p')
		.animate({
			opacity: '1', 	
		}, 600); 

	} , function() {
	$(this).find('img')
		.animate({
 			opacity: '1',  
		}, 800);
	$(this).find('p')
		.animate({
			opacity: '0', 	
		}, 600); 
});
/* end line posts hover */

$('.item_basic img,.item_full img').hover(function() {
	$(this).animate({opacity: 0.15}, "normal");
	}, function() {
	$(this).animate({opacity: 1}, "normal");
	}); 
$(".slider,.slider_small").easySlider({
		auto: true,
		continuous: true
	});



$(".cont-slider,.cont-slider2").easySlider({
			speed: 			800,
			auto:			true,
			pause:			10000,
			continuous:		true
	});


$('.item_plain').hoverIntent(function() {
	$(this).css({});
	$(this).find('.folioinfo')
		.animate({
			opacity: '1',	
		}, 400); 
	$(this).find('img')
		.animate({
			opacity: '0.6', 	
		}, 400); 

	} , function() {
	$(this).css({}); 
	$(this).find('.folioinfo')
		.animate({
			opacity: '0',
		}, 800);
	$(this).find('img')
		.animate({
			opacity: '1', 	
		}, 400); 
});

/* Tooltip*/
		$("body").prepend('<div class="tooltip"><p></p><div class="triangle"></div></div>');
		var tt = $("div.tooltip");
		
		$(".flickr_badge_image a img,.folioinfo a").hover(function() {								
			var btn = $(this);
			
			tt.children("p").text(btn.attr("title"));								
						
			var t = Math.floor(tt.outerWidth(true)/2),
				b = Math.floor(btn.outerWidth(true)/2),							
				y = btn.offset().top - 30,
				x = btn.offset().left - (t-b);
						
			tt.css({"top" : y+"px", "left" : x+"px", "display" : "block"});			
			   
		}, function() {		
			tt.hide();			
		});


	/* Resize too large images */
	var size = 598;
	var image = jQuery('.entry img');
	
	for (i=0; i<image.length; i++) {
		var bigWidth = image[i].width;
		var bigHeight = image[i].height;
	
		if (bigWidth > size) {	
			var newHeight = bigHeight*size/bigWidth;
			image[i].width = size;
			image[i].height = newHeight;
		}
	}


});
