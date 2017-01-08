$(document).ready(function($)
{
	$('.removeItem').off('click').on('click', function()
	{
		$.loader.show();

		var element = $( this );

		$.get( element.attr('href'), function()
		{
			element.parents('.rowItem').fadeOut('fast');
			$.loader.hide();
		});

		return false;
	});

	$('form').on('submit', function()
	{
		$.loader.show();
	});
});


$.loader = {

	show : function()
	{
		$('body').append( '<div class="cms-loader"><div class="spinner-loader">Loading…</div></div>' );
	},

	hide : function()
	{
		$('.cms-loader').remove();
	}
}






