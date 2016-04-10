/*
 * ON LOAD DA PAGINA
 */
$(document).ready(function()
{
	$('#footer span').fadeTo(0,.4);
	$('.menu ul ul').hide();
	$('.menu ul li.selected ul').show();
	$('a.bc1').click(showSubmenu);
	
	if( $('#state-object select').length ) selectCityState( $('#state-object select'), $('#city-object select') );
	startCarrossel();
	startCarrosselHome();
});

$(window).scroll(function()
{
	
});

function showSubmenu()
{
	$(this).parent('li').addClass('selected');
	$('.menu ul li.selected ul').show();
	
	return false;
}

var objCarrossel = {};
function startCarrossel()
{
	$('.imgDestaque').css({background: '#fff url('+$('#gallery ul li:eq(0) a').attr('href')+') no-repeat center'});
	if( $('#gallery ul li:eq(0) a').attr('title') )
	{
		$('.legenda').text($('#gallery ul li:eq(0) a').attr('title'));
		$('.legenda').fadeTo(0,.5);
	}
	
	$('.legenda').mouseout(hideSub);
	$('.legenda').mouseover(showSub);
	
	objCarrossel.tm   = '110';
	objCarrossel.tot  = $('#gallery ul li').length;
	objCarrossel.cont = 5;
	
	$('#gallery ul').css({width: (objCarrossel.tm * objCarrossel.tot) + 'px'});
	$('#gallery ul').before('<span class="back">anterior</span>');
	$('#gallery ul').after('<span class="next">próximo</span>');
	
	$('#gallery li a').click(changeImg);
	$('#gallery .next, #gallery .back').click(moveCarrossel);
}

function moveCarrossel()
{
	if( $(this).attr('class') == 'next' && objCarrossel.cont == objCarrossel.tot) return false;
	if( $(this).attr('class') == 'back' && objCarrossel.cont == 5) return false;
	
	orient = ( $(this).attr('class') == 'next' ) ? '-='+objCarrossel.tm : '+='+objCarrossel.tm;
	( $(this).attr('class') == 'next' ) ? objCarrossel.cont++ : objCarrossel.cont--;
	
	$('#gallery ul').animate( {marginLeft: orient+'px'}, 700 );
}

function hideSub()
{
	if( $(this).text() ) $(this).fadeTo('fast',.5)
}

function showSub()
{
	if( $(this).text() ) $(this).fadeTo('slow',1)
}

function changeImg()
{
	$('.legenda').text('');
	$('.legenda').hide();
	
	$('.imgDestaque').css({background: '#fff url('+$(this).attr('href')+') no-repeat center'});
	if( $(this).attr('title') )
	{
		$('.legenda').text($(this).attr('title'));
		$('.legenda').fadeTo(0,.5);
	}
	return false;
}

var crHomeInterval;
var crHomeLimit;
var crHomePosit = 0;
function startCarrosselHome()
{
	$('.carrossel .carrossel-itens:eq(0)').show();
	crHomeLimit = $('.carrossel .carrossel-itens').length;
	crHomeInterval = setInterval("changeCarrosselHome()",8000);
}

function changeCarrosselHome()
{
	crHomePosit++
	if( crHomePosit == crHomeLimit ) crHomePosit = 0;
	$('.carrossel .carrossel-itens').hide();
	$('.carrossel .carrossel-itens:eq('+crHomePosit+')').fadeIn('slow');
	
	$('.naveg-buttons li').removeClass('active');
	$('.naveg-buttons li:eq('+crHomePosit+')').addClass('active');
}












