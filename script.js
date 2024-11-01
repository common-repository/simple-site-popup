jQuery(document).ready(function(){
	
	// define variable to use
	var popup = jQuery('#main-popup'); 
	var cls_popup = jQuery('#close-popup');
	var bg = jQuery('#background-popup');
	
	// auto align center for #main-popup
	var top = -(popup.outerHeight() / 2)+'px';
	var left = -(popup.outerWidth() / 2)+'px';
	popup.css({'position':'absolute', 'position':'fixed', 'margin-top':top, 'margin-left':left, 'top':'50%', 'left':'50%'});
	
	popup.fadeIn(1000); 
	bg.animate({opacity:0.8},0).fadeIn(1000); // opacity for background
	
	//close popup
	bg.click(function(){
		popup.fadeOut(1000);
		bg.fadeOut(1000);
		return false;
	});
	cls_popup.click(function(){
            bg.click();
    });
		
}); //end document ready