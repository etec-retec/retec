<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
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
    <link rel="stylesheet" href="../../loader/loading.css">
    <script type="text/javascript" src="../../loader/loading.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="../../css/cad.css" rel="stylesheet">
    <link href="../../css/perfil.css" rel="stylesheet">
    <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>Retec - Adicionar</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <div class="cabecalho">
        <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
        <div class="bts">
            <a id="add">Adicionar</a>
            <a id="rem" href="../remover/">Remover</a>
            <a id="ed" href="../editar/">Editar</a>
        </div>
        <div class="logo">
            
            <h1>RETEC</h1>
            <?php
            if ($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian") {
            ?>
                <label class="lblNome">ETEC Professor André Bogasian</label>
            <?php
            } else {
            ?>
                <label class="lblNome"><?php echo $_SESSION["instituicao"]; ?></label>
            <?php
            }
            ?>
       <label class="lblNome"><b>| Institucional</b></label>
        </div>
    </div>

    <div class="markerRed mk" style="display:none;" id="dadoMsg">O formulário não foi preenchido corretamente!</div>

    <div class="center">
        <h2 class="center" id="lbl">Adicionar Projeto</h2>
        <form class="form" action="../../model/validacaoRepositorio.php" method="POST" enctype="multipart/form-data">

            <label for="nome" id="first"><b>Nome (*)</b></label>
            <input type="text" class="inp_txt" name="nome" placeholder="Nome do TCC" min="3" max="64" required>

            <label for="prof_orientador"><b>Professor Orientador (*)</b></label>
            <input type="text" name="prof_orientador" class="inp_txt" min="8" max="64" placeholder="Nome" required />
           
            <label for="prof_coorientador"><b>Professor Co-orientador</b></label>
            <input type="text" name="prof_corientador" class="inp_txt" min="8" max="64" placeholder="Nome"/>
           
            <label for="membros"><b>Membros do Grupo (*)</b></label>
            <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
            <input type="text" name="membros_grupo" class="inp_txt" min="8" max="564" placeholder="Ex: Alexandre Lima, Luiz Henrique, Carlos Alberto" required />
           

            <label for="membros"><b>Membros da Banca (*)</b></label>
            <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
            <input type="text" name="membros_banca" class="inp_txt" min="8" max="564" placeholder="Ex: Regina Santos, Marcello Zanfra, Thiago" required />
           

            <label for="curso"><b>Curso (*)</b></label>
            <select class="inp_txt" name="curso" min="8" max="64" id="slct">
            </select>

            <label for="ano"><b>Ano de Conclusão (*)</b></label>
            <input type="number" class="inp_txt" name="ano" id="ano" placeholder="Ano" required>

            <label for="mencao"><b>Menção (*)</b></label>
            <select class="inp_txt" name="mencao" id="slct">
                <option value="mb">MB</option>
                <option value="b">B</option>
                <option value="r">R</option>
                <option value="i">I</option>
            </select>

            <label for="resumo"><b>Resumo (*)</b></label>
            <textarea type="text" class="area_txt" name="resumo" placeholder="Trecho do PDF (Resumo)" required></textarea>
        
            <label for="abstract"><b>Abstract (*)</b></label>
            <textarea type="text" class="area_txt" name="abstract" placeholder="Trecho do PDF (Abstract)" required></textarea>

            <label for="pa_ch"><b>Palavras-chave (*)</b></label>
            <textarea type="text" class="area_txt" name="pa_ch" placeholder="Trecho do PDF (Palavras-chave)" required></textarea>
           
            <label for="key_words"><b>Key Words (*)</b></label>          
            <textarea type="text" class="area_txt" name="key_words" placeholder="Trecho do PDF (Key Words)" required></textarea>
           
            <label for="data_ap"><b>Data de Apresentação (*)</b></label>
            <input type="date" class="inp_txt" name="data_ap" min="1911-09-28" max="2021-12-31" id="dt_ap" required>
           
            <div class="arquivos">
                <h3>Arquivos</h3>
                <p>
                    <label>Upload PDF (*): </label><input type="file" name="pdf" value="" accept="application/pdf" required/>
                </p>
                <p>
                    <label>Upload Projeto Completo(.zip): </label><input type="file" name="zip" accept=".zip,.rar,.7zip" />
                </p>
                <p>
                    <label>Upload Foto Principal: </label><input type="file" name="foto" accept="image/jpeg,image/jpg,image/png,image/img" />
                </p>
            </div>
            <input type="text" name="instituicao" value="<?php echo $_SESSION['instituicao']; ?>" hidden />
           

            <input type="submit" class="cadastrar" id="sub_box" value="Adicionar Projeto" />
        </form>
    </div>
    
    <script>
        materias = `<?php echo $_SESSION['materias']; ?>`;
        materias = materias.split(";");
        slct = document.getElementById("slct");

        for (i = 0; i <= (materias.length - 1); i++) {
            option = document.createElement("option");
            option.text = materias[i];
            option.value = materias[i];
            slct.appendChild(option);
            console.log(materias[i]);
        }

        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 13) == "?dadoFaltante") {
            document.getElementById("dadoMsg").style.display = "block";
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