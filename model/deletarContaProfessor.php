<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    include "../conexao/conexao.inc";
    $id = $_POST['idProf'];
    $query = "DELETE FROM usuario WHERE codigo_u = '$id'";
    unset($_SESSION["idProf"]);
    mysqli_query($conexao, $query);
    header("Location: ../instituicao/lista-de-professores/");
?>