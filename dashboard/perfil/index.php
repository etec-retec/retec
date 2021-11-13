<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../../erro/401.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../loader/loading.css">
    <script type="text/javascript" src="../../loader/loading.js"></script>

    <link href="../../css/perfil.css" rel="stylesheet">
    <title>Retec - Perfil</title>
</head>

<body>
    <div class="preload">
        <span class="load"></span>
    </div>
  
    <div class="cabecalho" id="teste">
        <button class="voltar" onclick="window.history.back()">❮ Voltar</button>

        <div class="logo">
            <h1 class="logo" id="texto">RETEC</h1>
            <?php
            if ($_SESSION["instituicao"] == "ETEC Professor Andre Bogasian") {
            ?>
                <label>ETEC Professor André Bogasian</label>
            <?php
            } else {
            ?>
                <label><?php echo $_SESSION["instituicao"]; ?></label>
            <?php
            }
            ?>
        </div>
        </div>

        <div class="marker mk" style="display:none;" id="senhaMsg">Um e-mail foi enviado ao endereço <?php echo $_SESSION['email']; ?> <br>Por favor, verifique.</div>
    <div class="marker mk" style="display:none;" id="dadosMsg">Os dados foram alterados com sucesso!</div>
    <div class="markerRed mk" style="display:none;" id="emailMsg">O e-mail já está em uso!</div>
    <div class="markerRed mk" style="display:none;" id="emailRecMsg">O e-mail de recuperação já está em uso!</div>
    <div class="markerRed mk" style="display:none;" id="rgMsg">O RG já está em uso!</div>
    <div class="markerRed mk" style="display:none;" id="matriculaMsg">A matrícula já está em uso!</div>

    <div class="container">

        <div class="container-dados">
            <h1>Dados Pessoais</h1>
            <form action="../../model/editarPerfil.php" method="POST" class="formu">

                <div class="esquerda">

                    <label><b>Nome</b></label><br>
                    <input type="text" class="txt" min="3" max="64" name="nome" value="<?php echo $_SESSION['nome']; ?>" required />

                    <label><b>E-mail</b></label><br>
                    <input type="text" class="txt" min="3" max="64" name="email" value="<?php echo $_SESSION['email']; ?>" required />

                    <label><b>E-mail de Recuperação</b></label><br>
                    <input type="text" class="txt" min="3" max="64" name="email_rec" value="<?php echo $_SESSION['email_rec']; ?>" required />
                </div>

                <div class="direita">

                    <label><b>RG</b></label><br>
                    <input type="text" class="txt" minlength="5" maxlength="14" name="rg" value="<?php echo $_SESSION['rg']; ?>" required />
                    <label><b>Matrícula</b></label><br>
                    <input type="text" class="txt" minlength="6" maxlength="6" name="matricula" value="<?php echo $_SESSION['matricula']; ?>" required />

                    <input type="submit" class="alterar" value="Alterar Dados" />
                </div>
            </form>
        </div>

        <div class="container-acoes">
            <!-- <h1>Ações</h1> -->
            <button class="acoes" onclick="window.open('vincular-se/', '_self')">Vincular-se à alguma instituição</button>
            <button class="acoes" onclick="window.open('desvincular-se/', '_self')">Desvincular-se de alguma instituição</button>
            <button class="acoes" onclick="window.open('?senha', '_self')">Solicitar Mudança de Senha</button>
        </div>

    </div>
    <script>
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
        if (currentLocation.search.slice(0, 6) == "?senha") {
            document.getElementById("senhaMsg").style.display = "block";
        }

        if (currentLocation.search.slice(0, 11) == "?atualizado") {
            document.getElementById("dadosMsg").style.display = "block";
        }

        if (currentLocation.search.slice(0, 13) == "?emailDenied") {
            document.getElementById("emailMsg").style.display = "block";
        }

        if (currentLocation.search.slice(0, 16) == "?email_recDenied") {
            document.getElementById("emailRecMsg").style.display = "block";
        }

        if (currentLocation.search.slice(0, 9) == "?rgDenied") {
            document.getElementById("rgMsg").style.display = "block";
        }

        if (currentLocation.search.slice(0, 16) == "?matriculaDenied") {
            document.getElementById("matriculaMsg").style.display = "block";
        }
    </script>
</body>

</html>