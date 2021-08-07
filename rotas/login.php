<?php
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = md5($senha);

        include "../conexao/conexao.inc";
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($conexao, $query);
        $retorno_email = mysqli_affected_rows($conexao);
        $dados = mysqli_query($conexao, $query);

        $query = "SELECT * FROM solicitacoes WHERE email = '$email'";
        $result = mysqli_query($conexao, $query);
        $retorno_verificacao = mysqli_affected_rows($conexao);

        $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query($conexao, $query);
        $retorno = mysqli_affected_rows($conexao);
        $dados = mysqli_query($conexao, $query);

        if($retorno > 0){
            $num = rand(100000,900000);

            session_start();
            $_SESSION['numLogin'] = $num;
            while($elemento = mysqli_fetch_row($dados)){
                $_SESSION['codigo_u'] = $elemento[0];
                $_SESSION['nome'] = $elemento[1];
                $_SESSION['instituicao'] = $elemento[2];
                $_SESSION['email'] = $elemento[3];
                $_SESSION['email_rec'] = $elemento[4];
                $_SESSION['matricula'] = $elemento[6];
                $_SESSION['rg'] = $elemento[7];
                $_SESSION['tipo'] = $elemento[8];
            }
            
            if($_SESSION['tipo'] == 1){
                mysqli_close($conexao);
                header("location: ../dashboard/index.php?access=$num");
            }elseif($_SESSION['tipo'] == 0){
                $query = "SELECT * FROM solicitacoes WHERE instituicao = '".$_SESSION['instituicao']."'";
                $result = mysqli_query($conexao, $query);
                $retorno = mysqli_affected_rows($conexao);
                $dados = mysqli_query($conexao, $query);

                if($retorno == 0){
                    header("location: ../instituicao/index.php?access=$num");
                }else{
                    while($not = mysqli_fetch_row($dados)){
                        $_SESSION['not'] = TRUE;
                        $_SESSION['notID'] = $not[0];
                        $_SESSION['notNome'] = $not[1];
                        $_SESSION['notEmail'] = $not[2];
                        $_SESSION['notEmailRec'] = $not[3];
                        $_SESSION['notMatricula'] = $not[4];
                        $_SESSION['notRg'] = $not[5];
                    }
                    header("location: ../instituicao/index.php?access=$num");
                }
                
            }else{
                echo "Erro!";
            }
            
        }else if($retorno_email == True & $retorno != 1){
            header("location: ../login/index.php?denied=1&email=$email");
        }else if($retorno_verificacao == True & $retorno != 1){
            header("location: ../login/index.php?denied=3&email=$email");
        }else{
            header("location: ../login/index.php?denied=2");
        }
    }else{
        echo "Ocorreu um erro inesperado. Contate o desenvolvedor!";
    }

?>