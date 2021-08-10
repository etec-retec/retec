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

    $inst1 = filter_input(INPUT_POST, 'inst', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inst_geral = filter_input(INPUT_POST, 'instituicoes', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    unset($_SESSION["instituicoes"]);
    $_SESSION["instituicao"] = $inst1;
    $_SESSION["instituicoes"] = $inst_geral;

    $num = $_SESSION["numLogin"];
    echo $inst_geral;
    header("location: ../dashboard/index.php?access=$num");
?>