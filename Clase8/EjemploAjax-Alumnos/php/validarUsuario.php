<?php 
session_start();
// sin esto no funciona session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

if($usuario=="octavio@admin.com.ar" && $clave=="1234")
{			
	$_SESSION['registrado'] = $usuario;
	if($recordar=="true")
	{
		//creo la cookie del usuario
		
	}else
	{
		//borro la cookie del usuario
		
	}
	// creo la variable de $_SESSION
	 
	$retorno="ingreso";

	
}else
{
	$retorno= "No-esta";
}

echo $retorno;
?>