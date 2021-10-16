<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../loader/loading.css">
    <script type="text/javascript" src="../loader/loading.js"></script>

    <link href="../css/cadastro.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>RETEC - Cadastro</title>
</head>

<body>
    <div class="preload">
        <span class="load"></span>
    </div>
    <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>

    <div class="formu">
        <h2>Cadastre-se</h2>
        <form name="cadastraU" action="../model/usuario.php?create=1" method='POST'>
            <label id="lbl_aviso" style="display:none;margin:0 auto;"></label>

            <div class="name">
                <label for="nome"><b>Nome</b></label>
                <input type="text" name="nome" id="nome" maxlenght="20" placeholder="Nome" class="inp_txt" autocomplete="off" required>
                <label for="sobrenome"><b>Sobrenome</b></label>
                <input type="text" name="sobrenome" id="sobrenome" maxlenght="43" placeholder="Sobrenome" class="inp_txt" autocomplete="off" required>
            </div>

            <div class="instituicao">
                <label for="instituicao"><b>Escolha as instituições nas quais você trabalha</b></label>

                <label class="container">ETEC Doutor Celso Giglio
                    <input type="checkbox" name="instituicao[]" value="ETEC Doutor Celso Giglio" />
                    <span class="checkmark"></span>
                </label>
                <label class="container">ETEC Professor André Bogasian
                    <input type="checkbox" name="instituicao[]" value="ETEC Professor André Bogasian" />
                    <span class="checkmark"></span>
                </label>
                <label class="container">ETEC Professor Basílides de Godoy
                    <input type="checkbox" name="instituicao[]" value="ETEC Professor Basílides de Godoy" />
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="email-e-senha">
                <label for="email"><b>E-mail</b></label>
                <input type="email" name="email" maxlenght="64" placeholder="exemplo@email.com" class="inp_txt" autocomplete="off" required>
                <label for="email2"><b>E-mail de recuperação</b></label>
                <input type="email" name="email2" maxlenght="64" placeholder="exemplo2@email.com" class="inp_txt" autocomplete="off" required>
                
                <label for="senha"><b>Senha</b></label>  
                <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="inp_txt" required>
                 <button type="button" id="eye">
                    <img src="../assets/svg/pass1.svg" alt="Lpassword" id="olho">
                </button>
                
                <label for="rsenha"><b>Digite a senha novamente</b></label>
                <input type="password" name="rsenha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha novamente" class="inp_txt" required>
             
            </div>

            <div class="dados">
                <label for="matricula"><b>Matrícula:</b></label>
                <input type="text" name="matricula" minlength="6" maxlength="6" placeholder="Digite a matrícula" class="inp_txt" required />

                <label for="rg"><b>RG:</b></label>
                <input type="number" name="rg" id="rg" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" placeholder="Digite o RG" autocomplete="off" class="inp_txt" required />
            </div>

            <button class="botao">Cadastrar</button>
        </form>

        <div class="options1">
            <button class="botao" onclick="window.open('../login/', '_self')">Já tenho uma conta</button>
        </div>
    </div>
    <script src="../js/mostrarSenha.js"></script>
    <script>
        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 6) == "?email") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#800";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "O E-mail já está em uso";
        } else if (currentLocation.search.slice(0, 6) == "?senha") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#800";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "As senhas não são iguais";
        }
    </script>
</body>

</html>