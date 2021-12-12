<?php
session_start();
if (!isset($_SESSION["numLogin"])) {
    header("location: ../../erro/401.php");
    exit;
}

$inst = $_SESSION['instituicao'];
include "../../conexao/conexao.inc";

$query = "SELECT * FROM usuario WHERE instituicao LIKE '%$inst%'";
$result = mysqli_query($conexao, $query);

mysqli_close($conexao);
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

    <link rel="stylesheet" href="../../loader/loading.css">
    <script type="text/javascript" src="../../loader/loading.js"></script>

    <link href="../../css/lista.css" rel="stylesheet">
    <link href="../../css/table.css" rel="stylesheet">
    <link href="../../assets/img/icon.ico" type="image/x-icon" rel="icon" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/desvincular-prof.js"></script>

    <title>Retec - Lista de Professores</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>
    <?php
    if (isset($_GET['success'])) {
    ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Professor desvinculado com sucesso',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php
    }
    ?>
    <div class="cabecalho">
        <button class="voltar" id="voltar" onclick="window.open('../', '_self')">❮ Voltar</button>
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
            <label class="lblNome"><b>| Institucional</b></label>

        </div>
    </div>

    <div class="center">
        <table id="customers">
            <tr id="especial">
                <th>Nome</th>
                <th>E-mail</th>
                <th>E-mail de Recuperação</th>
                <th>Matrícula</th>
                <th>RG</th>
                <th>Desvincular</th>
            </tr>

            <?php
            foreach ($result as $professor) {
            ?>
                <tr>
                    <td class="table-column">
                        <div class="item"><?php echo $professor["nome"]; ?></div>
                    </td>

                    <td class="table-column">
                        <div class="item"><?php echo $professor["email"]; ?></div>
                    </td>

                    <td class="table-column">
                        <div class="item"><?php echo $professor["email_rec"]; ?></div>
                    </td>

                    <td class="table-column">
                        <div class="item"><?php echo $professor["matricula"]; ?></div>
                    </td>

                    <td class="table-column">
                        <div class="item"><?php echo $professor["rg"]; ?></div>
                    </td>

                    <td class="table-column_ex">
                        <div class="item" id="center">
                            <form id="form-desvin" action="../../model/desvincularProfessor.php" method="POST">

                                <input type="text" name="idProf" value="<?php echo $professor["codigo_u"]; ?>" style="display:none" />

                                <input type="button" onclick="desvincular()" class="fr" style="background-color:#ff6666;color:#fff" value="Desvincular"></input>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <script>
        var currentLocation = window.location;
        if (currentLocation.search.slice(0, 8) == "?success") {
            document.getElementById("voltar").style.marginTop = "80px";
        }
    </script>
</body>

</html>