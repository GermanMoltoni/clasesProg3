<?php
    if(count($_POST) != 0)
    {
        if($_POST['pass1'] == $_POST['pass2'])
            header("Location: welcome.php");
        else
            header("Location: index.html");
    }


?>