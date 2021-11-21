<?php
session_start();
if (isset($_GET['curso']) || isset($_GET['instituicao']) || isset($_GET['ano1']) || isset($_GET['ano2'])) {
    $query  = "SELECT * FROM repositorio WHERE 1";

    if (isset($_GET['curso'])) {
        $first = $_GET['curso'][0];
        $query .= " AND curso LIKE  '%$first%'";

        $sizeCurso = sizeof($_GET['curso']);
        if ($sizeCurso > 1) {
            $curso = $_GET['curso'];
            for ($i = 1; $i != $sizeCurso; $i++) {
                $query .= " OR curso LIKE '%$curso[$i]%'";
            }
        }
    }

    if (isset($_GET['instituicao'])) {
        $first = $_GET['instituicao'][0];
        $query .= " AND instituicao LIKE  '%$first%'";

        $sizeInsti = sizeof($_GET['instituicao']);
        if ($sizeInsti > 1) {
            $insti = $_GET['instituicao'];
            for ($i = 1; $i >= $sizeInsti; $i++) {
                $query .= " AND instituicao LIKE  '%$insti%'";
            }
        }
    }

    if ($_GET['ano1'] && $_GET['ano2'] != '') {
        $ano1 = $_GET['ano1'];
        $ano2 = $_GET['ano2'];

        if ($ano1 <= $ano2) {
            $query .= " AND ano >= $ano1 AND ano <= $ano2";
        }
    }
} elseif (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM repositorio WHERE nome LIKE '%$search%' OR prof_orientador LIKE '%$search%' OR prof_corientador LIKE '%$search%' OR membros_grupo LIKE '%$search%'";
} else {
    $query = "SELECT * FROM repositorio LIMIT 24";
}

include "../conexao/conexao.inc";
$result = mysqli_query($conexao, $query);
$encontrados = mysqli_affected_rows($conexao);

$query2 = "SELECT * FROM materias";
$result2 = mysqli_query($conexao, $query2);
$values = [];
$nomes = [];
while ($row = mysqli_fetch_array($result2)) {
    array_push($values, $row['value']);
    array_push($nomes, $row['nome']);
}

