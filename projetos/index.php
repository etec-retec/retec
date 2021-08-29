<?php
    session_start();
    // var_dump($_SESSION);
    if(isset($_GET['curso'])){
        var_dump($_GET['curso']);
        echo "<hr>";
        var_dump($_GET['instituicao']);
    }
    include "../conexao/conexao.inc";
    $query = "SELECT * FROM repositorio LIMIT 15";
    $result = mysqli_query($conexao, $query);

    $query2 = "SELECT nome FROM materias";
    $result2 = mysqli_query($conexao, $query2);

    $query3 = "SELECT nome FROM instituicao";
    $result3 = mysqli_query($conexao, $query3);
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
        <link href="css/projetos.css" rel="stylesheet">
        <title>Retec - Projetos</title>
    </head>
    <body>

    <?php
        if(isset($_SESSION["numLogin"]) && $_SESSION["tipo"] == 0){
    ?>
    <div class="cabecalho">
        <button class="voltar" onclick="window.open('../instituicao/', '_self')">❮ Voltar</button>
        <h1 class="logo">RETEC</h1>
        <?php
            if(isset($_SESSION['instituicao'])){
        ?>
                <label><?php echo $_SESSION["instituicao"];?></label>
        <?php
            }
            if($_SESSION['tipo'] == 0){
        ?>
                <br><label><b>Institucional</b></label>
        <?php
            }
        ?>
    </div>       
    <?php
        }elseif(isset($_SESSION["numLogin"]) && $_SESSION["tipo"] == 1){
    ?>
    <div class="cabecalho">
        <button class="voltar" onclick="window.open('../dashboard/', '_self')">❮ Voltar</button>
        <h1 class="logo">RETEC</h1>
        <?php
            if(isset($_SESSION['instituicao'])){
        ?>
                <label><?php echo $_SESSION["instituicao"];?></label>
        <?php
            }
        }else{
        ?>
    </div>
    <div class="cabecalho"> 
        <button class="voltar" onclick="window.open('../', '_self')">❮ Início</button>
        <h1 class="logo">RETEC</h1>
    </div>    
    <?php       
        }
    ?>                      

    <div class="grid-container">
        <div class="info_esquerda">
            <h1 class="fltrs">Filtros</h1>
            <?php
                if(isset($_SESSION["numLogin"])){
            ?>
            <form action="index.php" method="GET">
            <?php
                }else{
            ?>
            <form action="index.php" method="GET">
            <?php
                }
            ?>
                <h3>Cursos</h3>
                <?php
                    foreach($result2 as $res2){
                        echo "&nbsp;<input type='checkbox' class='checkbox-round' name='curso[]' value='".$res2['nome']."'> ".$res2['nome']."<br>";
                    }
                ?>
                <br>
                <h3>Instituição</h3>
                <?php
                    foreach($result3 as $res3){
                        echo "&nbsp;<input type='checkbox' class='checkbox-round' name='instituicao[]' value='".$res3['nome']."'>";
                        if($res3['nome'] == "ETEC Professor Andre Bogasian"){
                            echo " ETEC Professor André Bogasian";
                        }else{
                            echo " ".$res3['nome'];
                        }
                        echo "<br>";
                    }
                ?>
                
                <br>
                <h3>Ano de Publicação</h3>
                De <input type="number" class="ano_inp" min="2021" max="2022"> até <input type="number" class="ano_inp" min="2021" max="2022">
                <br><br>
                <input type="submit" class="btn_filtrar" value="Filtrar">
            </form>
        </div>

        <div class="info_direita">
            <button class="btn_pesquisar" id="ico" type="submit"><i class="fa fa-search"></i></button><input type="text" class="btn_pesquisar" id="btn" placeholder="Pesquisar"/>
            <br><br><br>
            <div class="blocos">
                <?php
                    foreach($result as $tcc){
                ?>
                        <div class="bloco">
                            <a href="../projeto/index.php?tcc=<?php echo $tcc["codigo_r"];?>" class="link">
                            <div class="sizeImg">
                <?php
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($tcc['foto']).'"';
                                echo "/>";
                ?>
                            </div>
                                <h3><?php echo $tcc["nome"];?></h3>
                                <p><?php echo $tcc["resumo"];?></p>
                            </div>
                        </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    </body>
</html>