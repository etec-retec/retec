<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../../../erro/401.php");
    exit;
}

$cod = $_GET['tcc'];
include "../../../conexao/conexao.inc";
$query = "SELECT * FROM repositorio WHERE codigo_r = '$cod'";
$result = mysqli_query($conexao, $query);
while ($elemento = mysqli_fetch_row($result)) {
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
}

if ($id_professor != $_SESSION['codigo_u']) {
    header("location: ../../../erro/401.php");
}

if ($_SESSION['instituicao'] != $instituicao) {
    header("location: ../../../erro/401.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../loader/loading.css">
    <script type="text/javascript" src="../../../loader/loading.js"></script>
    <link href="../../../css/cad.css" rel="stylesheet">
    <link href="../../../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>Retec - Editar</title>
</head>

<body>
    <div class="preload">
        <span class="load"></span>
    </div>
    <div class="cabecalho">
        <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
        <h1 class="logo">RETEC</h1>
        <?php
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

    </div>

    <div class="center">
        <form action="../../../model/editarRepositorio.php" method="POST" enctype="multipart/form-data" class="form">
            <h2 class="center" id="lbl">Editar: <br><?php echo $nome; ?></h2>

            <label for="nome"><b>Nome</b></label>
            <input type="text" class="inp_txt" name="nome" placeholder="Nome do TCC" value="<?php echo $nome; ?>" min="3" max="64" required>
            
            <label for="prof_orientador"><b>Professor Orientador</b></label>
            <input type="text" name="prof_orientador" class="inp_txt" min="8" max="64" value="<?php echo $prof_orientador; ?>" placeholder="Nome" required />
            
            <label for="prof_coorientador"><b>Professor Co-orientador</b></label>
            <input type="text" name="prof_corientador" class="inp_txt" min="8" max="64" value="<?php echo $prof_corientador; ?>" placeholder="Nome" required />
        
            <label for="membros"><b>Membros do Grupo</b></label>
            <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
            <input type="text" name="membros_grupo" class="inp_txt" value="<?php echo $membros_grupo; ?>" min="8" max="564" placeholder="Ex: Alexandre Lima, Luiz Henrique, Carlos Alberto" required />
            

            <label for="membros"><b>Membros da Banca</b></label>
            <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
            <input type="text" name="membros_banca" class="inp_txt" value="<?php echo $membros_banca; ?>" min="8" max="564" placeholder="Ex: Regina Santos, Marcello Zanfra, Thiago" required />
            

            <label for="curso"><b>Curso</b></label>
            <select class="inp_txt" name="curso" min="8" max="64" id="slct">
            </select>
        
            <label for="ano"><b>Ano de Conclusão</b></label>
            <input type="number" class="inp_txt" name="ano" value="<?php echo $ano; ?>" placeholder="Ano" min="2021" max="2022" id="ano" required>
            
            <label for="mencao"><b>Menção</b></label>
            <select class="inp_txt" name="mencao" id="slct_menc">
                <h3>Curso - ETIM</h3>
                <option value="mb">MB</option>
                <option value="b">B</option>
                <option value="r">R</option>
                <option value="i">I</option>
            </select>
            

            <label for="resumo"><b>Resumo</b></label>
            <textarea type="text" class="area_txt res" name="resumo" placeholder="Trecho do PDF (Resumo)" required><?php echo $resumo; ?></textarea>

            <label for="abstract"><b>Abstract</b></label>
            <textarea type="text" class="area_txt res" name="abstract" placeholder="Trecho do PDF (Abstract)" required><?php echo $abstract; ?></textarea>

            <label for="pa_ch"><b>Palavras-chave</b></label>
            <textarea type="text" class="area_txt" name="pa_ch" placeholder="Trecho do PDF (Palavras-chave)" required><?php echo $pa_ch; ?></textarea>

            <label for="key_words"><b>Key Words</b></label>
            <textarea type="text" class="area_txt" name="key_words" placeholder="Trecho do PDF (Key Words)" required><?php echo $key_words; ?></textarea>

            <label for="data_ap"><b>Data de Apresentação</b></label>
            <input type="date" class="inp_txt" name="data_ap" value="<?php echo $data_ap; ?>" min="4" max="256" id="dt_ap" required>

            <input type="text" value="<?php echo $codigo; ?>" name="id" hidden />
            <div class="arquivos">
                <h3 style="margin-bottom:0;">Substituir Arquivos</h3>
                <p style="font-size:12px; margin-top:0; color:#800;">Caso deseje manter os arquivos anteriores, ignore os campos abaixo.</p>
                <p>
                    <label><b>Substituir</b> PDF: </label><input type="file" name="pdf" value="" accept="application/pdf" />
                </p>
                <p>
                    <label><b>Substituir</b> Projeto Completo(.zip): </label><input type="file" name="zip" value="" accept=".zip,.rar,.7zip" />
                </p>
                <p>
                    <label><b>Substituir</b> Foto Principal: </label><input type="file" name="foto" value="" accept="image/jpeg,image/jpg,image/png,image/img" />
                </p>
            </div>
            <input type="text" name="instituicao" value="<?php echo $_SESSION['instituicao']; ?>" hidden />
            <input type="text" id="to_js1" value="<?php echo $curso; ?>" hidden />
            <input type="text" id="to_js2" value="<?php echo $mencao; ?>" hidden />
            

            <input type="submit" class="cadastrar" id="sub_box" value="Editar Projeto" />
        </form>
    </div>
    <script>
        materias = `<?php echo $_SESSION['materias']; ?>`;
        materias = materias.split(";");

        slct = document.getElementById("slct");
        input = document.getElementById("to_js1");
        atual = input.value;

        slct_menc = document.getElementById("slct_menc");
        input_menc = document.getElementById("to_js2");
        slct_menc.value = input_menc.value;

        for (i = 0; i <= (materias.length - 1); i++) {
            option = document.createElement("option");
            option.text = materias[i];
            option.value = materias[i];
            if (materias[i] == atual) {
                option.selected = 'selected';
            }

            slct.appendChild(option);
            console.log(materias[i]);
        }

        $(function () {
            $( "#ano" ).change(function() {
                var max = parseInt($(this).attr('max'));
                var min = parseInt($(this).attr('min'));
                if ($(this).val() > 2021)
                {
                    $(this).val(2021);
                }
                else if ($(this).val() < 1911)
                {
                    $(this).val(1911);
                }       
            }); 
        });
    </script>
</body>

</html>