$query3 = "SELECT nome, value FROM instituicao";
$result3 = mysqli_query($conexao, $query3);
$instituicoes = [];
$valores = [];
while ($row = mysqli_fetch_array($result3)) {
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
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
   
    <title>Retec - Projetos</title>
</head>

<body>
    <?php
    if (isset($_SESSION["numLogin"]) && $_SESSION["tipo"] == 0) {
    ?>
        <!-- Usuário Institucional -->
        <div class="cabecalho">
            <button class="voltar" onclick="window.open('../instituicao/', '_self')">❮ Voltar</button>
            <div class="logo">
                <h1>RETEC</h1>
                <?php
                if (isset($_SESSION['instituicao'])) {
                    if ($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian") {
                ?>
                        <label>ETEC Professor André Bogasian</label>
                    <?php
                    } else {
                    ?>
                        <label><?php echo $_SESSION["instituicao"]; ?></label>
                    <?php
                    }
                    ?>
                <?php
                }
                if ($_SESSION['tipo'] == 0) {
                ?>
                    <label><b>Institucional</b></label>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    } elseif (isset($_SESSION["numLogin"]) && $_SESSION["tipo"] == 1) {
    ?>
        <!-- Usuário Professor -->
        <div class="cabecalho">
            <button class="voltar" onclick="window.open('../dashboard/', '_self')">❮ Voltar</button>
            <div class="logo">
                <h1>RETEC</h1>
                <?php
                if (isset($_SESSION['instituicao'])) {
                    if ($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian") {
                ?>
                        <label>ETEC Professor André Bogasian</label>
                    <?php
                    } else {
                    ?>
                        <label><?php echo $_SESSION["instituicao"]; ?></label>
                <?php
                    }
                }
            } else {
                ?>
                <!-- sem login -->
                <div class="cabecalho">
                <button class="voltar" onclick="window.open('../', '_self')">❮ Início</button>
                    <div class="logo">
                        <h1>RETEC</h1>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        
        <button id="btn-toggle">
            <div class="menu-toggle">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </div>
        </button>
        <section class="main">
                <div class="info_esquerda">
                    <h1>Filtros</h1>
                    <form action="?" method="GET">
                        <div class="cursos">
                            <h3>Cursos</h3>

                                
                                <?php
                                for ($i = 0; $i <= 15; $i++) {
                                    echo "&nbsp;<input id='checkbox' type='checkbox' title='".$values[$i]."' class='checkbox-round' name='curso[]' value='" . $values[$i] . "'";
                                    $atual = $values[$i];
                                    if (isset($_GET['curso'])) {
                                        for ($j = 0; $j <= 15; $j++) {
                                            for ($k = 0; $k <= (sizeof($_GET['curso']) - 1); $k++) {
                                                if ($atual == $_GET['curso'][$k]) {
                                                    echo " checked ";
                                                }
                                            }
                                        }
                                    }
                                    echo "> <span>" . $nomes[$i] . "</span><br>";
                                }
                                ?>
                        </div>
                        <div class="instituicao">
                            <h3>Instituição</h3>
                            <?php
                            for ($i = 0; $i <= 2; $i++) {
                                echo "&nbsp;<input type='checkbox' class='checkbox-round' title='".$valores[$i]."' name='instituicao[]' value='" . $valores[$i] . "'";
                                $atual = $valores[$i];
                                if (isset($_GET['instituicao'])) {
                                    for ($j = 0; $j <= 3; $j++) {
                                        for ($k = 0; $k <= (sizeof($_GET['instituicao']) - 1); $k++) {
                                            if ($atual == $_GET['instituicao'][$k]) {
                                                echo " checked ";
                                            }
                                        }
                                    }
                                }
                                echo ">";
                                if ($instituicoes[$i] == "ETEC Professor Andre Bogasian") {
                                    echo "<span>" . " ETEC Professor André Bogasian" . "</span> <br>";
                                } else {
                                    echo "<span>" . $instituicoes[$i] . "</span> <br>";
                                }
    
                            }
                            ?>
                        </div>
                        <div class="ano-publicacao">
                            <h3>Ano de Publicação</h3>
                            <?php
                            if (isset($_GET['ano1'])) {
                            ?>
                                    De <input type="number" name="ano1" class="ano_inp" min="1911" max="2021" value="<?php echo $_GET['ano1']; ?>">
                                <?php
                            }
                            if (isset($_GET['ano2'])) {
                                ?>
                                    até <input type="number" name="ano2" class="ano_inp" min="1911" max="2022" value="<?php echo $_GET['ano2']; ?>">
                                <?php
                            } else {
                                ?>
                                De <input type="number" name="ano1" class="ano_inp" min="1911" max="2021"> até <input type="number" name="ano2" class="ano_inp" min="2009" max="2022">
                            <?php
                            }
                            ?>
                        </div>
            
                        <div class="actions-btn">
                            <input type="submit" class="btn_filtrar" value="Filtrar" />
                            <input type="button" class="btn_filtrar" id="lp_filtros" onclick="window.open('../projetos/', '_self')" value="Limpar Filtros" />
                        </div>
                    </form>
                </div>
                
                
                
                <div class="info_direita">
                    <form action="?" method="GET">
                            <div class="content-pesquisa">
                            <div class="pesquisa">
                                <input type="text" class="input_pesquisar" name="search" id="btn" title="Procure pelos melhores TCCs do CPS" placeholder="Pesquisar" autocomplete="off" required/>
                                <button type="reset" class="apagar"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <button type="submit" class="btn_pesquisar" id="ico">
                                    <i class="fa fa-search" alt="pes" title="Pesquisar"></i>
                                </button>
                            </div>
                            </div>
                        </form>
                        <?php
                        if ($encontrados == 1) {
                        ?>
                            <div class="result">
                                <h2>Encontramos <?php echo $encontrados; ?> projetos...</h2>
                            </div>
                        <?php
                        } elseif ($encontrados > 1) {
                        ?>
                            <div class="result">
                                <h2>Encontramos <?php echo $encontrados; ?> projetos...</h2>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="result">
                                <h2>Não foi encontrado nenhum projeto com a sua pesquisa...</h2>
                            </div>
                        <?php
                        }
                        ?>
                        
                    <div class="content-blocos">
                        <div class="blocos">
                            <?php
                            foreach ($result as $tcc) {
                            ?>
                                <div class="bloco">
                                    <a href="../projeto/?tcc=<?php echo $tcc["codigo_r"]; ?>" class="link">
                                        <div class="zoom">
                                            <?php
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($tcc['foto']) . '"';
                                            echo "/>";
                                            ?>
                                        </div>
                                        <div class="content-bloco">
                                            <div class="titulo" title="<?php echo $tcc["nome"]; ?>">
                                                <h3><?php echo $tcc["nome"]; ?></h3>
                                            </div>
                                            <div class="conteudo" title="<?php echo $tcc["resumo"]; ?>">
                                                <p><?php echo $tcc["resumo"]; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <div class="topo">
                <a href="#top">
                    <button type="button" class="icon-topo">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    </button>
                </a>
            </div>
        </section>

        <script src="../js/btn-top-projetos.js"></script>
        <script src="../js/mostrarFiltro.js"></script>
</body>
</html>