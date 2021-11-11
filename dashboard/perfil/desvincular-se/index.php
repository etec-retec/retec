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
    <title>Retec - Desvincular</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <?php
    if (isset($_SESSION['deletada'])) {
        if ($_SESSION['deletada'] == "ETEC Professor Andre Bogasian") {
    ?>
            <div class="marker" style="display:none;" id="sucessoMsg">Sua conta foi desvinculada com sucesso da ETEC Professor André Bogasian!</div>
        <?php
        } else {
        ?>
            <div class="marker" style="display:none;" id="sucessoMsg">Sua conta foi desvinculada com sucesso da <?php echo $_SESSION['deletada']; ?></div>
    <?php
        }
    }
    ?>
    <div class="cabecalho" id="teste">
        <button class="voltar" id="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>

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

    <input type="text" value="<?php echo $_SESSION["instituicoes"]; ?>" id="insts" hidden />
    <div class="center">
        <h1>Desvincular-se de:</h1>
        <form action="../../../model/desvincular.php" method="POST">
            <select class="inp_txt" name="inst" id="slct" required>
                <option value="none" selected disabled>Escolha</option>

            </select>
            <br><br>
            <input type="submit" value="Prosseguir" />
        </form>
    </div>
    <script>
        insts = document.getElementById("insts").value;
        select = document.getElementById("slct");
        if (insts.indexOf(",") !== -1) {
            array = insts.split(",");
            for (i = 0; i != array.length; i++) {
                option = document.createElement('option');
                if (array[i] == "ETEC Professor Andre Bogasian") {
                    option.textContent = "ETEC Professor André Bogasian";
                    option.value = array[i];
                } else {
                    option.textContent = array[i];
                    option.value = array[i];
                }
                select.appendChild(option);
            }
        } else {
            option = document.createElement('option');
            if (insts == "ETEC Professor Andre Bogasian") {
                option.textContent = "ETEC Professor André Bogasian";
                option.value = array[i];
            } else {
                option.textContent = insts;
                option.value = insts;
            }
            select.appendChild(option);
        }

        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 8) == "?sucesso") {
            document.getElementById("sucessoMsg").style.display = "block";
            document.getElementById("voltar").style.marginTop = "80px";
        }
    </script>
</body>

</html>