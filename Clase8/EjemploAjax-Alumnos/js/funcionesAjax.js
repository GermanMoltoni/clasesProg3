
function MostrarError()
{
	$.ajax({
		url:"nexoNoExiste.php",
		type:"post"
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){
		//console.info(retorno);
		$("#principal").html("Error");
	};
	function funcionDos(retorno){
		//console.info(retorno); // Veo informacion del objeto
		$("#informe").html(retorno.responseText);
		$("#principal").html("Error");
	};
	
}
function MostrarSinParametros()
{
	$.ajax({
		url:"nexoTexto.php",
		type:"post"
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto");
	};
	function funcionDos(retorno){
		$("#informe").html(retorno);
		$("#principal").html("Error");
	};
}

function Mostrar(queMostrar)
{
		$.ajax({
		url:"nexo.php",
		type:"post",
		data:{'queHacer':queMostrar}
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){
		$("#principal").html(retorno);
	};
	function funcionDos(retorno){
		$("#informe").html(retorno);
		$("#principal").html("Error");
	};
}

function MostarLogin()
{
		//alert(queMostrar);
/*	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);



	});*/
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:{'queHacer':"MostarLogin"}
	}).then(funcionUno,funcionDos);
	function funcionUno(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	};
	function funcionDos(retorno){
		$("#informe").html(retorno);
		$("#principal").html("Error");
	};


}