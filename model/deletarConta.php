<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    include "../conexao/conexao.inc";
    $rg = $_SESSION['rg'];
    $matricula = $_SESSION['matricula'];
    $query = "DELETE FROM usuario WHERE rg = '$rg' AND matricula = '$matricula'";
    mysqli_query($conexao, $query);
    header("Location: ../");
?>