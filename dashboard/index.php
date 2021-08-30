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
        <link href="css/dashboard.css" rel="stylesheet">
        <title>Retec - Dashboard</title>
    </head>
    <body>
        <div class="cabecalho" id="teste"> 
            <button class="voltar" onclick="window.open('../', '_self')">❮ Sair</button>
            
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
        <br>
        <div class="corpo">
            <h1 class="cap">Olá, <?php echo $_SESSION["nome"]; ?>!</h1>
            <h2 class="access">O que você deseja acessar?</h2>

            <div class="opcoes">
                <a id="p" href="../projetos/">Projetos</a>
                <a id="a" href="adicionar/">Adicionar Projeto</a>
                <a id="e" href="editar/">Editar Projeto</a>
                <a id="m" href="">Meu Perfil</a>
            </div>
        </div>
        
    </body>
</html>