<?php
require_once "./entidades/usuario.php";
require_once "./archivos.php";
function BorrarUsuario($email,$path)
    {
        $archivo = new Archivo($path);
        $usuario='';
        $usuarios = $archivo->GetArray($path);
        foreach($usuarios as $usuario)
        {
            if($usuario->Equals($email))
            {
                break;
            }
        }

       unset($usuarios[array_search($usuario,$usuarios)]);        
       $archivo->ToFile($usuarios,"w"); 
    }


?>