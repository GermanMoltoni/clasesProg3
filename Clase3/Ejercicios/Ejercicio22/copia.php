<?php
if(array_key_exists('archivo',$_POST))
    copy($_POST['archivo'],"./misArchivos/".date("Y_m_d_h_i_s").".txt");
?>