<?php
    session_start();
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
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/verticalBar.css" rel="stylesheet">
        <title>Retec - Dashboard</title>
    </head>
    <body>
    <ul>
    <li><a class="active" href="#home" title="Ínicio"><img src="img/home.png" style="opacity:0.5"></a></li>
    <li><a class="active" href="../rotas/novoRepositorio.php?access=<?php echo $_SESSION["numLogin"];?>" title="Cadastrar"><img src="img/adc.png"></a></li>
    <li><a class="active" href="#edit" title="Editar"><img src="img/edit.png"></a></li>
    <li><a class="active" href="#trash" title="Apagar"><img src="img/trash.png"></a></li>
    </ul>
    <hr/>

    </body>
</html>