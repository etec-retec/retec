<?php
    include "../conexao/conexao.inc";
    $query = "SELECT * FROM repositorio LIMIT 9";
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/projetos.css" rel="stylesheet">
        <title>Retec - Projetos</title>
    </head>
    <body>

    <?php
        $ver = session_id();
        if($ver != ""){
    ?>
    <div class="cabecalho"> 
        <button class="voltar" onclick="window.open('../dashboard/index.php?access=<?php echo $_GET["access"]; ?>', '_self')">❮ Voltar</button>
        <h1 class="logo">RETEC</h1>
    </div>       
    <?php
        }else{
    ?>
    <div class="cabecalho"> 
        <button class="voltar" onclick="window.open('../dashboard/index.php?access=<?php echo $_GET["access"]; ?>', '_self')">❮ Início</button>
        <h1 class="logo">RETEC</h1>
    </div>    
    <?php       
        }
    ?>                      

    <div class="grid-container">
        <div class="info_esquerda">
            <h1 class="fltrs">Filtros</h1>
            <form action="../rotas/order.php?access">
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
            <button class="btn_pesquisar" id="ico" type="submit"><i class="fa fa-search"></i></button><input type="text" class="btn_pesquisar" id="btn" placeholder="Pesquisar"/>
            <br><br><br>
            <div class="blocos">
                <?php
                    foreach($result as $tcc){
                        if(isset($_GET["access"])){
                            $acesso = $_GET["access"];
                        ?>
                        <div class="bloco">
                            <a href="../projeto/index.php?access=<?php echo $acesso;?>&tcc=<?php echo $tcc["codigo_r"];?>" class="link">
                            <div class="sizeImg">
                    <?php
                        }else{
                            ?>
                        <div class="bloco">
                            <a href="../projeto/index.php?tcc=<?php echo $tcc["codigo_r"];?>" class="link">
                            <div class="sizaImg">
                            <?php
                        } 
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

                     

                    <!-- <a href="../projeto/" class="link">    
                        <div class="bloco">
                            <img src="https://tccagoravai.com//franquias/2/6561561/editor-html/6487905.png" class="img_set">
                            <h3>TCC Exemplo 9</h3>
                            <p>Texto de exemplo do TCC, as abelhas conseguem produzir mel pela necessidade da sobrevivência, já que a polonização
                                revigora a área em que elas vivem e fazem com que elas preservem sua fauna em prol de sua sobrevivência.
                            </p>
                        </div>
                    </a> -->
                
            </div>

            
        </div>
    </div>
    </body>
</html>