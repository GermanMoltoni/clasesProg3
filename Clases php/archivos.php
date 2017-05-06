<?php

class Archivo{
    private $path;
    function _constructor($path)
    {
        $this->path = $path;
    }

    function ToFile($datos)
    {
        $file = fopen($this->path,"w");
        foreach($datos as $dato)
            fwrite($file,$dato);
        fclose($file);
    }
    function GetArray(){
        $file = fopen($this->path,"r");
        $array = array();
        while(!feof($file))
            array_push($array,fread($file));
        return $array;
    }
    function ToJSON($datos)
    {
        $this->ToFile(json_encode($datos));
    }
    function getJson(){
        $array = $this->GetArray();
        return json_decode($array);
    }
}


?>