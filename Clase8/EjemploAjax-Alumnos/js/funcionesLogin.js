function validarLogin()
{
		var varUsuario=$("#correo").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	
$.ajax({
	url:"php/validarUsuario.php",
	type:"post",
	data:{'usuario':varUsuario,'clave':varClave,'recordarme':recordar}
}).done(function(retorno){
	if(retorno == "ingreso")
	{
		MostarBotones();
		MostarLogin();
		$("#BotonLogin").html("Ir a salir<br>-Sesión-");
		$("#BotonLogin").addClass("btn btn-danger");
		$("#usuario").val("usuario: "+retorno);
	}
	else
	{
		$("#informe").html("usuario o clave incorrecta");
		$("#formLogin").addClass("animated bounceInLeft");
	}
}).fail(function(retorno){
	$("#botonesABM").html(":(");
	$("#informe").html(retorno.responseText);	
});
}
function deslogear()
{	
	$.ajax({
	url:"php/deslogearUsuario.php"
	}).always(function(){
		$("#botonesABM").html("");
		MostarLogin();
	});	


}
function MostarBotones()
{	
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:{'queHacer':"MostarBotones"}
	}).done(function(retorno){
		$("#botonesABM").html(retorno);
	});
}
