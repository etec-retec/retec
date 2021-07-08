<?php
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = md5($senha);

        include "../conexao/conexao.inc";
        $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);
        echo $retorno = mysqli_affected_rows($conexao);
        echo mysqli_error($conexao);
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

            header("location: ../dashboard/index.php?access=$num");
        }else{
            // header("location: ../index.html");
        }
    }else{
        // header("location: ../index.html");
    }

?>