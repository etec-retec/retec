<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
        <!-- <link href="../css/cssCadastroU.css" rel="stylesheet"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <title>Cadastro de Usuários</title>
    </head>

        <body>
        <br><br><br><br><br><br><br><br>
        <div class="formu">
            <h2>Cadastro de Usuários</h2>
            <form name="cadastraU" action="../class/classU.php" method='POST'>
           
                <label>Nome Completo</label><br><br>
                <input type="text" name="nomecompleto" maxlenght="50"  placeholder="Insira o seu nome completo" class = "txtF" required>
                <br><br>

                <label>E-mail</label><br><br>
                <input type="email" name="email"  maxlenght="50"  placeholder="Insira o seu e-mail" class = "txtF" required>
                <br><br>
                
                <label>Senha</label><br><br>
                <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Insira sua senha" class="txtF" required>
                <br><br>
        
                <label>Digite a senha novamente</label><br><br>
                <input type="password" name="rsenha" id="rsenha" minlenght="5" maxlenght="42" placeholder="Insira sua senha novamente" class="txtF" required>
                <p id="msg"></p>
                <br><br><br>
        
                <label>Escolha o seu tipo de usuário:</label><br><br>
                <input type="radio" name="tipo" value="professor"/> Professor
                <input type="radio" name="tipo" value="aluno"/> Aluno
                <br>

                <input type="submit" class="botaoEnviar" id="btn"/>

            </form>
        </div>
        <script src="../js/senha.js"></script>

        


        
        </body>
        
    </html>