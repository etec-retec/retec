<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregando...</title>
</head>
<body>
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

    include "../conexao/conexao.inc";
    $query = "SELECT materias FROM instituicao WHERE nome = '$inst1'";
    $result = mysqli_query($conexao, $query);
    $print = mysqli_fetch_assoc($result);
    $_SESSION["materias"] = $print["materias"];
    echo $_SESSION["materias"];

    mysqli_close($conexao);
    $num = $_SESSION["numLogin"];
    header("location: ../dashboard/index.php?access=$num");
?>
</body>
</html>