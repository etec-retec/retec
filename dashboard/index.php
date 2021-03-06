<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../erro/401.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" href="../loader/loading.js">
    <script type="text/javascript" src="../loader/loading.js"></script>

    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>Retec - Dashboard</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>

    <div class="cabecalho" id="teste">
        <button class="voltar" id="certeza" onclick="volt()">❮ Sair</button>

        <div class="logo">
            <h1 class="logo" id="texto">RETEC</h1>
            <?php
            if ($_SESSION["instituicao"] == "ETEC Professor Andre Bogasian") {
            ?>
                <label>ETEC Professor André Bogasian</label>
            <?php
            } else {
            ?>
                <label><?php echo $_SESSION["instituicao"]; ?></label>
            <?php
            }
            ?>
        </div>
    </div>
    
    <div class="corpo">
        <h1 class="cap">Olá, <?php echo $_SESSION["nome"]; ?>!</h1>
        <span>
        <h2 class="access">O que você deseja acessar?</h2>
        </span>

        <span>
        <div class="opcoes">
            <a id="p" href="../projetos/">Projetos</a>
            <a id="p" href="editar/">Meus Projetos</a>
            <!-- <a id="a" href="adicionar/">Adicionar Projeto</a>
            <a id="e" href="editar/">Editar Projeto</a> -->
            <a id="m" href="perfil/">Meu Perfil</a>
        </div>
        </span>
    </div>

    <div class="content-grama">
        <img src="../assets/ilustrations/grama-dash.svg" alt="" class="grama">
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/voltar.js"></script>
</body>

</html>