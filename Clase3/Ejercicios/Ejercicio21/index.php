<?php
    $path="palabras.txt";
    
    $cantidadLetras= array(0,0,0,0);
    if(file_exists($path))
    {
        $archivo=fopen($path,"r");
        while(!feof($archivo))
        {
            $linea = fgets($archivo);
            foreach(explode(" ",$linea) as $palabra)
            {
                switch(strlen($palabra))
                {
                    case 1:
                        $cantidadLetras[0]+=1;
                        break;
                    case 2:
                        $cantidadLetras[1]+=1;
                        break;
                    case 3:
                        $cantidadLetras[2]+=1;
                        break;
                    default:
                        $cantidadLetras[3]+=1;
                        break;
                }

            }
        }
        fclose($archivo);
        echo "Palabras con 1 Letra: ".$cantidadLetras[0]."<br>";
        echo "Palabras con 2 Letras: ".$cantidadLetras[1]."<br>";
        echo "Palabras con 3 Letras: ".$cantidadLetras[2]."<br>";
        echo "Palabras con 4 o mas Letras: ".$cantidadLetras[3]."<br>";
    }
        


?>