<?php
    require_once "UsuarioCarga.php";
    require_once "ConteinerAlta.php";
    require_once "VerificarUsuario.php";
    require_once "BorrarUsuario.php";
    $path="../datos/usuario.txt";
    if(array_key_exists("login",$_POST))
        echo VerificarUsuario($_POST['login'],$path);
    if(array_key_exists("signUp",$_POST))
        echo CargaUsuario($_POST,$path);
    if(array_key_exists("baja",$_POST))
        BorrarUsuario($_POST['baja'],$path);
    if(array_key_exists("altaConteiner",$_POST))
       altaConteiner($_POST,$_FILES);


?>