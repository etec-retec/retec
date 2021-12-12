<meta charset="UTF-8">
<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    echo $_POST['nome'];
    echo $_POST['email'];
    echo $_POST['email_rec'];
    echo $_POST['rg'];
    echo $_POST['matricula'];

    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['email_rec']) && isset($_POST['rg']) && isset($_POST['matricula'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email_rec = filter_input(INPUT_POST, 'email_rec', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        echo "Teste";

        include "../conexao/conexao.inc";

        if($email != $_SESSION['email']){
            $query = "SELECT * FROM usuario WHERE email = '$email' OR email_rec = '$email'";
            mysqli_query($conexao, $query);
            $linhas1 = mysqli_affected_rows($conexao);
            
            if($linhas1 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?emailDenied");
            }

            $query = "SELECT * FROM solicitacoes WHERE email = '$email' OR email_rec = '$email'";
            mysqli_query($conexao, $query);
            $linhas1 = mysqli_affected_rows($conexao);
            
            if($linhas1 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?emailDenied");
            }
        }

        if($email_rec != $_SESSION['email_rec']){
            $query = "SELECT * FROM usuario WHERE email = '$email_rec' OR email_rec = '$email_rec'";
            mysqli_query($conexao, $query);
            $linhas2 = mysqli_affected_rows($conexao);

            if($linhas2 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?email_recDenied");
            }

            $query = "SELECT * FROM solicitacoes WHERE email = '$email_rec' OR email_rec = '$email_rec'";
            mysqli_query($conexao, $query);
            $linhas2 = mysqli_affected_rows($conexao);

            if($linhas2 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?email_recDenied");
            }
        }

        if($rg != $_SESSION['rg']){
            $query = "SELECT rg FROM usuario WHERE rg = '$rg'";
            mysqli_query($conexao, $query);
            $linhas3 = mysqli_affected_rows($conexao);

            if($linhas3 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?rgDenied");
            }

            $query = "SELECT rg FROM solicitacoes WHERE rg = '$rg'";
            mysqli_query($conexao, $query);
            $linhas3 = mysqli_affected_rows($conexao);

            if($linhas3 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?rgDenied");
            }
        }

        if($matricula != $_SESSION['matricula']){
            $query = "SELECT matricula FROM usuario WHERE matricula = '$matricula'";
            mysqli_query($conexao, $query);
            $linhas4 = mysqli_affected_rows($conexao);

            if($linhas4 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?matriculaDenied");
            }

            $query = "SELECT matricula FROM solicitacoes WHERE matricula = '$matricula'";
            mysqli_query($conexao, $query);
            $linhas4 = mysqli_affected_rows($conexao);

            if($linhas4 > 0){
                $impedimento = TRUE;
                mysqli_close($conexao);
                header("Location: ../dashboard/perfil/?matriculaDenied");
            }
        }

        $cod = $_SESSION['codigo_u'];
        $query = "UPDATE usuario SET nome = '$nome', email = '$email', email_rec = '$email_rec', rg = '$rg', matricula = '$matricula' WHERE codigo_u = '$cod'";
        mysqli_query($conexao, $query);

        $old_mat = $_SESSION['matricula'];
        $old_rg = $_SESSION['rg'];
        $query = "SELECT matricula, rg FROM solicitacoes WHERE matricula = '$old_mat' AND rg = '$old_rg'";
        mysqli_query($conexao, $query);
        $linhas5 = mysqli_affected_rows($conexao);

        if($linhas5 > 0 AND !isset($impedimento)){
            $query = "UPDATE solicitacoes SET nome = '$nome', email = '$email', email_rec = '$email_rec', matricula = '$matricula', rg = '$rg' WHERE matricula = '$old_mat' AND rg = '$old_rg'";
            mysqli_query($conexao, $query);
        }

        mysqli_close($conexao);
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['email_rec'] = $email_rec;
        $_SESSION['rg'] = $rg;
        $_SESSION['matricula'] = $matricula;
        header("Location: ../dashboard/perfil/?atualizado");
    }