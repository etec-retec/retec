<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../../../erro/401.php");
    exit;
}

$instituicoes = explode(",", $_SESSION["instituicoes"]);
$query = "SELECT nome FROM instituicao WHERE 1";
foreach ($instituicoes as $instUsada) {
    $query .= " AND nome != '$instUsada'";
}
include "../../../conexao/conexao.inc";
$result = mysqli_query($conexao, $query);
$linhas = mysqli_affected_rows($conexao);

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

    <link rel="stylesheet" href="../loader/loading.css">
    <script type="text/javascript" src="../loader/loading.js"></script>

    <link href="../../../css/vincular.css" rel="stylesheet">
    <title>Retec - Vincular</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <?php
    if (isset($_SESSION['novaInst'])) {
        if ($_SESSION['novaInst'] == "ETEC Professor Andre Bogasian") {
    ?>
            <div class="marker" style="display:none;" id="sucessoMsg">Seu pedido foi enviado à ETEC Professor André Bogasian!<br>Por favor, aguarde ser verificado.</div>
            <div class="markerRed" style="display:none;" id="negadoMsg">Seu pedido à ETEC Professor André Bogasian já está na lista de solicitações.</div>
        <?php
        } else {
        ?>
            <div class="marker" style="display:none;" id="sucessoMsg">Seu pedido foi enviado à <?php echo $_SESSION['novaInst']; ?>!<br>Por favor, aguarde ser verificado.</div>
            <div class="markerRed" style="display:none;" id="negadoMsg">Seu pedido à <?php echo $_SESSION['novaInst']; ?> está na lista de solicitações.</div>
    <?php
        }
    }
    ?>
    <div class="cabecalho">
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
    </div>

    <input type="text" value="<?php echo $_SESSION["instituicoes"]; ?>" id="insts" hidden />
    <div class="center">
        <h1>Instituições já vinculadas</h1>
        <ul class="vinculadas" id="vinc">

        </ul>
        <h1>Vincular-se à</h1>
        <?php
        if ($linhas > 0) {
        ?>
            <form action="../../../model/vincular.php" method="POST">
                <select class="inp_txt" name="inst" id="slct" required>
                    <option value="none" selected disabled>Escolha</option>
                    <?php
                    foreach ($result as $instNova) {
                        $i = $instNova['nome'];
                        if ($i == "ETEC Professor Andre Bogasian")
                            echo "<option value='$i'>ETEC Professor André Bogasian</option>";
                        else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>
                <input type="submit" value="Prosseguir" />
            </form>
        <?php
        } else {
        ?>
            <h2>Não há instituições para vincular-se.</h2>
        <?php
        }
        ?>
    </div>
    <script>
        insts = document.getElementById("insts").value;
        ul = document.getElementById("vinc");
        if (insts.indexOf(",") !== -1) {
            array = insts.split(",");
            for (i = 0; i != array.length; i++) {
                li = document.createElement('li');
                if (array[i] == "ETEC Professor Andre Bogasian") {
                    li.textContent = "ETEC Professor André Bogasian";
                } else {
                    li.textContent = array[i];
                }
                ul.appendChild(li);
            }
        } else {
            li = document.createElement('li');
            if (insts == "ETEC Professor Andre Bogasian") {
                li.textContent = "ETEC Professor André Bogasian";
            } else {
                li.textContent = insts;
            }
            ul.appendChild(li);
        }

        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 7) == "?negado") {
            document.getElementById("negadoMsg").style.display = "block";
            elementoA = document.getElementById("voltar");
            elementoA.style.marginTop = "80px";
        }

        if (currentLocation.search.slice(0, 8) == "?sucesso") {
            document.getElementById("sucessoMsg").style.display = "block";
            elementoA = document.getElementById("voltar");
            elementoA.style.marginTop = "80px";
        }
    </script>
</body>

</html>