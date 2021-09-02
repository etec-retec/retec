<?php
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    include "../conexao/conexao.inc";
    $query = "SELECT email FROM usuario WHERE email = '$email' OR email_rec = '$email'";
    mysqli_query($conexao, $query);
    $linhas = mysqli_affected_rows($conexao);
    session_start();
    $_SESSION['temp_email'] = $email;
    if($linhas > 0){
        header("location: ../login/?enviado");
    }else{
        $query = "SELECT email FROM solicitacoes WHERE email = '$email' OR email_rec = '$email'";
        mysqli_query($conexao, $query);
        $linhas = mysqli_affected_rows($conexao);
        if($linhas > 0){
            header("location: ../login/?solicitacoes");
        }else{
            header("location: ../login/?notFound");
        }
    }
?>