<?php
    if(!isset($_GET["email"])){
        $_GET["email"] = "null";
    }
    
    if(session_id() != ''){
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
        <link href="./css/login.css" rel="stylesheet">
        <title>RETEC - Login</title>
    </head>
        <body>
            <button class="voltar" onclick="window.open('../index.php', '_self')">❮ Voltar</button> 
            <div class="formu">

                <h2>Login</h2>
                <form name="cadastraU" action="../rotas/login.php" method='POST'>
                    <label><b>E-mail</b></label><br>
                    <input type="email" name="email" id="email" maxlenght="50" placeholder="exemplo@email.com" class="txtF" autocomplete="off" required>
                    <br><br>

                    <label><b>Senha</b></label><br>
                    <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="txtF" required>
                    <br>
                    <p id="lbl_aviso" style="color:#800;display:none;">A senha está incorreta!</p>
                    <p id="lbl_inc" style="color:#800;display:none;">O e-mail não está vinculado a nenhuma conta!</p>
                    <p id="lbl_ver" style="color:#800;display:none;">Aguarde sua conta ser verificada por sua instituição!</p>
                    <p id="lbl_alert1" style="color:#800;display:none;">Aguarde sua conta ser verificada por uma de suas instituições!</p>
                    
                    <br>
                    <button class="botao">Entrar</button>
                </form>

                <br>
                <button class="botao" id="btnEsqueci">Esqueci minha senha</button>
                <button class="botao" id="btnN">Não tenho cadastro</button>
                <br><br>

            </div>

            <div class="TxTmobile">

                <label>Não tem uma conta?</label><br>
                <a href="../cadastro/index.php"><u>Cadastre-se</u></a>    
            </div>
            <script>
                var currentLocation = window.location;
                if(currentLocation.search.slice(0,9) == "?denied=1"){
                    document.getElementById("lbl_aviso").style.display = "block";
                    document.getElementById("email").value = "<?php $_GET["email"];?>"
                }else if(currentLocation.search.slice(0,9) == "?denied=2"){
                    document.getElementById("lbl_inc").style.display = "block";
                }else if(currentLocation.search.slice(0,9) == "?denied=3"){
                    document.getElementById("lbl_ver").style.display = "block";
                    document.getElementById("email").value = "<?php $_GET["email"];?>"
                }else if(currentLocation.search.slice(0,7) == "?alert2"){
                    document.getElementById("lbl_alert1").style.display = "block";
                }
            </script>
        </body>
    </html>