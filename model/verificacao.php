<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }
    
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inst = $_SESSION['instituicao'];

    if($tipo == 0){
        include '../conexao/conexao.inc';
        $query = "DELETE FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula' AND instituicao = '$inst'";
        mysqli_query($conexao, $query);
        unset($_SESSION['not']);
        unset($_SESSION['notID']);
        unset($_SESSION['notNome']);
        unset($_SESSION['notEmail']);
        unset($_SESSION['notEmailRec']);
        unset($_SESSION['notMatricula']);
        unset($_SESSION['notRg']);
        $nl = $_SESSION['numLogin'];
        mysqli_close($conexao);
        header("location: ../instituicao/neg");
    }

    // INICIANDO TRATAMENTO PARA VERIFICAR SE O USUÁRIO JÁ PARTICIPA DE ALGUMA INST
    include '../conexao/conexao.inc';
    $query = "SELECT * FROM solicitacoes WHERE rg = '$rg' AND instituicao = '$inst'";
    $result = mysqli_query($conexao, $query);
    $retorno = mysqli_affected_rows($conexao);
    
    if($retorno >= 1){
        $query_usuarios = "SELECT * FROM usuario WHERE rg = '$rg'";
        $result = mysqli_query($conexao, $query_usuarios);
        $retorno2 = mysqli_affected_rows($conexao);
        
        if($retorno2 >= 1){
            while($user = mysqli_fetch_row($result)){
                $codigo = $user[0];
                $nome = $user[1];
                $string = $user[2];
                $email = $user[3];
                $email_rec = $user[4];
                $senha = $user[5];
                $matricula = $user[6];
                $rg = $user[7];
                $tipo = $user[8];
            }
            
            $novo = $string.','.$_SESSION['instituicao'];
            
            $query = "UPDATE usuario SET instituicao = '$novo' WHERE codigo_u = '$codigo'";
            $result = mysqli_query($conexao, $query);
            $inst = $_SESSION['instituicao'];
            $query = "DELETE FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula' AND instituicao = '$inst'";
            $result = mysqli_query($conexao, $query);

            $query = "SELECT * FROM solicitacoes WHERE instituicao = '$inst'";
            $result = mysqli_query($conexao, $query);
            $retorno = mysqli_affected_rows($conexao);

            if($retorno == 0){   
                unset($_SESSION['not']);
                unset($_SESSION['notID']);
                unset($_SESSION['notNome']);
                unset($_SESSION['notEmail']);
                unset($_SESSION['notEmailRec']);
                unset($_SESSION['notMatricula']);
                unset($_SESSION['notRg']);
                $nl = $_SESSION['numLogin'];
                mysqli_close($conexao);
                header("location: ../instituicao/");
            }else{
                while($not = mysqli_fetch_row($result)){
                    $_SESSION['not'] = TRUE;
                    $_SESSION['notID'] = $not[0];
                    $_SESSION['notNome'] = $not[1];
                    $_SESSION['notEmail'] = $not[2];
                    $_SESSION['notEmailRec'] = $not[3];
                    $_SESSION['notMatricula'] = $not[4];
                    $_SESSION['notRg'] = $not[5];
                }
                mysqli_close($conexao);

                $nl = $_SESSION['numLogin'];
                header("location: ../instituicao/");
            }

            $nl = $_SESSION['numLogin'];
            mysqli_close($conexao);
            header("location: ../instituicao/");

        }else{
            $inst = $_SESSION["instituicao"];
            $query = "SELECT * FROM solicitacoes WHERE rg = '$rg' AND matricula ='$matricula' AND instituicao = '$inst'";
            $result = mysqli_query($conexao, $query);
            $retorno = mysqli_affected_rows($conexao);
 
            while($not = mysqli_fetch_row($result)){
                $nome = $not[1];
                $instituicao = $not[7];
                $email = $not[2];
                $email_rec = $not[3];
                $senha = $not[6];
                $matricula = $not[4];
                $rg = $not[5];
            }

            $query = "INSERT INTO usuario VALUES (NULL, '$nome', '$instituicao','$email', '$email_rec', '$senha', '$matricula', '$rg', '1')";
            $res = mysqli_query($conexao, $query);
 
            $query = "DELETE FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula' AND instituicao = '$inst'";
            $res = mysqli_query($conexao, $query);

            $query = "SELECT * FROM solicitacoes WHERE instituicao = '$inst'";
            $result = mysqli_query($conexao, $query);
            $retorno = mysqli_affected_rows($conexao);

            if($retorno == 0){
                mysqli_close($conexao);
    
                unset($_SESSION['not']);
                unset($_SESSION['notID']);
                unset($_SESSION['notNome']);
                unset($_SESSION['notEmail']);
                unset($_SESSION['notEmailRec']);
                unset($_SESSION['notMatricula']);
                unset($_SESSION['notRg']);
                $nl = $_SESSION['numLogin'];
                header("location: ../instituicao/");
            }else{
                while($not = mysqli_fetch_row($result)){
                    $_SESSION['not'] = TRUE;
                    $_SESSION['notID'] = $not[0];
                    $_SESSION['notNome'] = $not[1];
                    $_SESSION['notEmail'] = $not[2];
                    $_SESSION['notEmailRec'] = $not[3];
                    $_SESSION['notMatricula'] = $not[4];
                    $_SESSION['notRg'] = $not[5];
                }
                mysqli_close($conexao);
                $nl = $_SESSION['numLogin'];
                header("location: ../instituicao/");
            }
        }
    }else{
        mysqli_close($conexao);
        header("location: ../instituicao/");
    }
    
?>
