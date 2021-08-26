<?php 

    if(isset($_POST['nome']) && isset($_POST['prof_orientador']) && isset($_POST['prof_corientador']) && isset($_POST['membros']) 
    && isset($_POST['curso']) && isset($_POST['ano']) && isset($_POST['mencao']) && isset($_POST['resumo']) && isset($_POST['abstract'])
    && isset($_POST['pa_ch']) && isset($_POST['key_words']) && isset($_POST['data_ap']) && isset($_POST['instituicao'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prof_orientador = filter_input(INPUT_POST, 'prof_orientador', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prof_corientador = filter_input(INPUT_POST, 'prof_corientador', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $membros = filter_input(INPUT_POST, 'membros', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mencao = filter_input(INPUT_POST, 'mencao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $abstract = filter_input(INPUT_POST, 'abstract', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pa_ch = filter_input(INPUT_POST, 'pa_ch', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $key_words = filter_input(INPUT_POST, 'key_words', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data_ap = filter_input(INPUT_POST, 'data_ap', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $instituicao = filter_input(INPUT_POST, 'instituicao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        var_dump($_FILES);

        #FOTO DE PERFIL
        if($imagem = $_FILES['foto']['tmp_name'] != NULL){
            $imagem = $_FILES['foto']['tmp_name'];
            $tamanho = $_FILES['foto']['size'];
            $tipo = $_FILES['foto']['type'];
            $nome_img = $_FILES['foto']['name'];

            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);
        }elseif(!isset($_POST['foto'])){
            $imagem = 'img_padrao.bin';
            $tipo = 'image/png';
            $nome_img = 'padrão';
            $tamanho = filesize('img_padrao.bin');

            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);        
        }

        #PDF
        if($pdf = $_FILES['pdf']['tmp_name'] != NULL){
            $pdf = $_FILES['pdf']['tmp_name'];
            $pdf_tamanho = $_FILES['pdf']['size'];
            $pdf_tipo = $_FILES['pdf']['type'];
            $pdf_arquivos = $_FILES['pdf']['name'];

            $fp = fopen($pdf, "rb");
            $pdf_conteudo = fread($fp, $tamanho);
            $pdf_conteudo = addslashes($conteudo);
            fclose($fp);
        }elseif(!isset($_POST['pdf'])){
            $pdf = 'img_padrao.bin';
            $pdf_tipo = 'image/png';
            $pdf_nome = 'padrão';
            $pdf_tamanho = filesize('img_padrao.bin');

            $fp = fopen($pdf, "rb");
            $pdf_conteudo = fread($fp, $tamanho);
            $pdf_conteudo = addslashes($conteudo);
            fclose($fp);        
        }

        #ZIP
        if($zip = $_FILES['zip']['tmp_name'] != NULL){
            $zip = $_FILES['zip']['tmp_name'];
            $zip_tamanho = $_FILES['zip']['size'];
            $zip_tipo = $_FILES['zip']['type'];
            $zip_arquivos = $_FILES['zip']['name'];

            $fp = fopen($zip, "rb");
            $zip_conteudo = fread($fp, $tamanho);
            $zip_conteudo = addslashes($conteudo);
            fclose($fp);
        }elseif(!isset($_POST['zip'])){
            $zip = 'img_padrao.bin';
            $zip_tipo = 'image/png';
            $zip_nome = 'padrão';
            $zip_tamanho = filesize('img_padrao.bin');

            $fp = fopen($zip, "rb");
            $zip_conteudo = fread($fp, $tamanho);
            $zip_conteudo = addslashes($conteudo);
            fclose($fp);        
        }
    }



?>