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
                <a id="rem" href="../remover/">Remover</a>
                <a id="ed" href="../editar/">Editar</a>
            </div>
            <h1 class="logo">RETEC</h1>
        </div>

        <div class="center">
            <h2 class="center" id="lbl">Adicionar Projeto</h2>
            <form action="../../rotas/ .php?<?php echo $_SESSION["numLogin"];?>" method="POST">

                <label for="nome"><b>Nome</b></label>
                <input type="text" class="inp_txt" name="nome" placeholder="Nome do TCC" min="3" max="64" required>
                <br><br>

                <label for="prof_orientador"><b>Professor Orientador</b></label>
                <br>
                <input type="text" name="prof_orientador" class="inp_txt" placeholder="Nome" required/>
                <br><br>

                <label for="prof_coorientador"><b>Professor Co-orientador</b></label>
                <br>
                <input type="text" name="prof_coorientador" class="inp_txt" placeholder="Nome" required/>
                <br><br>

                <label for="membros"><b>Membros</b></label>
                <p style="font-size:12px; margin-top:0">Separe os integrantes por vírgulas ","</p>
                <input type="text" name="membros" class="inp_txt" placeholder="Ex: Alexandre Lima, Luiz Henrique, Carlos Alberto" required/>
                <br><br>

                <label for="curso"><b>Curso</b></label>
                <br>
                <select class="inp_txt" name="curso" id="slct">    
                    <option value="ds">ETIM - Desenvolvimento de Sistemas</option>
                    <option value="nutricao">ETIM - Nutrição</option>
                    <option value="meioambiente">ETIM - Meio Ambiente</option>
                    <option value="quimica">ETIM - Química</option>
                    <option value="contabilidade">Modular - Contabilidade</option>
                    <option value="seg_trab">Modular - Segurança do Trabalho</option>
                    <option value="nutr_diet">Modular - Nutrição e Dietética</option>
                    <option value="quimica_mod">Modular - Química</option>
                </select>
                <br><br>

                <label for="ano"><b>Ano de Conclusão</b></label>
                <br>
                <input type="number" class="inp_txt" name="ano" placeholder="Ano" min="2021" max="2022" required>
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

                <label for="resumo"><b>Abstract</b></label>
                <br>
                <textarea type="text" class="area_txt" name="abstract" placeholder="Trecho do PDF (Abstract)" required></textarea>
                <br><br>

                <label for="resumo"><b>Palavras-chave</b></label>
                <br>
                <textarea type="text" class="area_txt" name="pa_ch" placeholder="Trecho do PDF (Palavras-chave)" required></textarea>
                <br><br>

                <label for="resumo"><b>Key Words</b></label>
                <br>
                <textarea type="text" class="area_txt" name="key_words" placeholder="Trecho do PDF (Key Words)" required></textarea>
                <br><br>

                <label for="data_ap"><b>Data de Apresentação</b></label>
                <br>
                <input type="date" class="inp_txt" name="data_ap" placeholder="Autores" min="4" max="256" id="dt_ap" required>
                <br><br>

                
                <div class="arquivos">
                <h3>Arquivos</h3>
                    <p>
                        <label>Upload PDF: </label><input type="file" name="pdf" value=""/>
                    </p>
                    <p>    
                        <label>Upload Projeto Completo(.zip): </label><input type="file" name="zip" value=""/>
                    </p>
                    <p>    
                        <label>Upload Foto Principal: </label><input type="file" name="foto" value=""/>
                    </p>
                    <p>    
                        <label>Upload Foto de Capa: </label><input type="file" name="capa" value=""/>
                    </p>
                </div>
                <br>

                <input type="submit" class="cadastrar" id="sub_box" value="Adicionar Projeto"/>
            </form>
        </div>
    </body>
</html>