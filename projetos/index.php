<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="css/projetos.css" rel="stylesheet">
        <title>Retec - Projetos</title>
    </head>
    <body>

    <div class="cabecalho"> 
        <button class="voltar">❮ Voltar</button>
        <h1 class="logo">RETEC</h1>
    </div>

    <div class="grid-container">
        <h1 class="fltrs">Filtros</h1>
        <!-- <input type="text" placeholder="Pesquisar"/> -->
        <br>
        <div class="info_esquerda">
            <form action="../rotes/order.php?access">
                <h3>Curso - ETIM</h3>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="ds"> DS<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="nutricao"> Nutrição<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="meioambiente"> Meio Ambiente<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="quimica"> Química
                <br><br>
                <h3>Curso - Modular</h3>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="contabilidade"> Contabilidade<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="seg_trab"> Segurança do Trabalho<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="nutr_diet"> Nutrição e Dietética<br>
                &nbsp;<input type="checkbox" class="checkbox-round" name="curso" value="quimica_mod"> Química
                <br><br>
                <h3>Data da Postagem</h3>
                De <input type="number" class="ano_inp" min="2021" max="2022"> até <input type="number" class="ano_inp" min="2021" max="2022">
                <br><br>
                <input type="submit" class="btn_filtrar" value="Filtrar">
            </form>


        </div>
    

        <div class="info_direita">
        <input type="text" placeholder="Pesquisar"/>

            
        </div>
    </div>
    </body>
</html>