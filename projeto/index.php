<meta charset="UTF-8">
<?php
session_start();
$id = $_GET["tcc"];

include "../conexao/conexao.inc";
$query = "SELECT * FROM repositorio WHERE codigo_r = '$id'";
$resultado = mysqli_query($conexao, $query);
if (mysqli_affected_rows($conexao) == 0) {
    header("Location: ../erro/401.php");
} else {
    while ($elemento = mysqli_fetch_row($resultado)) {
        $codigo = $elemento[0];
        $nome = $elemento[1];
        $prof_orientador = $elemento[2];
        $prof_corientador = $elemento[3];
        $membros_grupo = $elemento[4];
        $membros_banca = $elemento[5];
        $curso = $elemento[6];
        $ano = $elemento[7];
        $mencao = $elemento[8];
        $resumo = $elemento[9];
        $abstract = $elemento[10];
        $pa_ch = $elemento[11];
        $key_words = $elemento[12];
        $data_ap = $elemento[13];
        $instituicao = $elemento[14];
        $id_professor = $elemento[15];
        $data_add = $elemento[16];
        $data_att = $elemento[17];
        $foto = $elemento[18];
        $pdf = $elemento[19];
        $zip = $elemento[20];
    }
}

if ($id_professor != 0) {
    $query_prof = "SELECT nome FROM usuario WHERE codigo_u = '$id_professor'";
    $res = mysqli_query($conexao, $query_prof);
    while ($result = mysqli_fetch_assoc($res)) {
        $nome_professor = $result['nome'];
    }

    if (mysqli_affected_rows($conexao) == 0) {
        $nome_professor = $instituicao;
        if ($nome_professor == "ETEC Professor Andre Bogasian") {
            $nome_professor = "ETEC Professor André Bogasian";
        }
    }
} else {
    $nome_professor = $instituicao;
    if ($nome_professor == "ETEC Professor Andre Bogasian") {
        $nome_professor = "ETEC Professor André Bogasian";
    }
}

if ($instituicao == "ETEC Professor Andre Bogasian") {
    $instituicao = "ETEC Professor André Bogasian";
}

$Add_dia = substr($data_add, 8, 2);
$mesNumeric = substr($data_add, 5, 2);
$Add_ano = substr($data_add, 0, 4);
$Add_mes = defineMes($mesNumeric);
$Add_horario = substr($data_add, 11, 5);

if ($data_att) {
    $Att_dia = substr($data_att, 8, 2);
    $mesNumeric = substr($data_att, 5, 2);
    $Att_ano = substr($data_att, 0, 4);
    $Att_mes = defineMes($mesNumeric);
    $Att_horario = substr($data_att, 11, 5);
}

