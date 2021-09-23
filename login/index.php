<?php
if (!isset($_GET["email"])) {
    $_GET["email"] = "null";
}

session_start();
if (isset($_SESSION['temp_email'])) {
    $enviado = $_SESSION['temp_email'];
}

if (session_id() != '') {
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>RETEC - Login</title>
</head>

<body>
    <?php
    if (isset($enviado)) {
    ?>
        <div class="marker" style="display:none;" id="enviadoMsg">Um e-mail foi enviado ao endereço "<?php echo $_SESSION['temp_email']; ?>"<br>Por favor, verifique.</div>
        <div class="marker" style="display:none;" id="solicitacaoMsg">O e-mail "<?php echo $enviado; ?>" está na lista de espera para ser verificado pela instituição cadastrada.</div>
        <div class="markerRed" style="display:none;" id="encontradoMsg">O e-mail "<?php echo $enviado; ?>" não foi encontrado na nossa base de dados.</div>
    <?php
    }
    ?>
    <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>

    <div class="formu">
        <h2>Login</h2>
        <form name="cadastraU" action="../model/login.php" method='POST'>
            <label><b>E-mail</b></label><br>
            <input type="email" name="email" id="email" maxlenght="50" placeholder="exemplo@email.com" class="inp_txt" autocomplete="off" required>

            <br><label><b>Senha</b></label><br>
            <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="inp_txt" required>
            <button type="button" id="eye">
                <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
            </button>

            <p id="lbl_aviso" style="color:#800;display:none;">A senha está incorreta!</p>
            <p id="lbl_inc" style="color:#800;display:none;">O e-mail não está vinculado a nenhuma conta!</p>
            <p id="lbl_ver" style="color:#800;display:none;">Aguarde sua conta ser verificada por sua instituição!</p>
            <p id="lbl_alert1" style="color:#800;display:none;">Aguarde sua conta ser verificada por uma de suas instituições!</p>

            <input type="submit" class="entrar" value="Entrar"></input>
            <div class="options">
                <button class="botao" id="btnEsqueci" onclick="window.open('recuperar-senha/', '_self')">Esqueci minha senha</button>
                <button class="botao" id="btnN" onclick="window.open('../cadastro/', '_self')">Não tenho cadastro</button>
            </div>
        </form>

    </div>

    <div class="TxTmobile">
        <label>Não tem uma conta?</label><br>
        <a href="../cadastro/index.php"><u>Cadastre-se</u></a>
    </div>

    <script>
        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 9) == "?denied=1") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("email").value = "<?php $_GET["email"]; ?>"
        } else if (currentLocation.search.slice(0, 9) == "?denied=2") {
            document.getElementById("lbl_inc").style.display = "block";
        } else if (currentLocation.search.slice(0, 9) == "?denied=3") {
            document.getElementById("lbl_ver").style.display = "block";
            document.getElementById("email").value = "<?php $_GET["email"]; ?>"
        } else if (currentLocation.search.slice(0, 7) == "?alert2") {
            document.getElementById("lbl_alert1").style.display = "block";
        } else if (currentLocation.search.slice(0, 7) == "?alert1") {
            document.getElementById("lbl_alert1").style.display = "block";
        } else if (currentLocation.search.slice(0, 8) == "?enviado") {
            document.getElementById("enviadoMsg").style.display = "block";
        } else if (currentLocation.search.slice(0, 13) == "?solicitacoes") {
            document.getElementById("solicitacaoMsg").style.display = "block";
        } else if (currentLocation.search.slice(0, 13) == "?notFound") {
            document.getElementById("encontradoMsg").style.display = "block";
        }
    </script>
</body>

</html>