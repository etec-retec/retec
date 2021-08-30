<?php
    session_start();

    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    if($_SESSION['tipo'] != 0){
        header("location: ../erro/401.php");
        exit;
    }

    $inst = $_SESSION['instituicao'];
    $cod = $_GET['tcc'];
    include "../conexao/conexao.inc";
    $query = "DELETE FROM repositorio WHERE instituicao = '$inst' AND codigo_r = '$cod'";
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    header("location: ../instituicao/remover/?deletado=TRUE");