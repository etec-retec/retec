<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="css/button.css" rel="stylesheet">
        <title>RDETEC</title>
    </head>

        <body>
        <div class="formu">
            <h2>LOGIN</h2>
            <form name="cadastraU" action="rotas/index.php" method='POST'>
                <label>E-mail</label><br>
                <input type="email" name="email" maxlenght="50" placeholder="" class = "txtF" autocomplete="off" required>
                <br><br>
                
                <label>Senha</label><br>
                <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="" class="txtF" required>
                <br><br>

                <center>
                <button>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    CADASTRAR
                </button>
                </center>

            </form>
        </div>
        <script src="../js/senha.js"></script>

        


        
        </body>
        
    </html>