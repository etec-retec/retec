<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../../erro/401.php");
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="../../css/perfil.css" rel="stylesheet">
        <title>Retec - Perfil</title>
    </head>
    <body>
        <div class="marker" style="display:none;" id="senhaMsg">Um e-mail foi enviado ao endereço <?php echo $_SESSION['email'];?> <br>Por favor, verifique.</div>
        <div class="marker" style="display:none;" id="dadosMsg">Os dados foram alterados com sucesso!</div>
        <div class="markerRed" style="display:none;" id="emailMsg">O e-mail já está em uso!</div>
        <div class="markerRed" style="display:none;" id="emailRecMsg">O e-mail de recuperação já está em uso!</div>
        <div class="markerRed" style="display:none;" id="rgMsg">O RG já está em uso!</div>
        <div class="markerRed" style="display:none;" id="matriculaMsg">A matrícula já está em uso!</div>
        <div class="cabecalho" id="teste">
            <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
            
            <div class="logo">
                <h1 class="logo" id="texto">RETEC</h1>
                <?php
                    if($_SESSION["instituicao"] == "ETEC Professor Andre Bogasian"){
                ?>
                        <label>ETEC Professor André Bogasian</label>
                <?php
                    }else {
                ?>
                    <label><?php echo $_SESSION["instituicao"];?></label>
                <?php
                    }
                ?>
            </div>
        </div>

        <div class="grid-container">
            <div class="info_esquerda">
                <h1>Dados Pessoais</h1>
                <form action="../../rotas/editarPerfil.php" method="POST" class="formu">
                    <label><b>Nome</b></label>
                    <br>
                    <input type="text" min="3" max="64" name="nome" value="<?php echo $_SESSION['nome'];?>" required/>
                    <br><br>
                    <label><b>E-mail</b></label>
                    <br>
                    <input type="text" min="3" max="64" name="email" value="<?php echo $_SESSION['email'];?>" required/>
                    <br><br>
                    <label><b>E-mail de Recuperação</b></label>
                    <br>
                    <input type="text" min="3" max="64" name="email_rec" value="<?php echo $_SESSION['email_rec'];?>" required/>
                    <br><br>
                    <label><b>RG</b></label>
                    <br>
                    <input type="text" minlength="5" maxlength="14" name="rg" value="<?php echo $_SESSION['rg'];?>" required/>
                    <br><br>
                    <label><b>Matrícula</b></label>
                    <br>
                    <input type="text" minlength="6" maxlength="6" name="matricula" value="<?php echo $_SESSION['matricula'];?>" required/>
                    <br><br>
                    <input type="submit" value="Alterar Dados"/>
                </form>
            </div>

            <div class="info_direita">
                <h1>Ações</h1>
                <button class="acoes" onclick="window.open('vincular-se/', '_self')">Vincular-se à alguma instituição</button>
                <br>
                <button class="acoes" onclick="window.open('desvincular-se/', '_self')">Desvincular-se de alguma instituição</button>
                <br>
                <button class="acoes" onclick="window.open('?senha', '_self')">Solicitar Mudança de Senha</button>
            </div>
        </div>    
        <script>
            var currentLocation = window.location;
            if(currentLocation.search.slice(0,6) == "?senha"){
                document.getElementById("senhaMsg").style.display = "block";
            }

            if(currentLocation.search.slice(0,11) == "?atualizado"){
                document.getElementById("dadosMsg").style.display = "block";
            }

            if(currentLocation.search.slice(0,13) == "?emailDenied"){
                document.getElementById("emailMsg").style.display = "block";
            }

            if(currentLocation.search.slice(0,16) == "?email_recDenied"){
                document.getElementById("emailRecMsg").style.display = "block";
            }

            if(currentLocation.search.slice(0,9) == "?rgDenied"){
                document.getElementById("rgMsg").style.display = "block";
            }

            if(currentLocation.search.slice(0,16) == "?matriculaDenied"){
                document.getElementById("matriculaMsg").style.display = "block";
            }
        </script>
    </body>
</html>