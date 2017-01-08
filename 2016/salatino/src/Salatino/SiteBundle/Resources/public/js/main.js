(function()
{ 
	$(document).ready(function($)
	{
		resizeNewsSlide();

		$('.no-link').on('click', function(){ return false; })
	});


	$(window).resize(function($)
	{
		resizeNewsSlide();
	});

	resizeNewsSlide = function()
	{
		if( $('.news-slide-wrapper').length > 0 )
		{
			$('.submit-footer').height( $('.news-slide-wrapper').height() - 324 )
		}
	}
})(); 