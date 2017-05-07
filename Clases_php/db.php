<?php
    function elementDB($query)
    {
        $server = "'localhost','root','','db'";
        $conect = mysqli_connect($server);
        $request = mysqli_query($query);
        if($request != true || $request != false)
            $request = mysqli_fetch_object($request);
        mysqli_close($connect);
        return $request;
    }
    function altaDB($element)
    {
        $tabla="";
        $query ="INSERT INTO $tabla VALUES";
        return elementDB($query);
    }
    function bajaDB($element)
    {
        $tabla="";
        $query ="DELETE FROM $tabla WHERE";
        return elementDB($query);
    }

    function modificarDB($element,$newElement)
    {
        $tabla="";
        $query ="UPDATE $tabla SET  WHERE";
        return elementDB($query);
    }

    function mostrarDB($element)
    {
        $tabla="";
        $query ="SELECT * FROM $tabla WHERE ";
        return elementDB($query);
    }

?>