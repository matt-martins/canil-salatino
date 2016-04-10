/*
 * ON LOAD DA PAGINA
 */
$(document).ready(function()
{
	if( $('select[name=idContent]').length ) $('.fieldset-dados').hide();
	$('select[name=idContent]').change(changeTitle);
	firstLoad = 0;
});

function changeTitle()
{
	var obj = $(this);
	var option = obj.val() > 0 ? $( 'option[value=' + obj.val() + ']' ).text() : '';
	
	if( obj.val() >= 0 ) $('.fieldset-dados').show(); else $('.fieldset-dados').hide();
	$('.title').val( jQuery.trim(option) );
}
