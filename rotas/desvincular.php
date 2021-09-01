<?php
    session_start();
    var_dump($_SESSION);
    echo '<hr>';
    var_dump($_POST);

    if(sizeof($_POST) == 0){
        header("Location: ../dashboard/perfil/desvincular-se/");
    }
?>