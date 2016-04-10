/*
 * ON LOAD DA PAGINA
 */
$(document).ready(function()
{
	
	$('select[name=idSection]').change(getSubsection).change();
	firstLoad = 0;
});

var firstLoad = 1;
function getSubsection()
{
	var updateId = 0;
	var subSel = '';
	if(firstLoad) updateId = $('select[name=idSubsection]').val();
	$('select[name=idSubsection]').html('');
	$('select[name=idSubsection]').append('<option selected="selected" value="0"> carregando... </option>');
	
	var arUrl = window.location.href.split('id/');
	var url = arUrl[0].replace('edit', 'get-subsection') + 'id/'+ $(this).val() +'/ajax/true'
	
	
	$.getJSON(url, function(data) 
	{
		var subSel = !updateId ? 'selected="selected"' : '';
		$('select[name=idSubsection]').html('');
		$('select[name=idSubsection]').append('<option selected="selected" value="-1"> Selecione uma sub categoria </option>');
		$.each(data, function(key, val)
		{
			subSel = updateId == val.idSubsection ? 'selected="selected"' : '';
			$('select[name=idSubsection]').append('<option '+subSel+' value="'+val.idSubsection+'">'+val.name+'</option>');
		})
	});
}
