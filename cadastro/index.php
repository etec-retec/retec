<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../loader/loading.css">
    <script type="text/javascript" src="../loader/loading.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="../css/cadastro.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>RETEC - Cadastro</title>
</head>

<body>
    <div class="preload">
        <span class="load"></span>
    </div>
    <button class="voltar" onclick="window.history.back()">❮ Voltar</button>

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
                <label class="container">ETEC Professor Basilides de Godoy
                    <input type="checkbox" name="instituicao[]" value="ETEC Professor Basilides de Godoy" />
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="email-e-senha">
                <label for="email"><b>E-mail</b></label>
                <input type="email" name="email" maxlenght="64" placeholder="exemplo@email.com" class="inp_txt" autocomplete="off" required>
                <label for="email2"><b>E-mail de recuperação</b></label>
                <input type="email" name="email2" maxlenght="64" placeholder="exemplo2@email.com" class="inp_txt" autocomplete="off" required>

                <label for="senha"><b>Senha</b></label>
                <div class="eyeInside">
                    <input type="password" name="senha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha" class="inp_txt" required>
                    <button type="button" id="eye">
                        <img src="../assets/svg/pass1.svg" alt="Lpassword" id="olho">
                    </button>
                </div>

                <label for="rsenha"><b>Digite a senha novamente</b></label>
                <input type="password" name="rsenha" id="senha" minlenght="5" maxlenght="42" placeholder="Senha novamente" class="inp_txt" required>

            </div>

            <div class="dados">
                <label for="matricula"><b>Matrícula:</b></label>
                <input type="number" name="matricula" id="matricula" max="999999" placeholder="Digite a matrícula" class="inp_txt" required/>

                <label for="rg"><b>RG:</b></label>
                <label style="margin-top: 0px; font-size: 12px">(Sem traços e pontos)</label>
                <input type="text" name="rg" id="rg" max="14" placeholder="Digite o RG" autocomplete="off" class="inp_txt" pattern="[a-zA-Z0-9-]+" required/>
            </div>

            <div class="opt">
                <button class="botao btn1">Cadastrar</button>
                </div>
                <button class="botao btn2" onclick="window.open('../login/', '_self')">Já tenho uma conta</button>
                
      
        </form>

    </div>
    <script src="../js/mostrarSenha.js"></script>
    <script>
        $(function(){
          $("input[name='matricula']").on('input', function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
            if($(this).val().length >= 6) {
                $(this).val($('#matricula').val().substr(0,6));
            }
          });
        });

        $(function(){
          $("input[name='rg']").on('input', function (e) {
            if($(this).val().length >= 14) {
                $(this).val($('#rg').val().substr(0,14));
            }
            var raw_text =  jQuery(this).val();
            var return_text = raw_text.replace(/[^a-zA-Z0-9 _]/g,'');
            jQuery(this).val(return_text);
          });
        });

        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 6) == "?email") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#F00";
            document.getElementById("lbl_aviso").style.fontWeight = "900";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "O E-mail já está em uso";
        } else if (currentLocation.search.slice(0, 6) == "?senha") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#F00";
            document.getElementById("lbl_aviso").style.fontWeight = "900";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "As senhas não são iguais";
        } else if (currentLocation.search.slice(0, 7) == "?repeat") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#F00";
            document.getElementById("lbl_aviso").style.fontWeight = "900";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "Os e-mails não podem se repetir!";
        } else if (currentLocation.search.slice(0, 10) == "?matricula") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#F00";
            document.getElementById("lbl_aviso").style.fontWeight = "900";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "A matrícula já está cadastrada!";
        } else if (currentLocation.search.slice(0, 3) == "?rg") {
            document.getElementById("lbl_aviso").style.display = "block";
            document.getElementById("lbl_aviso").style.color = "#F00";
            document.getElementById("lbl_aviso").style.fontWeight = "900";
            document.getElementById("lbl_aviso").style.textDecoration = "underline";
            document.getElementById("lbl_aviso").textContent = "O RG já está cadastrado!";
        }
    </script>
</body>

</html>