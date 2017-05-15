<?php
    require_once('./archivos.php');
    function VerificarUsuario($json,$path){
        $return = array();
        $json = json_decode($json);
        $archivo = new Archivo($path);
        $return['auth']=false;
        if($json->email != "" && $json->password != "")
        {
            $return['msg']="Usuario o contraseña incorrecta!!!";
            $users = $archivo->GetArray();
            if( $users!= false)
            {
                foreach($users as $user)
                {
                    if($user->getCorreo() == $json->email && $user->getClave() == $json->password)
                    {
                            $return['auth']=true;
                            $return['msg']="";
                            $return['user']=$json->email;
                            break;
                    }
                }
            }
        }
        else
            $return['msg']="Faltan Datos!!!";
        return json_encode($return);

    }
?>