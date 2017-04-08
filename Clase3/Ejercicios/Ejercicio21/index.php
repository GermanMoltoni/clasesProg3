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
        echo "<table border='1'>
              <th>Letras</th>
              <th>Cantidad de Palabras</th>";
              
              
              
        echo "<tr><td>1 </td><td>".$cantidadLetras[0]."</td></tr>";
        echo "<tr><td>2 </td><td>".$cantidadLetras[1]."</td></tr>";
        echo "<tr><td>3 </td><td>".$cantidadLetras[2]."</td></tr>";
        echo "<tr><td>4 o mas </td><td>".$cantidadLetras[3]."</td></tr>";
        echo"</table>";
    }
        


?>