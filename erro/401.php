<?php
    if(session_id() != ''){
        session_destroy();
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../projetos/css/projetos.css" rel="stylesheet">
        <link href="401.css" rel="stylesheet">
        <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <title>Retec - Acesso Negado</title>
    </head>
    <body>
        <div class="cabecalho">
            <h1 class="logo" style="padding-top: 32px;">RETEC</h1>
        </div>

        <div class="mensagem">
            <h1>Acesso Negado!</h1>
            <a href="../">Retornar à Página Inicial</a>
            <br>
            <a href="../projetos/">Ver Projetos</a>
            <br>
            <a href="../login/">Entrar na sua conta</a>
        </div>
        
    </body>
</html>