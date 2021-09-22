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
    if(sizeof($instituicoes) == 1){
        //Levará para outra tela
    }else{
        $nova = "";
        if($instituicoes[0] == $nome){
            $primeiro = TRUE;
            $nova .= $instituicoes[1];
            for($i = 2; $i <= (sizeof($instituicoes)-1); $i++){
                $nova .= ",".$instituicoes[$i];
                        }
                    }else{
                        
                    }
                // }
            }
        }



        for($i = 0; $i <= (sizeof($instituicoes)-1); $i++){
            // if($instituicoes[$i] != $nome){
                if($primeiro && $i != 1){
                        $nova .= ",".$instituicoes[$i];
                    }
                }else{
                    
                }
            // }
        }

        $query = "UPDATE usuario SET instituicao = '$nova' WHERE codigo_u = '$id'";
        mysqli_query($conexao, $query);
        echo $query;
    }
        // $_SESSION['instituicoes'] = $nova;
        // $_SESSION['deletada'] = $deletar;
        // mysqli_close($conexao);

    
?>