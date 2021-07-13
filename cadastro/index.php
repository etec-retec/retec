<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="css/cadastro.css" rel="stylesheet">
        <title>RETEC</title>
    </head>

    <body>
        <button class = "botaoVoltar">❮ Voltar</button> 
        <div class="formu">
            <h2>Cadastre-se</h2>
            <form name="cadastraU" action="../rotas/login.php" method='POST'>
                <label>NOME</label><br>
                <input type="text" name="nome" maxlenght="20" placeholder="Nome" class="txtF" autocomplete="off" required>

                <label>SOBRENOME</label><br>
                <input type="text" name="sobrenome" maxlenght="43" placeholder="Sobrenome" class="txtF" autocomplete="off" required>
                
                <label>INSTITUIÇÃO</label><br>
                <input type="text" name="instituicao" maxlenght="64" placeholder="Ex: ETEC Dr. Celso Giglio" class="txtF" autocomplete="off" required>

                <label>EMAIL</label><br>
                <input type="email" name="email" maxlenght="64" placeholder="exemplo@email.com" class="txtF" autocomplete="off" required>

                <label>EMAIL DE RECUPERAÇÃO</label><br>
                <input type="email" name="email2" maxlenght="64" placeholder="exemplo2@email.com" class="txtF" autocomplete="off" required>
                
                <label>SENHA</label><br>
                <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="txtF" required>

                <label>DIGITE A SENHA NOVAMENTE</label><br>
                <input type="password" name="senha2" id="senha" minlenght="5" maxlenght="42" placeholder="Senha novamente" class="txtF" required>
                <br><br>

                <button class="botao">Cadastrar</button>
            </form>
            <br>
            <button class ="botao">Já tenho uma conta</button>
            <br><br>
        </div>
    </body>
        
</html>
