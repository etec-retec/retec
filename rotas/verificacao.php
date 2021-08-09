<?php
    session_start();
    if($_SESSION["numLogin"] != $_GET["access"]){
        echo "
        <center>
        <br><br><br><br><br><br>
            <h1>Acesso negado!</h1>
            <br>
            <a href='../login/index.php'>Entrar</a>
        </center>
        ";
        exit;
    }
    
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // INICIANDO TRATAMENTO PARA VERIFICAR SE O USUÁRIO JÁ PARTICIPA DE ALGUMA INST
    include '../conexao/conexao.inc';
    $query = "SELECT * FROM solicitacoes WHERE rg = '$rg'";
    $result = mysqli_query($conexao, $query);
    $retorno = mysqli_affected_rows($conexao);
    
    if($retorno >= 1){
        $query_usuarios = "SELECT * FROM usuario WHERE rg = '$rg'";
        $result = mysqli_query($conexao, $query_usuarios);
        $retorno2 = mysqli_affected_rows($conexao);
        
        if($retorno2 >= 1){
            //Puxar dados
            echo "Deu bom, finalmente!";
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
                header("location: ../instituicao/index.php?access=$nl");
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
                $nl = $_SESSION['numLogin'];
                header("location: ../instituicao/index.php?access=$nl");
            }
        }







    // if($tipo == 0){
        // include '../conexao/conexao.inc';
        // $query = "DELETE FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula'";
        // $res = mysqli_query($conexao, $query);
// 
        // $query = "SELECT * FROM solicitacoes WHERE instituicao = '".$_SESSION['instituicao']."'";
        // $result = mysqli_query($conexao, $query);
        // $retorno = mysqli_affected_rows($conexao);
        // $dados = mysqli_query($conexao, $query);
// 
        // if($retorno == 0){
            // mysqli_close($conexao);
// 
            // unset($_SESSION['not']);
            // unset($_SESSION['notID']);
            // unset($_SESSION['notNome']);
            // unset($_SESSION['notEmail']);
            // unset($_SESSION['notEmailRec']);
            // unset($_SESSION['notMatricula']);
            // unset($_SESSION['notRg']);
            // $nl = $_SESSION['numLogin'];
            // header("location: ../instituicao/index.php?access=$nl");
        // }else{
            // while($not = mysqli_fetch_row($dados)){
                // $_SESSION['not'] = TRUE;
                // $_SESSION['notID'] = $not[0];
                // $_SESSION['notNome'] = $not[1];
                // $_SESSION['notEmail'] = $not[2];
                // $_SESSION['notEmailRec'] = $not[3];
                // $_SESSION['notMatricula'] = $not[4];
                // $_SESSION['notRg'] = $not[5];
            // }
            // mysqli_close($conexao);
            // $nl = $_SESSION['numLogin'];
            // header("location: ../instituicao/index.php?access=$nl");
        // }
    // }elseif($tipo == 1){
        // include '../conexao/conexao.inc';
        // $query = "SELECT * FROM solicitacoes WHERE rg = '$rg' AND matricula ='$matricula'";
        // $result = mysqli_query($conexao, $query);
        // $retorno = mysqli_affected_rows($conexao);
// 
        // while($not = mysqli_fetch_row($result)){
            // $nome = $not[1];
            // $instituicao = $not[7];
            // $email = $not[2];
            // $email_rec = $not[3];
            // $senha = $not[6];
            // $matricula = $not[4];
            // $rg = $not[5];
        // }
// 
        // $query = "INSERT INTO usuario VALUES (NULL, '$nome', '$instituicao','$email', '$email_rec', '$senha', '$matricula', '$rg', '1')";
        // $res = mysqli_query($conexao, $query);
// 
        // $query = "DELETE FROM solicitacoes WHERE rg = '$rg' AND matricula = '$matricula'";
        // $res = mysqli_query($conexao, $query);
// 
        // $query = "SELECT * FROM solicitacoes WHERE instituicao = '".$_SESSION['instituicao']."'";
        // $result = mysqli_query($conexao, $query);
        // $retorno = mysqli_affected_rows($conexao);
        // $dados = mysqli_query($conexao, $query);
// 
        // if($retorno == 0){
            // mysqli_close($conexao);
// 
            // unset($_SESSION['not']);
            // unset($_SESSION['notID']);
            // unset($_SESSION['notNome']);
            // unset($_SESSION['notEmail']);
            // unset($_SESSION['notEmailRec']);
            // unset($_SESSION['notMatricula']);
            // unset($_SESSION['notRg']);
            // $nl = $_SESSION['numLogin'];
            // header("location: ../instituicao/index.php?access=$nl");
        // }else{
            // while($not = mysqli_fetch_row($dados)){
                // $_SESSION['not'] = TRUE;
                // $_SESSION['notID'] = $not[0];
                // $_SESSION['notNome'] = $not[1];
                // $_SESSION['notEmail'] = $not[2];
                // $_SESSION['notEmailRec'] = $not[3];
                // $_SESSION['notMatricula'] = $not[4];
                // $_SESSION['notRg'] = $not[5];
            // }
            // mysqli_close($conexao);
            // $nl = $_SESSION['numLogin'];
            // header("location: ../instituicao/index.php?access=$nl");
            // 
            // echo mysqli_error($conexao);
            // mysqli_close($conexao);
        // }
// 
    }else{
        echo "Ocorreu um erro inesperado";
        echo $retorno2;
    }
    
?>
