<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../../erro/401.php");
        exit;
    }
    if($_SESSION["tipo"] == "1"){
        header("location: ../../erro/401.php");
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
            <link href="css/remover.css" rel="stylesheet">
            <link href="css/table.css" rel="stylesheet">
            <title>Retec - Remover</title>
        </head> 
    
        <body>
            <div class="cabecalho"> 
                <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
                <div class="bts">
                    <a id="add" href="../adicionar/">Adicionar</a>
                    <a id="rem">Remover</a>
                    <a id="ed" href="../editar/">Editar</a>
                </div>
                <h1 class="logo">RETEC</h1>
            </div>
    
            <div class="center">
                <h2>Remover Projeto</h2>

                <table id="customers">
                    <tr id="especial">
                      <th>Projeto</th>
                      <th>Excluir</th>
                    </tr> 

                    <!-- GERADO PELO PHP -->
                    <tr>
                        <td class="table-column">
                            <div class="item" onclick="window.open('projetoI');">{{ Título do TCC I}}</div>
                        </td>
                        
                        <td class="table-column_ex">
                            <div class="item" id="center">
                                <form action="/routes/delete.php?projeto=$id}}" method="POST">
                                    <button type="submit" class="fr">Excluir</button>
                                  </form>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column">
                            <div class="item" onclick="window.open('projetoII');">{{ Título do TCC II}}</div>
                        </td>

                        <td class="table-column_ex">
                            <div class="item" id="center">
                                <form action="/routes/delete.php?projeto=$id}}" method="POST">
                                    <button type="submit" class="fr">Excluir</button>
                                  </form>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column">
                            <div class="item" onclick="window.open('projetoIII');">{{ Título do TCC III}}</div>
                        </td>

                        <td class="table-column_ex">
                            <div class="item" id="center">
                                <form action="/routes/delete.php?projeto=$id}}" method="POST">
                                    <button type="submit" class="fr">Excluir</button>
                                  </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </body>
    </html>