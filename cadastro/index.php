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
        <title>RETEC - Cadastro</title>
    </head>

    <body>
        <button class="voltar" onclick="window.open('../index.php', '_self')">❮ Voltar</button>
        
        <div class="formu">
            <h2>Cadastre-se</h2>
            <form name="cadastraU" action="../rotas/usuario.php?create=1" method='POST'>
                <label id="lbl_aviso" style="display:none;margin:0 auto;"></label>
                <label for="nome"><b>Nome</b></label><br>
                <input type="text" name="nome" id="nome" maxlenght="20" placeholder="Nome" class="txtF" autocomplete="off" required>

                <label for="sobrenome"><b>Sobrenome</b></label><br>
                <input type="text" name="sobrenome" id="sobrenome" maxlenght="43" placeholder="Sobrenome" class="txtF" autocomplete="off" required>
                
                <label for="instituicao"><b>Instituição</b></label>
                <p style="margin-top:8px !important; margin-left:48px !important; font-size:12px;">Escolha as instituições nas quais você trabalha.</p>
                <br>
                <input type="checkbox" class="checkbox-round" name="instituicao[]" value="ETEC Doutor Celso Giglio"/><p class="inst">ETEC Doutor Celso Giglio</p><br>
                <input type="checkbox" class="checkbox-round" name="instituicao[]" value="ETEC Professor André Bogasian"/><p class="inst">ETEC Professor André Bogasian</p><br>
                <input type="checkbox" class="checkbox-round" name="instituicao[]" value="ETEC Professor Basílides de Godoy"/><p class="inst">ETEC Professor Basílides de Godoy</p>
                <br>

                <label for="email"><b>E-mail</b></label><br>
                <input type="email" name="email" maxlenght="64" placeholder="exemplo@email.com" class="txtF" autocomplete="off" required>

                <label for="email2"><b>E-mail de recuperação</b></label><br>
                <input type="email" name="email2" maxlenght="64" placeholder="exemplo2@email.com" class="txtF" autocomplete="off" required>
                
                <label for="senha"><b>Senha</b></label><br>
                <input type="password" name="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="txtF" required>

                <label for="rsenha"><b>Digite a senha novamente</b></label><br>
                <input type="password" name="rsenha" minlenght="5" maxlenght="42" placeholder="Senha novamente" class="txtF" required>
                
                <label for="rsenha"><b>Matrícula:</b></label><br>
                <input type="text" name="matricula" minlenght="5" maxlenght="42" placeholder="Digite a matrícula" class="txtF" required>
                
                <label for="rsenha"><b>RG:</b></label><br>
                <input type="text" name="rg" minlenght="5" maxlenght="42" placeholder="Digite o RG" class="txtF" required>
                <br><br>

                <button class="botao">Cadastrar</button>
            </form>
            <br>
            <button class ="botao">Já tenho uma conta</button>
            <br><br>
        </div>
        <script>
            var currentLocation = window.location;
            if(currentLocation.search.slice(0,6) == "?email"){
                document.getElementById("lbl_aviso").style.display = "block";
                document.getElementById("lbl_aviso").style.color = "#800";
                document.getElementById("lbl_aviso").style.textDecoration = "underline";
                document.getElementById("lbl_aviso").textContent = "O E-mail já está em uso";
            }else if(currentLocation.search.slice(0,6) == "?senha"){
                document.getElementById("lbl_aviso").style.display = "block";
                document.getElementById("lbl_aviso").style.color = "#800";
                document.getElementById("lbl_aviso").style.textDecoration = "underline";
                document.getElementById("lbl_aviso").textContent = "As senhas não são iguais";
            }
        </script>
    </body>
        
</html>
