<?php
    require_once "./entidades/usuario.php";
    require_once "./archivos.php";
    function CargaUsuario($POST,$path)
    {
        $archivo = new Archivo($path);
        $flag=true;
        $return = array();
        $return['add']=false;
        if(count($POST['name'])>0  &&  $POST['age'] > 0 && count($POST['password']) > 0 && count($POST['email']) > 0)
        {
            $newUser = new Usuario($POST['name'],$POST['email'],$POST['age'],$POST['password']);
            $users = $archivo->GetArray(); 
            if($users != false)
            {
                foreach($users as $user)
                {
                    if($user->Equals($newUser))
                    {
                        $flag=false;
                        break;
                    }
                }
            }
            if($flag)
            {
                $archivo->ToFile([$newUser,]);
                $return['add']=true;
            }
        }
        return json_encode($return);
    }
?>