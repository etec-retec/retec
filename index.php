<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrT</title>
    <?php

        $arquivo = 'arquivo.txt';

        include 'class.php';

        $obj_teste_usuario = new usuario();
        $obj_teste_usuario->setNome('ETEC Osasco II');
        $obj_teste_usuario->setEmail('etec242@etec.sp.gov.br');
        $obj_teste_usuario->setSenha('password');
        $obj_teste_usuario->setTipo('Professor');

        echo $obj_teste_usuario->getNome();
        echo '<hr>';
        echo $obj_teste_usuario->getEmail();
        echo '<hr>';
        echo $obj_teste_usuario->getSenha();
        echo '<hr>';
        echo $obj_teste_usuario->getTipo();
        $obj_teste_usuario->atualizaBD_U();
        $obj_teste_usuario->deletaBD_U();

        echo "<br><br><br><br>";

        $obj_teste_repositorio = new repositorio();
        $obj_teste_repositorio->setTurma('3ºB');
        $obj_teste_repositorio->setCurso('Desenvolvimento de Sistemas');
        $obj_teste_repositorio->setAno('2021');
        $obj_teste_repositorio->setNome('DrT');
        $obj_teste_repositorio->setResumo('Resumão bonitão bem legal');
        $obj_teste_repositorio->setAutores('Nós');
        $obj_teste_repositorio->setOrientadores('Carlos e mais alguém :/');
        $obj_teste_repositorio->setArquivos($arquivo);
        $obj_teste_repositorio->atualizaBD_R();
        $obj_teste_repositorio->deletaBD_R();

        echo $obj_teste_repositorio->getTurma();
        echo '<hr>';
        echo $obj_teste_repositorio->getCurso();
        echo '<hr>';
        echo $obj_teste_repositorio->getAno();
        echo '<hr>';
        echo $obj_teste_repositorio->getNome();
        echo '<hr>';
        echo $obj_teste_repositorio->getResumo();
        echo '<hr>';
        echo $obj_teste_repositorio->getAutores();
        echo '<hr>';
        echo $obj_teste_repositorio->getOrientadores();
        echo '<hr>';



    ?>
</head>
<body>