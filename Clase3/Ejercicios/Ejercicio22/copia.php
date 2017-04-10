<?php
if(count($_POST['archivo']) && file_exists($_POST['archivo']))
{
    copy($_POST['archivo'],"./misArchivos/".date("Y_m_d_h_i_s").".txt");
}

?>