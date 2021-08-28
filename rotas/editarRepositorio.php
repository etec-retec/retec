<meta charset="UTF-8">
<?php
    session_start();
    if($_SESSION["numLogin"] != $_GET["access"]){
        header("location: ../erro/401.php");
        exit;
    }

    if(isset($_POST['nome']) && isset($_POST['prof_orientador']) && isset($_POST['prof_corientador']) && isset($_POST['membros_banca']) && isset($_POST['membros_grupo']) 
    && isset($_POST['curso']) && isset($_POST['ano']) && isset($_POST['mencao']) && isset($_POST['resumo']) && isset($_POST['abstract'])
    && isset($_POST['pa_ch']) && isset($_POST['key_words']) && isset($_POST['data_ap']) && isset($_POST['instituicao']) && isset($_POST['id'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prof_orientador = filter_input(INPUT_POST, 'prof_orientador', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prof_corientador = filter_input(INPUT_POST, 'prof_corientador', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $membros_grupo = filter_input(INPUT_POST, 'membros_grupo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $membros_banca = filter_input(INPUT_POST, 'membros_banca', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mencao = filter_input(INPUT_POST, 'mencao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $abstract = filter_input(INPUT_POST, 'abstract', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pa_ch = filter_input(INPUT_POST, 'pa_ch', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $key_words = filter_input(INPUT_POST, 'key_words', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data_ap = filter_input(INPUT_POST, 'data_ap', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $instituicao = filter_input(INPUT_POST, 'instituicao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        #FOTO DE PERFIL
        if($imagem = $_FILES['foto']['tmp_name'] != NULL){
            $imagem = $_FILES['foto']['tmp_name'];
            $foto_tamanho = $_FILES['foto']['size'];
            $foto_tipo = $_FILES['foto']['type'];
            $foto_nome_img = $_FILES['foto']['name'];

            $fp = fopen($imagem, "rb");
            $foto_conteudo = fread($fp, $foto_tamanho);
            $foto_conteudo = addslashes($foto_conteudo);
            fclose($fp);
            $issetFOTO = TRUE;
        }

        #PDF
        if($pdf = $_FILES['pdf']['tmp_name'] != NULL){
            $pdf = $_FILES['pdf']['tmp_name'];
            $pdf_tamanho = $_FILES['pdf']['size'];
            $pdf_tipo = $_FILES['pdf']['type'];
            $pdf_arquivos = $_FILES['pdf']['name'];

            $fp = fopen($pdf, "rb");
            $pdf_conteudo = fread($fp, $pdf_tamanho);
            $pdf_conteudo = addslashes($pdf_conteudo);
            fclose($fp);
            $issetPDF = TRUE; 
        }

        #ZIP
        if($zip = $_FILES['zip']['tmp_name'] != NULL){
            $zip = $_FILES['zip']['tmp_name'];
            $zip_tamanho = $_FILES['zip']['size'];
            $zip_tipo = $_FILES['zip']['type'];
            $zip_arquivos = $_FILES['zip']['name'];

            $fp = fopen($zip, "rb");
            $zip_conteudo = fread($fp, $zip_tamanho);
            $zip_conteudo = addslashes($zip_conteudo);
            fclose($fp);

            $issetZip = TRUE;
        }
    }

    include "../conexao/conexao.inc";
    if(isset($issetFOTO) &&  isset($issetPDF) && isset($issetZip)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', foto = '$foto_conteudo', pdf = '$pdf_conteudo', zip = '$zip_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetFOTO) && isset($issetPDF)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', foto = '$foto_conteudo', pdf = '$pdf_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetFOTO) && isset($issetZip)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', foto = '$foto_conteudo', zip = '$zip_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetPDF) && isset($issetZip)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', pdf = '$pdf_conteudo', zip = '$zip_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetFOTO)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', foto = '$foto_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetPDF)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', pdf = '$pdf_conteudo' WHERE codigo_r='$id'";
    }elseif(isset($issetZip)){
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap', zip = '$zip_conteudo' WHERE codigo_r='$id'";
    }else{
        $query = "UPDATE repositorio SET nome = '$nome', prof_orientador = '$prof_orientador', prof_corientador = '$prof_corientador', membros_grupo ='$membros_grupo', 
        membros_banca = '$membros_banca', curso = '$curso', ano = '$ano', mencao = '$mencao', resumo = '$resumo', abstract = '$abstract', pa_ch = '$pa_ch', 
        key_words = '$key_words', data_ap = '$data_ap' WHERE codigo_r='$id'";
    }
    mysqli_query($conexao, $query);
    mysqli_close($conexao);
    $nl = $_GET['access'];
    header("Location: ../dashboard/index.php?access=$nl&edit=TRUE");

?>