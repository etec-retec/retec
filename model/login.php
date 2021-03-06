<?php
    if(isset($_POST['email']) && isset($_POST['senha'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $senha = md5($senha);

        include "../conexao/conexao.inc";
        $query = "SELECT * FROM usuario WHERE email = '$email' OR email_rec = '$email'"; #PESQUISA SE O EMAIL EXISTE
        $result = mysqli_query($conexao, $query);
        $retorno_email = mysqli_affected_rows($conexao);
        $dados = mysqli_query($conexao, $query);

        $query = "SELECT * FROM solicitacoes WHERE email = '$email' OR email_rec = '$email'"; #PESQUISA SE O EMAIL ESTÁ NA LISTA DE SOLICITACOES
        $result = mysqli_query($conexao, $query);
        $retorno_verificacao = mysqli_affected_rows($conexao);

        $query = "SELECT * FROM usuario WHERE email = '$email' OR email_rec = '$email' AND senha = '$senha'"; #PESQUISA EMAIL E SENHA EM USUÁRIOS
        $dados = mysqli_query($conexao, $query);
        $retorno = mysqli_affected_rows($conexao);

        while($dado = mysqli_fetch_row($dados)){
            $senha_bd = $dado[5];
        }

        if(isset($senha_bd)){
            if($senha_bd != $senha){
                header("location: ../login/?denied=4");
                exit();
            }
        }
        
        if($retorno == 0){  #SE O EMAIL E A SENHA NN BATEREM
            $query_especial = "SELECT * FROM instituicao WHERE email = '$email' OR email_rec = '$email' AND senha = '$senha'"; #PESQUISA SE É UMA INSTITUIÇÃO
            $dados_especiais = mysqli_query($conexao, $query_especial);
            $retorno_especial = mysqli_affected_rows($conexao);
            $retorno = 0;
            if(session_id() != ''){
                session_unset();
            }
        }

        if($retorno > 0){ #SE FOR UM USUÁRIO
            $num = rand(100000,900000);

            session_start();
            $_SESSION['numLogin'] = $num;
            
            $query = "SELECT * FROM usuario WHERE email = '$email' OR email_rec = '$email' AND senha = '$senha'"; #PESQUISA EMAIL E SENHA EM USUÁRIOS
            $dados = mysqli_query($conexao, $query);

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
            
            if($_SESSION['tipo'] == 1){ #LEVA PARA A TELA ACESSO
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
            }
            
        }else if($retorno_especial == 1){ #INICIA O TRATAMENTO PARA INSTITUICAO
            $query_instituicao =  "SELECT * FROM instituicao WHERE email = '$email' OR email_rec = '$email' AND senha = '$senha'";
            $res_inst = mysqli_query($conexao, $query_instituicao);
            $retorno = mysqli_affected_rows($conexao);

            while($elemento = mysqli_fetch_row($res_inst)){
                $senha_bd = $elemento[5];
            }

            if($senha_bd != $senha){
                header("location: ../login/?denied=4");
                exit();
            }

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
                mysqli_close($conexao);
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
                mysqli_close($conexao);
                header("location: ../instituicao/");
            }
        
        }else if($retorno_email == True & $retorno != 1){
            mysqli_close($conexao);
            header("location: ../login/?denied=1&email=$email");
        }else if($retorno_verificacao == True & $retorno != 1){
            mysqli_close($conexao);
            header("location: ../login/?denied=3&email=$email");
        }else{
            mysqli_close($conexao);
            header("location: ../login/?denied=2");
        }
    }else{
        mysqli_close($conexao);
        echo "Ocorreu um erro inesperado. Contate o desenvolvedor!";
    }

?>