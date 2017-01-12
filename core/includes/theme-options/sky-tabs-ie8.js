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