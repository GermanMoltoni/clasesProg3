<?php

class Archivo{
    private $_path;
    function __construct($path)
    {
        $this->_path = $path;
    }

    function ToFile($datos,$mode="a")
    {
        $file = fopen($this->_path,$mode);
        fwrite($file,$datos);
        fclose($file);
    }
    function GetArray(){
        if(file_exists($this->_path))
        {
            $file = fopen($this->_path,"r");
            $array = array();
            while(!feof($file))
            {
                $line = explode("-",fgets($file),3);
                array_push($array,$line);//Crear Objetos
            }
            fclose($file);
            return $array;
        }
        return false;
    }

    function ToJSON($datos,$mode="w"){
        $file = fopen($this->_path,$mode);
        fwrite($file,json_encode($datos));
        fclose($file);
    }

    function GetJson(){
        if(file_exists($this->_path))
        {
            $file = fopen($this->_path,"r");
            while(!feof($file))
                $datos = fgets($file);
            fclose($file);
            return json_decode($datos);
        }
        return false;
    }
}
?>