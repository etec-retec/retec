<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../loader/loading.css">
    <script type="text/javascript" src="../../loader/loading.js"></script>

    <link href="../../css/login.css" rel="stylesheet">
    <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>RETEC - Recuperar Senha</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
    <div class="formu">
        <h2>Recuperar a Senha</h2>
        <h4>Um e-mail será enviado ao endereço digitado</h4>
        <form name="cadastraU" action="../../model/recuperarSenha.php" method='POST'>
            <label for="email"><b>E-mail</b></label>
            <input type="email" name="email" id="email" maxlenght="50" placeholder="exemplo@email.com" class="inp_txt" autocomplete="off" required>

            <p id="lbl_aviso" style="color:#800;display:none;">A senha está incorreta!</p>
            <p id="lbl_inc" style="color:#800;display:none;">O e-mail não está vinculado a nenhuma conta!</p>
            <p id="lbl_ver" style="color:#800;display:none;">Aguarde sua conta ser verificada por sua instituição!</p>
            <p id="lbl_alert1" style="color:#800;display:none;">Aguarde sua conta ser verificada por uma de suas instituições!</p>

            <input type="submit" class="botao">Recuperar
            <a href="retec:maxmotorolamotog2@gmail.com?subject=Teste para saber se posso confiar minha senha à vc"></a>
        </input>
        </form>
        <br>
    </div>
</body>

</html>