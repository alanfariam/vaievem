

/*
//Quando termina de carrecar a página
$(document).ready(function(){
    alert("teste");
});

var nome = prompt("Qual o seu nomefsfsd f??");

document.write(nome);

function AlterarDiv()
{
	var area = document.getElementById('area');

	area.innerHTML=nome;
}
//Evitar conflito
var $j = jQuery.noConflict();

$(document).ready(function(){
	alert("teste");
	//selecionar pelo id;
	$("#b1");
	//selecioanr pela classe
	$('.teste');
	//selecioanr pela tag
	$('li');
	$('li.class');
});

*/


$(function(){
	//Mudando propriedade
	$('a').attr('href','http://www.google.com.br');
	//Mudando texto do html
	//$("#teste").html('Teste mudado');
	//alert($("#teste").html());
	//$("#teste").find('button').addClass('estilo');
	//$("imput").val('valor');
	//$("imput").affter('<div>teste</div>');
	$("ul").append('<li>teste</li>');
	var titulo = $("h1");
});