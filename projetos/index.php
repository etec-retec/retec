<?php
    session_start();
    if($_SESSION["numLogin"] != $_GET["access"]){
        echo "
        <center>
        <br><br><br><br><br><br>
            <h1>Acesso negado!</h1>
            <br>
            <a href='../login/index.php'>Entrar</a>
        </center>
        ";
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/verticalBar.css" rel="stylesheet">
        <link href="../css/cadastrarRepositorio.css" rel="stylesheet">
        <title>Retec - Cadastrar</title>
    </head>
    <body>

    <div class="banner">
    
    </div>

    <div class="info esquerda">
        <div class="img">
            <img>
        </div>

    </div>

    <form action="../../rotas/validacaoRepositorio.php?<?php echo $_SESSION["numLogin"];?>" method="POST">
        <label for="turma">Turma</label>
        <br>
        <select name="turma">
            <option>3º B</option>
            <option>3º C-A</option>
            <option>3º C-B</option>
            <option>3º E</option>
            <option>3º F</option>
        </select>
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

    </body>
</html>