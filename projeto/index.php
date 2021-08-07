<?php
    session_start();
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
        <link href="css/projeto.css" rel="stylesheet">
        <title>Retec - Projeto</title>
    </head>
    <body>

    <div class="banner"> 
    <!-- <div class="banner" backgroud-image: {{php}}> -->
        <?php
            if(isset($_GET["access"])){
                ?>
                <button class="voltar" onclick="window.open('../projetos/index.php?access=<?php echo $_SESSION["numLogin"]; ?>', '_self')">❮ Voltar</button>
        <?php
            }else{
        ?>
                <button class="voltar" style="width:200px" onclick="window.open('../projetos/index.php', '_self')">❮ Cadastre-se</button>
        <?php
            }
        ?> 
        <!-- <img src="___php___"> -->
    </div>

    <div class="grid-container">

    
        <div class="info_esquerda">
            <div class="foto">
                <img>
            </div>

            <div class="caixa">
                <p>
                    <label><b>Prof. Orientador: </b></label> {{professor}}
                </p>
                <p>
                    <label><b>Prof. Coorientador: </b></label> {{professor}}
                </p>
                <p>
                    <label><b>Membros: </b></label>
                    <ul>
                        <li>{{Membro A}}</li>
                        <li>{{Membro B}}</li>
                        <li>{{Membro C}}</li>
                        <li>{{Membro D}}</li>
                    </ul>
                </p>
                <p>
                    <label><b>Banca: </b></label>
                    <ul>
                        <li>{{Professor W}}</li>
                        <li>{{Professor X}}</li>
                        <li>{{Professor Y}}</li>
                        <li>{{Professor Z}}</li>
                    </ul>
                </p>
                <p>
                    <label><b>Escola: </b></label> {{escola}}
                </p>
                <p>
                    <label><b>Curso: </b></label> {{curso}}
                </p>
                <p>
                    <label><b>Data de Apresentação: </b></label> {{data}}
                </p>
                <p>
                    <label><b>Ano de Conclusão: </b></label> {{ano}}
                </p>
                <p>
                    <label><b>Menção: </b></label> {{mencao}}
                </p>
            </div>
        <br><br>
        </div>

        <div class="info_direita">

            <h2>Resumo</h2>
            <div class="abstract">
                
            </div>

            <h2>Abstract</h2>
            <div class="abstract">

            </div>

            <h2>Palavras-chave</h2>
            <div class="abstract">

            </div>

            <h2>Key Words</h2>
            <div class="abstract">

            </div>

            <h2>Downloads</h2>
            <div class="downloads">
                <p>
                    <label>Artigo: </label><input type="submit" value="PDF"/>
                </p>
                <p>    
                    <label>Projeto Completo(.zip): </label><input type="submit" value="Baixar"/>
                </p>
            </div>
        </div>
    </div>
    </body>
</html>