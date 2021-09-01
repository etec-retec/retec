<?php
    session_start();
    var_dump($_SESSION);
    echo '<hr>';
    // var_dump($_POST);

    if(sizeof($_POST) == 0){
        header("Location: ../dashboard/perfil/vincular-se/");
    }
    
    include "../conexao/conexao.inc";
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $rg = $_SESSION['rg'];
    $matricula = $_SESSION['matricula'];
    $novaInst = $_POST['inst'];

    $verifica = "SELECT rg, matricula, instituicao FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula' AND instituicao = '$novaInst'";
    mysqli_query($conexao, $verifica);
    $linhas = mysqli_affected_rows($conexao);
    if($linhas != 0){
        // echo "<script>window.location.href='../dashboard/perfil/vincular-se/?negado';</script>";
        header("Location: ../dashboard/perfil/vincular-se/?negado");
    }

    $query = "INSERT INTO solicitacoes (nome, email, matricula, rg, instituicao) VALUES ('$nome', '$email', '$matricula', '$rg', '$novaInst')";
    $_SESSION['novaInst'] = $novaInst;
    if($linhas == 0){
        mysqli_query($conexao, $query);
        header("Location: ../dashboard/perfil/vincular-se/?sucesso");
    }
?>