<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="css/perfil.css" rel="stylesheet">
        <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <title>Retec - Perfil</title>
    </head>
    <body>
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

        <div class=""
            
        
    </body>
</html>