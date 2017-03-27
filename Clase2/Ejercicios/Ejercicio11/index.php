<?php
function numPow($number)
{
    for($i=0;$i<=4;$i++)
    {
        echo pow($number,$i);
        if( $i != 4)
            echo ",";
    }

}
for($i=1;$i<=4;$i++)
{
    echo "Potencias de ".$i.":";
    numPow($i);
    echo "<BR>";
}

?>