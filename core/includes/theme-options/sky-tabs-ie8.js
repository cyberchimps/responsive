jQuery(function()
{
	jQuery('.sky-tabs > input:checked').each(function()
	{
		jQuery(this).next().addClass('active');
		jQuery(this).siblings('ul').find('.' + jQuery(this).attr('class')).show().siblings().hide();
		
	});	
	
	jQuery('.sky-tabs > label').on('click', function()
	{ 				
		jQuery(this).addClass('active').siblings().removeClass('active');
		jQuery(this).siblings('ul').find('.' + jQuery(this).prev().attr('class')).show().siblings().hide();		
		
		
	});
});
jQuery(document).ready(function ($) {
	jQuery('#form').submit( function (e) {	
		tinyMCE.triggerSave();
		var a = $(document.activeElement.id).selector;		
	    if (a == "responsive_theme_options[submit]") {
	        var b =  $(this).serialize();	       
	        jQuery.post( 'options.php', b ).error( 
	            function() {
	                
	            }).success( function() {
	            	
	            	var html = '<div class="formsuccess"><p><strong>Options Saved</strong></p></div>';
	            	$(html).hide().appendTo(".sky-tabs").fadeIn(400).delay(1200).fadeOut(600);	            	
           	            	
	            });
	            return false;   
	    } 
	    else 
	    {
	    var b =  $(this).serialize(); 
	    b=b+'&responsive_theme_options%5Breset%5D=Restore Defaults'; 	    
    	jQuery.post( 'options.php', b ).error( 
        function() {            
        }).success( function() {
        	var html = '<div class="formsuccess"><p><strong>Options Reset</strong></p></div>';
        	$(html).hide().appendTo(".sky-tabs").fadeIn(400).delay(1200).fadeOut(600);
        	setTimeout(function(){
        	    location.reload();
        	},900);
        	
        });
        return false; 
	    }
        });
});
