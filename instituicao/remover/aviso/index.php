<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../../../erro/401.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="../../../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../loader/loading.css">
    <script type="text/javascript" src="../../../loader/loading.js"></script>

    <link href="../../../css/vincular.css" rel="stylesheet">
    <title>Retec - Deletar Conta</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <div class="cabecalho" id="teste">
        <button class="voltar" onclick="window.open('../../lista-de-professores/', '_self')">❮ Voltar</button>

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
            <label class="lblNome"><b>Institucional</b></label>
        </div>
    </div>

    <div class="center">
        <h1>ATENÇÃO</h1>
        <h2 style="width:60%; margin:0 auto;">Caso você desvincule este usuário de sua instituição, a conta dele será automaticamente excluída pois ele não possui vínculo com nenhuma outra instituição.</h2>
        <h3>Tem certeza que deseja fazer isso?</h3>
        <form action="../../../model/deletarContaProfessor.php" method="POST">
            <input type="text" value="<?php echo $_SESSION["idProf"]; ?>" name="idProf" hidden />
            <input type="button" id="deletar" value="Cancelar" onclick="window.open('../../lista-de-professores/', '_self')" />
            <input type="submit" value="Deletar" />
        </form>
    </div>
</body>

</html>