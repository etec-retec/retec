<?php
    session_start();
    if(isset($_SESSION["materias"])){
        unset($_SESSION["materias"]);
    }elseif(isset($_SESSION["id_etec"])){
        unset($_SESSION["id_etec"]);
    }

    if(!isset($_SESSION["numLogin"])){
        header("location: ../erro/401.php");
        exit;
    }
    
    if($_SESSION["tipo"] == "0"){
        header("location: ../erro/401.php");
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="css/acesso.css" rel="stylesheet">
        <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <title>RETEC - Login</title>
    </head>
        <body>
        <?php
            if(isset($_SESSION['deletada'])){
                if($_SESSION['deletada'] == "ETEC Professor Andre Bogasian"){
        ?>
                    <div class="marker" style="display:none;" id="sucessoMsg">Sua conta foi desvinculada com sucesso da ETEC Professor André Bogasian!</div>
        <?php
            }else{
        ?>
                <div class="marker" style="display:none;" id="sucessoMsg">Sua conta foi desvinculada com sucesso da <?php echo $_SESSION['deletada'];?></div>
        <?php
                }
            }
        ?>
            <button class="voltar" onclick="window.open('../login/', '_self')">❮ Voltar</button> 
            <div class="formu">
                <h1>Olá, <?php echo $_SESSION["nome"];?>!</h1>
                <h2>Entrar como professor da:</h2>
                <form name="cadastraU" action="../rotas/selecao.php" method='POST'>
                    <br>
                    <select class="inp_txt" name="inst" id="slct" required>    
                        <option value="none" selected disabled>Escolha</option>
                    </select>
                    <br><br>
                    <input type="text" name="instituicoes" style="display:none" value="<?php echo $_SESSION["instituicao"];?>"/>
                    
                    <br>
                    <button class="botao">Entrar</button>
                </form>
                <br><br>
            </div>
            <script>
                <?php 
                    $array = explode(',', $_SESSION["instituicao"]);

                    foreach($array as $inst){
                        echo "
                        slct = document.getElementById('slct');
                        var option = document.createElement('option');
                        if('$inst' == 'ETEC Professor Andre Bogasian'){
                            option.text = 'ETEC Professor André Bogasian';
                            option.value = 'ETEC Professor Andre Bogasian';
                        }else if('$inst' == 'ETEC Basilides de Godoy'){
                            option.text = 'ETEC Basílides de Godoy';
                            option.value = 'ETEC Basilides de Godoy';
                        }else{
                            option.text = '$inst';
                            option.value = '$inst';
                        }
                        slct.add(option);
                        ";
                    }
                ?>

            var currentLocation = window.location;
            if(currentLocation.search.slice(0,8) == "?sucesso"){
                document.getElementById("sucessoMsg").style.display = "block";
            }
            </script>
        </body>
    </html>