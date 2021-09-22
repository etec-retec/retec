<?php
    session_start();
    if(isset($_GET['curso']) || isset($_GET['instituicao']) || isset($_GET['ano1']) || isset($_GET['ano2'])){
        $query  = "SELECT * FROM repositorio WHERE 1";

        if(isset($_GET['curso'])){
            $first = $_GET['curso'][0];
            $query .= " AND curso LIKE  '%$first%'";

            $sizeCurso = sizeof($_GET['curso']);
            if($sizeCurso > 1){
                $curso = $_GET['curso'];
                for($i = 1; $i != $sizeCurso; $i++){
                    $query .= " OR curso LIKE '%$curso[$i]%'";
                    
                }
            }
        }

        if(isset($_GET['instituicao'])){
            $first = $_GET['instituicao'][0];
            $query .= " AND instituicao LIKE  '%$first%'";

            $sizeInsti = sizeof($_GET['instituicao']);
            if($sizeInsti >1){
                $insti = $_GET['instituicao'];
                for($i = 1; $i >= $sizeInsti; $i++){
                    $query .= " AND instituicao LIKE  '%$insti%'";
                }
            }
        }

        if($_GET['ano1'] && $_GET['ano2'] != ''){
            $ano1 = $_GET['ano1'];
            $ano2 = $_GET['ano2'];

            if($ano1 <= $ano2){
                $query .= " AND ano >= $ano1 AND ano <= $ano2";
            }
        }
    }elseif(isset($_GET['search'])){
        $search = $_GET['search'];
        $query = "SELECT * FROM repositorio WHERE nome LIKE '%$search%' OR prof_orientador LIKE '%$search%' OR prof_corientador LIKE '%$search%' OR membros_grupo LIKE '%$search%'";
    }else{
        $query = "SELECT * FROM repositorio LIMIT 24";
    }
    
    include "../conexao/conexao.inc";
    $result = mysqli_query($conexao, $query);
    $encontrados = mysqli_affected_rows($conexao);

    $query2 = "SELECT * FROM materias";
    $result2 = mysqli_query($conexao, $query2);
    $values = [];
    $nomes = [];
    while($row = mysqli_fetch_array($result2)){
        array_push($values, $row['value']);
        array_push($nomes, $row['nome']);
    }

    $query3 = "SELECT nome, value FROM instituicao";
    $result3 = mysqli_query($conexao, $query3);
    $instituicoes = [];
    $valores = [];
    while($row = mysqli_fetch_array($result3)){
        array_push($instituicoes, $row['nome']);
        array_push($valores, $row['value']);
    }

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/projetos.css" rel="stylesheet">
        <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
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
                if($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian"){                   
        ?>
        
                <label>ETEC Professor André Bogasian</label>
        <?php
            }else{
        ?>
                <label><?php echo $_SESSION["instituicao"];?></label>
        <?php
            }
        ?>
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
                if($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian"){
        ?>
                    <label>ETEC Professor André Bogasian</label>

        <?php
                }else{
        ?>
                    <label><?php echo $_SESSION["instituicao"];?></label>
        <?php
                }
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
            <form action="?" method="GET">
                <h3>Cursos</h3>
                <?php
                    for($i = 0; $i <= 15; $i++){
                        echo "&nbsp;<input type='checkbox' class='checkbox-round' name='curso[]' value='".$values[$i]."'";
                        $atual = $values[$i];
                        if(isset($_GET['curso'])){
                            for($j = 0; $j <= 15; $j++){
                                for($k = 0; $k <= (sizeof($_GET['curso'])-1); $k++){
                                    if($atual == $_GET['curso'][$k]){
                                        echo " checked ";
                                    }
                                }
                            }
                        }
                        echo "> ".$nomes[$i]."<br>";
                    }
                ?>
                <br>
                <h3>Instituição</h3>
                <?php
                    for($i = 0; $i <= 2; $i++){
                        echo "&nbsp;<input type='checkbox' class='checkbox-round' name='instituicao[]' value='".$valores[$i]."'";
                        $atual = $valores[$i];
                        if(isset($_GET['instituicao'])){
                            for($j = 0; $j <= 3; $j++){
                                for($k = 0; $k <= (sizeof($_GET['instituicao'])-1); $k++){
                                    if($atual == $_GET['instituicao'][$k]){
                                        echo " checked ";
                                    }
                                }
                            }
                        }
                        echo ">";
                        if($instituicoes[$i] == "ETEC Professor Andre Bogasian"){
                            echo " ETEC Professor André Bogasian";
                        }else{
                            echo " ".$instituicoes[$i];
                        }
                        echo "<br>";
                    }
                ?>
                <br>
                <h3>Ano de Publicação</h3>
                <?php
                    if(isset($_GET['ano1'])){
                        if($_GET['ano1'] != ''){
                ?>
                    De <input type="number" name="ano1" class="ano_inp" min="2008" max="2021" value="<?php echo $_GET['ano1'];?>">
                <?php
                        }
                    }
                    if(isset($_GET['ano2'])){
                        if($_GET['ano2'] != ''){
                ?>
                     até <input type="number" name="ano2" class="ano_inp" min="2009" max="2022" value="<?php echo $_GET['ano2'];?>">
                <?php
                        }
                    }else{
                ?>
                        De <input type="number" name="ano1" class="ano_inp" min="2008" max="2021"> até <input type="number" name="ano2" class="ano_inp" min="2009" max="2022">
                <?php
                    }
                ?>
                <br><br>
                <input type="submit" class="btn_filtrar" value="Filtrar"/>
                <br><br>
                <input type="button" class="btn_filtrar" id="lp_filtros" onclick="window.open('../projetos/', '_self')" value="Limpar Filtros"/>
            </form>
        </div>

        <div class="info_direita">
        <form action="?" method="GET">
            <button class="btn_pesquisar" id="ico" type="submit"><i class="fa fa-search"></i></button><input type="text" class="btn_pesquisar" name="search" id="btn" placeholder="Pesquisar" autocomplete="off"/>
        </form>
            <br><br><br><br>
            <?php
                if($encontrados == 1){
            ?>
                    <div class="result"><h2>Encontramos <?php echo $encontrados;?> projetos...</h2></div>
            <?php
                }elseif($encontrados > 1){
            ?>
                    <div class="result"><h2>Encontramos <?php echo $encontrados;?> projetos...</h2></div>
            <?php
                }else{
            ?>
                    <div class="result"><h2>Não foi encontrado nenhum projeto com a sua pesquisa...</h2></div>
            <?php
                }
            ?>
            <div class="blocos">
                <?php
                    foreach($result as $tcc){
                ?>
                        <div class="bloco">
                            <a href="../projeto/?tcc=<?php echo $tcc["codigo_r"];?>" class="link">
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
    <script>
        
    </script>

    </body>
</html>