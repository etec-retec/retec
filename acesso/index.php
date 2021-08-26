<?php
    session_start();
    if(isset($_SESSION["materias"])){
        unset($_SESSION["materias"]);
    }elseif(isset($_SESSION["id_etec"])){
        unset($_SESSION["id_etec"]);
    }

    if($_SESSION["numLogin"] != $_GET["access"]){
        echo "
        <center>
        <br><br><br><br><br><br>
            <h1>Acesso negado!</h1>
            <br>
            <a href='../login/index.php'>Entrar</a>
        </center>
        ";
        exit;
    }
    if($_SESSION["tipo"] == "0"){
        echo "
        <center>
        <br><br><br><br><br><br>
            <h1>Acesso negadoaaa!</h1>
            <br>
            <a href='../login/index.php'>Entrar</a>
        </center>
        ";
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
        <link href="./css/acesso.css" rel="stylesheet">
        <title>RETEC - Login</title>
    </head>
        <body>
            <button class="voltar" onclick="window.open('../index.php', '_self')">❮ Voltar</button> 
            <div class="formu">
                <h1>Olá, <?php echo $_SESSION["nome"];?>!</h1>
                <h2>Entrar como professor da:</h2>
                <form name="cadastraU" action="../rotas/selecao.php?access=<?php echo $_SESSION["numLogin"];?>" method='POST'>
                    <br>
                    <select class="inp_txt" name="inst" id="slct">    
                        <option value="none" required selected disabled>Escolha</option>
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
            </script>
        </body>
    </html>