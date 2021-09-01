<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../../../erro/401.php");
        exit;
    }
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="../../../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="../css/vincular.css" rel="stylesheet">
        <title>Retec - Desvincular</title>
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
            
        <input type="text" value="<?php echo $_SESSION["instituicoes"];?>" id="insts" hidden />
        <div class="center">
            <h1>Desvincular-se de:</h1>
            <select class="inp_txt" name="inst" id="slct" required>    
                <option value="none" selected disabled>Escolha</option>

            </select>
            <br><br>
            <input type="submit" value="Prosseguir"/>
        </div>
        <script>
            insts = document.getElementById("insts").value;
            select = document.getElementById("slct");
            if(insts.indexOf(",") !== -1){
	            array = insts.split(",");
                for(i = 0; i != array.length; i++){
                    option=document.createElement('option');
                    if(array[i] == "ETEC Professor Andre Bogasian"){
                        option.textContent = "ETEC Professor André Bogasian";
                        option.value = array[i];
                    }else{
                        option.textContent = array[i];
                        option.value = array[i];
                    }
                    option.appendChild(select);
                }
            }else{
                option=document.createElement('option');
                if(insts == "ETEC Professor Andre Bogasian"){
                    option.textContent = "ETEC Professor André Bogasian";
                    option.value = array[i];
                }else{
                    option.textContent = insts;
                    option.value = insts;                
                }
                select.appendChild(option);
            }
        </script>
        </body>
</html>