<?php
    session_start();
    if(!isset($_SESSION["numLogin"])){
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
        <link href="../css/cad.css" rel="stylesheet">
        <title>Retec - Adicionar</title>
    </head> 

    <body>
        <div class="cabecalho"> 
            <button class="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
            <div class="bts">
                <a id="add">Adicionar</a>
                <a id="ed" href="../editar/">Editar</a>
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
            <h2 class="center" id="lbl">Adicionar Projeto</h2>
            <form action="../../rotas/validacaoRepositorio.php" method="POST" enctype="multipart/form-data">

                <label for="nome"><b>Nome</b></label>
                <br>
                <input type="text" class="inp_txt" name="nome" placeholder="Nome do TCC" min="3" max="64" required>
                <br><br>

                <label for="prof_orientador"><b>Professor Orientador</b></label>
                <br>
                <input type="text" name="prof_orientador" class="inp_txt" min="8" max="64" placeholder="Nome" required/>
                <br><br>

                <label for="prof_coorientador"><b>Professor Co-orientador</b></label>
                <br>
                <input type="text" name="prof_corientador" class="inp_txt" min="8" max="64" placeholder="Nome" required/>
                <br><br>

                <label for="membros"><b>Membros do Grupo</b></label>
                <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
                <input type="text" name="membros_grupo" class="inp_txt" min="8" max="564" placeholder="Ex: Alexandre Lima, Luiz Henrique, Carlos Alberto" required/>
                <br><br>

                <label for="membros"><b>Membros da Banca</b></label>
                <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
                <input type="text" name="membros_banca" class="inp_txt" min="8" max="564" placeholder="Ex: Regina Santos, Marcello Zanfra, Thiago" required/>
                <br><br>

                <label for="curso"><b>Curso</b></label>
                <br>
                <select class="inp_txt" name="curso" min="8" max="64" id="slct">
                </select>
                <br><br>

                <label for="ano"><b>Ano de Conclusão</b></label>
                <br>
                <input type="number" class="inp_txt" name="ano" placeholder="Ano" min="2008" max="2021" required>
                <br><br>

                <label for="mencao"><b>Menção</b></label>
                <br>
                <select class="inp_txt" name="mencao" id="slct">    
                <h3>Curso - ETIM</h3>
                    <option value="mb">MB</option>
                    <option value="b">B</option>
                    <option value="r">R</option>
                    <option value="i">I</option>
                </select>
                <br><br>

                <label for="resumo"><b>Resumo</b></label>
                <br>
                <textarea type="text" class="area_txt" name="resumo" placeholder="Trecho do PDF (Resumo)" required></textarea>
                <br><br>

                <label for="abstract"><b>Abstract</b></label>
                <br>
                <textarea type="text" class="area_txt" name="abstract" placeholder="Trecho do PDF (Abstract)" required></textarea>
                <br><br>

                <label for="pa_ch"><b>Palavras-chave</b></label>
                <br>
                <textarea type="text" class="area_txt" name="pa_ch" placeholder="Trecho do PDF (Palavras-chave)" required></textarea>
                <br><br>

                <label for="key_words"><b>Key Words</b></label>
                <br>
                <textarea type="text" class="area_txt" name="key_words" placeholder="Trecho do PDF (Key Words)" required></textarea>
                <br><br>

                <label for="data_ap"><b>Data de Apresentação</b></label>
                <br>
                <input type="date" class="inp_txt" name="data_ap" min="4" max="256" id="dt_ap" required>
                <br><br>

                <div class="arquivos">
                <h3>Arquivos</h3>
                    <p>
                        <label>Upload PDF: </label><input type="file" name="pdf" value="" accept="application/pdf"/>
                    </p>
                    <p>    
                        <label>Upload Projeto Completo(.zip): </label><input type="file" name="zip" accept=".zip,.rar,.7zip"/>
                    </p>
                    <p>    
                        <label>Upload Foto Principal: </label><input type="file" name="foto" accept="image/jpeg,image/jpg,image/png,image/img"/>
                    </p>
                </div>
                <input type="text" name="instituicao" value="<?php echo $_SESSION['instituicao']; ?>" hidden/>
                <br>

                <input type="submit" class="cadastrar" id="sub_box" value="Adicionar Projeto"/>
            </form>
        </div>
        <script>
            materias = `<?php echo $_SESSION['materias'];?>`;
            materias = materias.split(";");
            slct = document.getElementById("slct");

            for(i=0; i<=(materias.length-1); i++){
                option = document.createElement("option");
                option.text = materias[i];
                option.value = materias[i];
                slct.appendChild(option);
                console.log(materias[i]);
            }
        </script>
    </body>
</html>