function defineMes($mes)
{
    if ($mes == "01") {
        return "Janeiro";
    } elseif ($mes == "02") {
        return "Fevereiro";
    } elseif ($mes == "03") {
        return "Março";
    } elseif ($mes == "04") {
        return "Abril";
    } elseif ($mes == "05") {
        return "Maio";
    } elseif ($mes == "06") {
        return "Junho";
    } elseif ($mes == "07") {
        return "Julho";
    } elseif ($mes == "08") {
        return "Agosto";
    } elseif ($mes == "09") {
        return "Setembro";
    } elseif ($mes == "10") {
        return "Outubro";
    } elseif ($mes == "11") {
        return "Novembro";
    } elseif ($mes == "12") {
        return "Dezembro";
    }
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
    <link rel="stylesheet" href="../loader/loading.css">
    <script type="text/javascript" src="../loader/loading.js"></script>

    <link href="../css/projeto.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>Retec - Projeto</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>

    <?php
    if (isset($_GET['criado'])) {
    ?>
        <div class="marker">Projeto criado com sucesso!</div>
    <?php
    } elseif (isset($_GET['editado'])) {
    ?>
        <div class="marker">Projeto editado com sucesso!</div>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION["numLogin"])) {
    ?>
        <button class="voltar" id="voltar" onclick="window.open('../projetos/', '_self')">❮ Voltar</button>
    <?php
    } else {
    ?>
        <button class="voltar" id="voltar" style="width: 150px;" onclick="window.open('../projetos/', '_self')">❮ Outros Projetos</button>
    <?php
    }
    ?>

    <div class="container">
        <div class="esquerda">

            <div class="foto" title="Banner do grupo">
                <?php
                echo '<img src="data:image/jpeg;base64,' . base64_encode($foto) . '"/>';
                ?>
            </div>
            <div class="caixa">

                <div class="orientadores">

                    <label><b>Prof. Orientador: </b> <br></label><?php echo $prof_orientador; ?><br>
                    <?php
                    if ($prof_corientador != "") {
                    ?>
                        <label><b>Prof. Coorientador: </b><br></label> <?php echo $prof_corientador; ?>
                    <?php
                    }
                    ?>
                </div>

                <label><b>Membros: </b></label>
                <ul id="list1">

                </ul>
                </p>
                <p>
                    <label><b>Banca: </b></label>
                <ul id="list2">
                </ul>
                </p>
                <p>
                    <label><b>Escola: </b></label><?php echo $instituicao; ?>
                </p>
                <p>
                    <label><b>Curso: </b></label><?php echo $curso; ?>
                </p>
                <p>
                    <label><b>Data de Apresentação: </b></label><span id="data">111</span>
                </p>
                <p>
                    <label><b>Ano de Conclusão: </b></label> <?php echo $ano; ?>
                </p>
                <p>
                    <label><b>Menção: </b></label> <span style="text-transform:uppercase;"><?php echo $mencao; ?></span>
                </p>
            </div>
        </div>

        <div class="direita">
            <div class="info_adicionais" id="info_adicionais" title="Dados sobre quando e quem adicionou este trabalho">
                <p>Adicionado por <?php echo $nome_professor . " em " . $Add_dia . " de " . $Add_mes . " de " . $Add_ano . " às " . $Add_horario; ?> </p>
                <?php
                if ($data_att) {
                ?>
                    <p>Atualizado <?php echo "em " . $Att_dia . " de " . $Att_mes . " de " . $Att_ano . " às " . $Att_horario; ?><b></b></p>
                <?php
                }
                ?>
            </div>
            <h1 style="text-transform:none"><?php echo $nome; ?></h1>
            <h2>Resumo</h2>
            <div class="abstract" title="Breve resumo sobre o que se trata este trabalho">
                <?php echo $resumo; ?>
            </div>

            <h2>Abstract</h2>
            <div class="abstract" title="Breve resumo em inglês sobre o que se trata este trabalho">
                <?php echo $abstract; ?>
            </div>

            <h2>Palavras-chave</h2>
            <div class="abstract" title="Palavras chaves do TCC">
                <?php echo $pa_ch; ?>
            </div>

            <h2>Key Words</h2>
            <div class="abstract" title="Palavras chaves do TCC em inglês">
                <?php echo $key_words; ?>
            </div>

            <h2>Downloads</h2>
            <div class="downloads">
                <p>
                    <label>Artigo: </label><br>
                    <?php
                    echo "<a download='artigo.pdf' href='data:application/pdf;base64," . base64_encode($pdf) . "'> PDF</a>";
                    ?>
                </p>
                <?php
                if ($zip != "") {
                ?>
                    <p>
                        <label>Projeto Completo(.zip): </label><br>
                        <?php
                        echo "<a download='tcc.rar' href='data:application/zip;base64," . base64_encode($zip) . "'> ZIP</a>";
                        ?>
                    </p>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <input type="text" value="<?php echo $membros_grupo; ?>" id="lst1" hidden />
    <input type="text" value="<?php echo $membros_banca; ?>" id="lst2" hidden />
    <script>
        ul = document.getElementById("list1");
        ul2 = document.getElementById("list2");

        membros_grupo = document.getElementById("lst1").value;
        membros_grupo = membros_grupo.split(',');

        membros_banca = document.getElementById("lst2").value;
        membros_banca = membros_banca.split(',');

        for (i = 0; i <= (membros_grupo.length - 1); i++) {
            li = document.createElement("li");
            li.textContent = membros_grupo[i];
            ul.appendChild(li);
        }

        for (i = 0; i <= (membros_banca.length - 1); i++) {
            li = document.createElement("li");
            li.textContent = membros_banca[i];
            ul2.appendChild(li);
        }

        data = "<?php echo $data_ap; ?>"
        data = data.split("-");
        nova_data = data[2] + '/' + data[1] + '/' + data[0];
        document.getElementById("data").textContent = nova_data;
    </script>

    <?php
    if (isset($_GET['criado'])) {
    ?>
        <script>
            elementoA = document.getElementById("voltar");
            elementoB = document.getElementById("info_adicionais");
            elementoA.style.marginTop = "70px";
            elementoB.style.marginTop = "70px";
        </script>
    <?php
    }
    ?>
</body>

</html>