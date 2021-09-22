<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
        header("location: ../../erro/401.php");
        exit;
    }

    $inst = $_SESSION['instituicao'];
    include "../../conexao/conexao.inc";

    $query = "SELECT * FROM usuario WHERE instituicao LIKE '%$inst%'";
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
            <link href="../../css/lista.css" rel="stylesheet">
            <link href="../../css/table.css" rel="stylesheet">
            <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
            <title>Retec - Lista de Professores</title>
        </head> 
    
        <body>
        <?php
            if(isset($_GET['criado'])){
        ?>
                <div class="marker">Professor desvinculado com sucesso!</div>
        <?php
            }
        ?>
            <div class="cabecalho"> 
                <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
                <h1 class="logo">RETEC</h1>
                <?php
                    if($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian"){
                ?>
                        <label class="lblNome">ETEC Professor André Bogasian</label>
                <?php
                    }else{
                ?>
                        <label class="lblNome"><?php echo $_SESSION["instituicao"];?></label>
                <?php
                    }
                ?>
                <br>
                <label class="lblNome"><b>Institucional</b></label>
            </div>
    
            <div class="center">
                <h2>Lista de Professores</h2>

                <table id="customers">
                    <tr id="especial">
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>E-mail de Recuperação</th>
                      <th>Matrícula</th>
                      <th>RG</th>
                      <th style="padding-left:10px">Desvincular</th>
                    </tr> 

                    <?php
                        foreach($result as $professor){
                    ?>
                    <tr>
                        <td class="table-column">
                            <div class="item"><?php echo $professor["nome"];?></div>
                        </td>

                        <td class="table-column">
                            <div class="item"><?php echo $professor["email"];?></div>
                        </td>

                        <td class="table-column">
                            <div class="item"><?php echo $professor["email_rec"];?></div>
                        </td>

                        <td class="table-column">
                            <div class="item"><?php echo $professor["matricula"];?></div>
                        </td>

                        <td class="table-column">
                            <div class="item"><?php echo $professor["rg"];?></div>
                        </td>
                        
                        <td class="table-column_ex" style="padding-left:10px;">
                            <div class="item" id="center">
                                <form action="../../model/desvincularProfessor.php" method="POST">
                                    <input type="text" name="idProf" value="<?php echo $professor["codigo_u"];?>" style="display:none"/>
                                    <button type="submit" class="fr" style="background-color:#ff6666;color:#fff">Desvincular</button>
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