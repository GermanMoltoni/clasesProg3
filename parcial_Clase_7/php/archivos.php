<?php
require_once "./entidades/usuario.php";
class Archivo{
    private $_path;
    function __construct($path)
    {
        $this->_path = $path;
    }

    function ToFile($datos,$mode="a")
    {
        $file = fopen($this->_path,$mode);
        foreach($datos as $dato)
        {
            if($dato != NULL)
                fwrite($file,$dato->ToString()."\n");

        }
        fclose($file);
    }


    function GetArray(){
        if(file_exists($this->_path))
        {
            $file = fopen($this->_path,"r");
            $array = array();
            while(!feof($file))
            {
                $datos = explode("\n",fgets($file));
                $datos = explode("-",$datos[0],4);
                if(count($datos) != 1)
                {
                    $user = new Usuario($datos[0],$datos[1],$datos[2],$datos[3]);
                    array_push($array,$user);
                }
            }
            fclose($file);
            return $array;
        }
        return false;
    }
}
?>