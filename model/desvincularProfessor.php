<?php
    session_start();

    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }

    if(sizeof($_POST) == 0){
        header("Location: ../dashboard/perfil/desvincular-se/");
    }

    $nome = $_SESSION['instituicao'];
    $id = $_POST['idProf'];

    include "../conexao/conexao.inc";
    $query_professor = "SELECT instituicao FROM usuario WHERE codigo_u = '$id'";
    $res = mysqli_query($conexao, $query_professor);
    $professor = mysqli_fetch_assoc($res);
    $instituicoes = $professor['instituicao'];

    $instituicoes = explode(',', $instituicoes);
    #Correção de acentuação
    for($i = 0; $i <= (sizeof($instituicoes)-1); $i++){
        if($instituicoes[$i] == "ETEC Professor André Bogasian"){
            $instituicoes[$i] = "ETEC Professor Andre Bogasian";
        }
    }

    if(sizeof($instituicoes) == 1){
        //Levará para outra tela
        echo "Só uma";
    }else{
        $nova = "";
        if($instituicoes[0] == $nome){
            $primeiro = TRUE;
            $nova .= $instituicoes[1];

            if(sizeof($instituicoes) >= 2){
                for($i = 2; $i <= (sizeof($instituicoes)-1); $i++){
                    $nova .= ",".$instituicoes[$i];
                }
            }
        }else{
            for($i = 0; $i <= (sizeof($instituicoes)-1); $i++){
                if($i == 0){
                    $nova .= $instituicoes[$i];
                }
                else{
                    if($instituicoes[$i] != $nome){
                        $nova .= ",".$instituicoes[$i];
                    }                
                }
            }
        }   
    }   
    echo $nova;
        // $_SESSION['instituicoes'] = $nova;
        // $_SESSION['deletada'] = $deletar;
        // mysqli_close($conexao);

    
?>