<?php
    session_start();
    if($_SESSION["numLogin"] != $_GET["access"]){
        header("location: ../../erro/401.php");
        exit;
    }

    $inst = $_SESSION['instituicao'];
    include "../../conexao/conexao.inc";
    $query = "SELECT * FROM repositorio WHERE instituicao = '$inst'";
    $result = mysqli_query($conexao, $query);
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
            <link href="css/editar.css" rel="stylesheet">
            <link href="css/table.css" rel="stylesheet">
            <title>Retec - Editar</title>
        </head> 
    
        <body>
            <div class="cabecalho"> 
                <button class="voltar" onclick="window.open('../index.php?access=<?php echo $_SESSION["numLogin"]; ?>', '_self')">❮ Voltar</button>
                <div class="bts">
                    <a id="add" href="../adicionar/index.php?access=<?php echo $_SESSION["numLogin"];?>" >Adicionar</a>
                    <a id="ed">Editar</a>
                </div>
                <h1 class="logo">RETEC</h1>
            </div>
    
            <div class="center">
                <h2>Editar Projeto</h2>

                <table id="customers">
                    <tr id="especial">
                      <th>Projeto</th>
                      <th>Editar</th>
                    </tr> 

                    <?php
                        foreach($result as $tcc){
                    ?>
                    <tr>
                        <td class="table-column">
                            <div class="item" onclick="window.open('tcc/index.php?access=<?php echo $_SESSION['numLogin'];?>&tcc=<?php echo $tcc["codigo_r"];?>');"><?php echo $tcc["nome"];?></div>
                        </td>
                        
                        <td class="table-column_ex">
                            <div class="item" id="center">
                                <form action="tcc/index.php?access=<?php echo $_SESSION['numLogin'];?>&tcc=<?php echo $tcc["codigo_r"];?>" method="POST">
                                    <button type="submit" class="fr">Editar</button>
                                  </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>

                </table>
            </div>
        </body>
    </html>