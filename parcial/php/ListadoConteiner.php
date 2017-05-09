<?php
    require_once "entidades/conteiner.php";
    $path = "../datos/usuario.txt";
    $conteiners = array();
    $tabla ='';
    if(file_exists($path))
    {
        $archivo = fopen($path,"r");
        $tabla .= "<table class='table bg-info table-striped table-condensed'>";
        $tabla.="<thead  class='bg-primary'><tr><th class='col-md-3 '>Numero</th><th class='col-md-4'>Descripcion</th><th class='col-md-2'>Pais</th><th class='col-md-2' >Foto</th><th class='col-md-2'>Baja</th></tr></thead>";
        $listado = Conteiner::TraerTodosLosConteinersDB();
        foreach($listado as $conteiner)
           $tabla.="<tr><td>".$conteiner->numero."</td><td>".$conteiner->descripcion."</td><td>".$conteiner->pais."</td><td>"."<img src='./uploads/".$conteiner->foto."' class=''alt='' width='50'></td><td><button name='baja' onClick='baja()'class='btn btn-danger navbar-btn'>Baja</button></td></tr>";

        $tabla.="</table>";
        echo $tabla;
        fclose($archivo);
        
    }




?>