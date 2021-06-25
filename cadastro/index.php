<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
        <link href="../css/cadastro.css" rel="stylesheet">
        <link href="../css/button.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <title>Cadastro de Usuários</title>
    </head>
        <body>
        <div class="formu">
            <h2>Cadastro de Usuários</h2>
            <form name="cadastraU" action="../class/classU.php" method='POST'>
                <label>Nome Completo</label><br>
                <input type="text" name="nomecompleto" maxlenght="50"  placeholder="" class="txtF" autocomplete="off" required>
                
                <br><br>
                <label>E-mail</label><br>
                <input type="email" name="email"  maxlenght="50" placeholder="" class = "txtF" autocomplete="off" required>
                <br><br>
                
                <label>Senha</label><br>
                <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="" class="txtF" required>
                <br><br>
        
                <label>Digite a senha novamente</label><br>
                <input type="password" name="rsenha" id="rsenha" minlenght="5" maxlenght="42" placeholder="" class="txtF" required>
                <p id="msg"></p><br><br><br>
        
                <label>Escolha o seu tipo de usuário:</label><br>
                <input type="radio" name="tipo" value="professor"/> Professor
                <input type="radio" name="tipo" value="aluno"/> Aluno
                <br><br>
                <div class="btns-login">
                <button>   
                       CADASTRAR
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </button>     
                </div>
        
            </form>
        </div>
        <script src="../js/senha.js"></script>
</body>
    </html>