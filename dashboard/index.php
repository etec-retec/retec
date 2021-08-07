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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="css/dashboard.css" rel="stylesheet">
        <title>Retec - Dashboard</title>
    </head>
    <body>
        <div class="cabecalho" id="teste"> 
            <button class="voltar" onclick="window.open('../index.php', '_self')">❮ Sair</button>
            
            <h1 class="logo">RETEC</h1>
        </div>

        <div class="corpo">
            <h1 class="cap">Olá, <?php echo $_SESSION["nome"]; ?>!</h1>
            <h2 class="access">O que você deseja acessar?</h2>

            <div class="opcoes">
                <a id="p" href="../projetos/index.php?access=<?php echo $_SESSION["numLogin"];?>">Projetos</a>
                <a id="a" href="adicionar/index.php?access=<?php echo $_SESSION["numLogin"];?>">Adicionar Projeto</a>
                <a id="e" href="editar/index.php?access=<?php echo $_SESSION["numLogin"];?>"">Editar Projeto</a>
                <a id="r" href="remover/index.php?access=<?php echo $_SESSION["numLogin"];?>"">Excluir Projeto</a>
                <a id="m" href="">Meu Perfil</a>
            </div>
        </div>
        
    </body>
</html>