<!-- <?php
    // session_start();
    // if($_SESSION["numLogin"] != $_GET["access"]){
    //     echo "
    //     <center>
    //     <br><br><br><br><br><br>
    //         <h1>Acesso negado!</h1>
    //         <br>
    //         <a href='../login/index.php'>Entrar</a>
    //     </center>
    //     ";
    //     exit;
    // }
?> -->

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
            <button class="voltar">❮ Voltar</button>
            <div class="bts">
                <a id="add">Adicionar</a>
                <a id="rem"href="remover.php">Remover</a>
                <a id="ed"href="editar.php">Editar</a>
            </div>
            <h1 class="logo">RETEC</h1>
        </div>

        <div class="center">
            <h2 class="center">Adicionar Projeto</h2>
            <form action="../../rotas/ .php?<?php echo $_SESSION["numLogin"];?>" method="POST">

                <label for=""><b>Professor Orientador</b></label>
                <br>
                <input type="text" name="prof_orientador" class="inp_txt" placeholder="Nome"/>
                <br><br>

                <label for="curso">Curso</label>
                <br>
                <select name="curso">
                    <option>Desenvolvimento de Sistemas</option>
                    <option>Química</option>
                    <option>Nutrição</option>
                    <option>Meio Ambiente</option>
                </select>
                <br><br>
                <label for="ano">Ano</label>
                <br>
                <input type="number" name="ano" placeholder="Ano" min="2000" max="2099" required>
                <br><br>
                <label for="nome">Nome</label>
                <br>
                <input type="text" name="nome" placeholder="Nome" min="3" max="64" required>
                <br><br>
                <label for="resumo">Resumo</label>
                <br>
                <textarea type="text" name="resumo" placeholder="Resumo" required></textarea>
                <br><br>
                <label for="autores">Autores</label>
                <br>
                <input type="text" name="autores" placeholder="Autores" min="4" max="256" required>
                <br><br>
                <label for="turma">Orientadores</label>
                <br>
                <input type="text" name="orientadores" placeholder="Orientadores" min="4" max="128" required>
                <br><br>
                <label for="turma">Nota</label>
                <br>
                <input type="text" name="nota" placeholder="Nota" min="1" max="2" required>
                <br><br>
                <label for="arquivos">Arquivos</label>
                <br>
                <input type="file" name="arquivos" placeholder="Arquivos" enctype="multipart/form-data">
                <br><br>
                <input type="submit" value="Cadastrar">

            </form>
        </div>
    </body>
</html>