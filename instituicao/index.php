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
    if($_SESSION['tipo'] != 0){
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
    $_SESSION['not'] = 1;
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
        <link href="css/instituicao.css" rel="stylesheet">
        <title>Retec - <?php echo $_SESSION["instituicao"]; ?></title>
    </head>
    <body>
        <div class="cabecalho" id="teste"> 
            <button class="voltar" onclick="window.open('../index.php', '_self')">❮ Sair</button>
            <?php
                if($_SESSION['not'] > 0){
            ?>
                <img src="../assets/img/notTrue.png" class="notificacao" id="notificacao"/>
                <div class="boxNot" id="boxNot">
                    <h4>Há um novo pedido de verificação!</h4>
                    <hr>
                    <p><b>Nome: </b><?php echo $_SESSION["notNome"];?></p>
                    <p><b>Matrícula: </b><?php echo $_SESSION["notMatricula"];?></p>
                    <p><b>E-mail: </b><?php echo $_SESSION["notEmail"];?></p>
                    <form action="..rotas/verificarProfessor?access=<?php echo $_SESSION["numLogin"];?>" method="POST">
                        <input type="text" style="display:none" value="1">
                        <button class="btnBox">Verificar</button>
                    </form>
                    <form action="..rotas/verificarProfessor?access=<?php echo $_SESSION["numLogin"];?>" method="POST">
                        <input type="text" style="display:none" value="1">
                        <button class="btnBox">Negar</button>
                    </form>
                </div>
            <?php
                }else{
            ?>
                    <img src="../assets/img/not.png" class="notificacao" id="notificacao"/>
            <?php
                }
            ?>
            <h1 class="logo">RETEC</h1>
        </div>

        <div class="corpo">
            <h1 class="cap"><?php echo $_SESSION["instituicao"]; ?></h1>
            <h2 class="access">O que você deseja acessar?</h2>

            <div class="opcoes">
                <a id="p" href="../projetos/index.php?access=<?php echo $_SESSION["numLogin"];?>">Projetos</a>
                <a id="a" href="adicionar/index.php?access=<?php echo $_SESSION["numLogin"];?>">Adicionar Projeto</a>
                <a id="e" href="editar/index.php?access=<?php echo $_SESSION["numLogin"];?>"">Editar Projeto</a>
                <a id="r" href="remover/index.php?access=<?php echo $_SESSION["numLogin"];?>"">Excluir Projeto</a>
                <a id="m" href="">Lista de Professores</a>
            </div>
        </div>

       <script>
            var img = document.getElementById('notificacao');
            var box = document.getElementById("boxNot");
            var vezes = 0
            imgm = 0
            verificacao = <?php echo $_SESSION['not'];?>

            if(verificacao == 1){
                imgm = '../assets/img/notTrue.png'
                imgmHover = '../assets/img/notHoverTrue.png' 
            }else{
                imgm = '../assets/img/not.png'
                imgmHover = '../assets/img/notHover.png' 
            }

            img.onmouseout = function () {
               this.src = imgm;
            };
            
            img.onmouseover = function () {
               this.src = imgmHover;
            };

            img.onclick = function () {
                vezes+=1;
                if(vezes & 1){
                    box.style.display = "block";
                }else{
                    box.style.display = "none";
                }
                imgm = '../assets/img/not.png'
                imgmHover = '../assets/img/notHover.png'
            };
            
                
       </script>
    </body>
</html>