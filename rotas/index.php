<?php
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        include "../conexao/conexao.inc";
        $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);
        $retorno = mysqli_affected_rows($conexao);
        $dados = mysqli_query($conexao, $query);
        mysqli_close($conexao);

        if($retorno > 0){
            $num = rand(100000,900000);
            
            session_start();
            $_SESSION['numLogin'] = $num;
            while($elemento = mysqli_fetch_row($dados)){
                $_SESSION['codigo_u'] = $elemento[0];
                $_SESSION['nome'] = $elemento[1];
                $_SESSION['email'] = $elemento[2];
                $_SESSION['tipo'] = $elemento[4];
            }

            header("location: ../dashboard/index.php?acess=$num");
        }
    }else{
        header("location: ../index.php");
    }

?>