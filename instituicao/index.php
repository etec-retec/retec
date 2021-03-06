<?php
session_start();

if (isset($_SESSION["codigo_u"])) {
    unset($_SESSION["codigo_u"]);
} else if (isset($_SESSION["nome"])) {
    unset($_SESSION["nome"]);
} else if (isset($_SESSION["validado"])) {
    unset($_SESSION["validado"]);
} else if (isset($_SESSION["rg"])) {
    unset($_SESSION["rg"]);
} else if (isset($_SESSION["matricula"])) {
    unset($_SESSION["matricula"]);
}

if (!isset($_SESSION["numLogin"])) {
    header("location: ../erro/401.php");
    exit;
}

if ($_SESSION['tipo'] != 0) {
    header("location: ../erro/401.php");
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
    <link rel="stylesheet" href="../loader/loading.css">
    <script type="text/javascript" src="../loader/loading.js"></script>
    <link href="../css/instituicao.css" rel="stylesheet">
    <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <?php
    if ($_SESSION['instituicao'] == "ETEC Professor Andre Bogasian") {
    ?>
        <title>Retec - ETEC Professor André Bogasian</title>
    <?php
    } else {
    ?>
        <title>Retec - <?php echo $_SESSION["instituicao"]; ?></title>
    <?php
    }
    ?>
</head>

<body>
    <div class="preload">
        <span class="load"></span>
    </div>

    <div class="cabecalho" id="cent">
        <button class="voltar" id="certeza">❮ Sair</button>
        <?php
        if ((isset($_SESSION['not']) && $_SESSION['not'] > 0)) {
        ?>
            <img src="../assets/img/notTrue.png" class="notificacao" id="notificacao" />
            <div class="boxNot" id="boxNot">
                <h4>Há um novo pedido de verificação!</h4>
                <hr>
                <p><b>Nome: </b><?php echo $_SESSION["notNome"]; ?></p>
                <p><b>Matrícula: </b><?php echo $_SESSION["notMatricula"]; ?></p>
                <p><b>RG: </b><?php echo $_SESSION["notRg"]; ?></p>
                <p><b>E-mail: </b><?php echo $_SESSION["notEmail"]; ?></p>
                <div class="content-btnBox">

                    <form action="../model/verificacao.php" method="POST">
                        <input type="text" name="rg" style="display:none" value="<?php echo $_SESSION["notRg"]; ?>" />
                        <input type="text" name="matricula" style="display:none" value="<?php echo $_SESSION["notMatricula"]; ?>" />
                        <input type="text" name="conf" style="display:none;" value="1" />
                        <button class="btnBox" id="ver">Aceitar</button>
                    </form>

                    <form action="../model/verificacao.php" method="POST">
                        <input type="text" name="rg" style="display:none" value="<?php echo $_SESSION["notRg"]; ?>" />
                        <input type="text" name="matricula" style="display:none" value="<?php echo $_SESSION["notMatricula"]; ?>" />
                        <input type="text" name="conf" style="display:none" value="0" />
                        <button class="btnBox" id="neg">Negar</button>
                    </form>
                </div>

            </div>
            <script>
                elementoA = document.getElementById("boxNot");
                elementoA.style.marginTop = "150px";
            </script>
        <?php
        } else {
        ?>
            <img src="../assets/img/not.png" class="notificacao" id="notificacao" />
            <div class="boxNot" id="boxNot">
                <h4>Não há nenhuma notificação!</h4>
            </div>
        <?php
        }
        ?>
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
            <label class="institucional">Institucional</label>
        </div>
    </div>

    <div class="corpo">

        <div class="content">
            <h1 class="cap"><?php echo $_SESSION["instituicao"]; ?></h1>

            <div class="opcoes">
                <a id="p" href="../projetos/">Projetos</a>
                <a href="editar/">Projetos da Instituição</a>
                <!-- <a id="a" href="adicionar/">Adicionar Projeto</a>
                <a id="e" href="editar/">Editar Projeto</a>
                <a id="r" href="remover/">Remover Projeto</a> -->
                <a id="m" href="lista-de-professores/">Lista de Professores</a>
            </div>
        </div>
        <div class="img">
            <img src="../assets/ilustrations/dashboard.svg" alt="">
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/voltar.js"></script>
    
    <script>
        var img = document.getElementById('notificacao');
        var box = document.getElementById("boxNot");
        var vezes = 0
        imgm = 0
        <?php
        if (isset($_SESSION['not'])) {
        ?>
            verificacao = <?php echo $_SESSION['not']; ?>
        <?php
        } else {
        ?>
            verificacao = 0;
        <?php
        }
        ?>

        if (verificacao == 1) {
            imgm = '../assets/img/notTrue.png'
            imgmHover = '../assets/img/notHoverTrue.png'
        } else {
            imgm = '../assets/img/not.png'
            imgmHover = '../assets/img/notHover.png'
        }

        img.onmouseout = function() {
            this.src = imgm;
        };

        img.onmouseover = function() {
            this.src = imgmHover;
        };

        img.onclick = function() {
            vezes += 1;
            if (vezes & 1) {
                box.style.display = "block";
            } else {
                box.style.display = "none";
            }
            imgm = '../assets/img/not.png'
            imgmHover = '../assets/img/notHover.png'
        };
    </script>
</body>

</html>