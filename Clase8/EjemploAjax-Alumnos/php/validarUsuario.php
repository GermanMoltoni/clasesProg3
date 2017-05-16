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
		setcookie("user",$usuario,time() + (86400 * 30),"/");
		
	}else
	{
		setcookie("user",$_SESSION['registrado'],time() - 3600);
		
	}
	 
	$retorno="ingreso";

	
}else
{
	$retorno= "No-esta";
}

echo $retorno;
?>