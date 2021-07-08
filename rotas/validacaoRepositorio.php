<?php 

    if(isset($_POST['turma']) && isset($_POST['curso']) && isset($_POST['ano']) && isset($_POST['nome']) 
    && isset($_POST['resumo']) && isset($_POST['autores']) && isset($_POST['orientadores']) && isset($_POST['nota'])){
        echo $turma = filter_input(INPUT_POST, 'turma', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $autores = filter_input(INPUT_POST, 'autores', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $orientadores = filter_input(INPUT_POST, 'orientadores', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        echo $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    $null = NULL;

    include "../class/classR.php";
    $repositorio = new Repositorio();
    $repositorio->setTurma($turma);
    $repositorio->setCurso($curso);
    $repositorio->setAno($ano);
    $repositorio->setNome($nome);
    $repositorio->setResumo($resumo);
    $repositorio->setAutores($autores);
    $repositorio->setNota($nota);
    $repositorio->setOrientadores($orientadores);
    $repositorio->setArquivos($null);
    $repositorio->atualizaBD_R();

?>