<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../../erro/401.php");
        exit;
    }

    $inst = $_SESSION['instituicao'];
    include "../../conexao/conexao.inc";
    $query = "SELECT * FROM repositorio WHERE instituicao = '$inst'";
    $result = mysqli_query($conexao, $query);

    mysqli_close($conexao);
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
            <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
            <title>Retec - Editar</title>
        </head> 
    
        <body>
            <div class="cabecalho"> 
                <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
                <div class="bts">
                    <a id="add" href="../adicionar/" >Adicionar</a>
                    <a id="ed">Editar</a>
                </div>
                <h1 class="logo">RETEC</h1>
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
                            <div class="item" onclick="window.open('tcc/?tcc=<?php echo $tcc['codigo_r'];?>', '_self');"><?php echo $tcc["nome"];?></div>
                        </td>
                        
                        <td class="table-column_ex">
                            <div class="item" id="center">
                                <form action="tcc/?tcc=<?php echo $tcc['codigo_r'];?>" method="POST">
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