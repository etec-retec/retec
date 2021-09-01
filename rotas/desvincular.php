<?php
    session_start();

    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    if(sizeof($_POST) == 0){
        header("Location: ../dashboard/perfil/desvincular-se/");
    }

    $instituicoes = explode(',', $_SESSION['instituicoes']);
    if(sizeof($instituicoes) == 1){
        $_SESSION['delete'] = $instituicoes;
        header("Location: ../dashboard/perfil/deletar/");
    }else{
        include "../conexao/conexao.inc";
        $deletar = $_POST['inst'];
        $nova = "";
        for($i = 0; $i <= (sizeof($instituicoes)-1); $i++){
            if($instituicoes[$i] != $deletar){
                if($i == 0){
                    $nova .= $instituicoes[$i];
                }else{
                    $nova .= ",".$instituicoes[$i];
                }
            }
        }

        $rg = $_SESSION['rg'];
        $matricula = $_SESSION['matricula'];
        $query = "UPDATE usuario SET instituicao = '$nova' WHERE rg = '$rg' AND matricula = '$matricula'";
        mysqli_query($conexao, $query);
        $_SESSION['instituicoes'] = $nova;
        $_SESSION['deletada'] = $deletar;
        mysqli_close($conexao);

        if($deletar == $_SESSION['instituicao']){
            $_SESSION["instituicao"] = $nova;
            header("Location: ../acesso/?sucesso");
        }else{
            header("Location: ../dashboard/perfil/desvincular-se/?sucesso");
        }
    }
?>