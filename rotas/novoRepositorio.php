<?php
    session_start();
    if($_SESSION["numLogin"] != $_GET["access"]){
        echo "
        <center>
        <br><br><br><br><br><br>
            <h1>Acesso negado!</h1>
            <br>
            <a href='../login/index.php'>Entrar</a>
        </center>
        ";
        exit;
    }else{
        header("location: ../dashboard/cadastrarRepositorio/index.php?access=".$_SESSION['numLogin']);
    }
?>