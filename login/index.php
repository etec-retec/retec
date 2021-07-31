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
        <title>RETEC</title>
    </head>
        <body>
            <button class="voltar" onclick="window.open('../index.html', '_self')">❮ Voltar</button> 
            <div class="formu">

                <h2>Login</h2>
                <form name="cadastraU" action="../rotas/login.php" method='POST'>
                    <label>Email</label><br>
                    <input type="email" name="email" maxlenght="50" placeholder="exemplo@email.com" class = "txtF" autocomplete="off" required>
                    <br><br>

                    <label>Senha</label><br>
                    <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="txtF" required>
                    <br><br>
                    <button class ="botao">Entrar</button>
                </form>

                <br>
                <button class="botao" id = "btnEsqueci">Esqueci minha senha</button>
                <button class="botao" id = "btnN">Não tenho cadastro</button>
                <br><br>

            </div>

            <div class="TxTmobile">

                <label>Não tem uma conta?</label><br>
                <a href="../cadastro/index.php"><u>Cadastre-se</u></a>    
            </div>
        </body>
    </html>