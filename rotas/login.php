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
        $dados = mysqli_query($conexao, $query);
        $retorno = mysqli_affected_rows($conexao);
        
        if($retorno == 0){
            $query_especial = "SELECT * FROM instituicao WHERE email = '$email' AND senha = '$senha'";
            $dados_especiais = mysqli_query($conexao, $query_especial);
            $retorno_especial = mysqli_affected_rows($conexao);
            $retorno = 0;
            if(session_id() != ''){
                session_unset();
            }
        }

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
                $array = $_SESSION['instituicao'];
                try{
                    $insti = explode(',', $array);
                    $_SESSION["array"] = TRUE;
                }catch(Exception $e){
                    $insti = $_SESSION['instituicao'];
                    $_SESSION["unico"] = TRUE;
                }finally{
                    mysqli_close($conexao);
                    header("location: ../acesso/");
                }

            }elseif($_SESSION['tipo'] == 0){
                $query = "SELECT * FROM solicitacoes WHERE instituicao = '".$_SESSION['instituicao']."'";
                $result = mysqli_query($conexao, $query);
                $retorno = mysqli_affected_rows($conexao);
                $dados = mysqli_query($conexao, $query);

                if($retorno == 0){
                    header("location: ../instituicao/");
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
                    header("location: ../instituicao/");
                }
                
            }else{
                echo "Erro!";
            }
            
        }else if($retorno_especial == 1){
            $num = rand(100000,900000);

            session_start();
            $_SESSION['numLogin'] = $num;
            while($esp = mysqli_fetch_row($dados_especiais)){
                $_SESSION['id_etec'] = $esp[0];
                $_SESSION['instituicao'] = $esp[1];
                $_SESSION['materias'] = $esp[2];
                $_SESSION['email'] = $esp[3];
                $_SESSION['email_rec'] = $esp[4];
                $_SESSION['tipo'] = $esp[6];
            }

            $query = "SELECT * FROM solicitacoes WHERE instituicao = '".$_SESSION['instituicao']."'";
            $result = mysqli_query($conexao, $query);
            $retorno = mysqli_affected_rows($conexao);
            $dados = mysqli_query($conexao, $query);

            if($retorno == 0){
                header("location: ../instituicao/");
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
                header("location: ../instituicao/");
            }
        
        }else if($retorno_email == True & $retorno != 1){
            header("location: ../login/?denied=1&email=$email");
        }else if($retorno_verificacao == True & $retorno != 1){
            header("location: ../login/?denied=3&email=$email");
        }else{
            header("location: ../login/?denied=2");
        }
    }else{
        echo "Ocorreu um erro inesperado. Contate o desenvolvedor!";
    }

?>