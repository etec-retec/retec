<?php
session_start();
if (isset($_SESSION['numLogin'])) {
    unset($_SESSION['numLogin']);
}

if (isset($_SESSION)) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="loader/loading.css">
    <script type="text/javascript" src="loader/loading.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link href="css/index.css" rel="stylesheet">
    <link href="assets/img/icon.ico" type="image/x-icon" rel="icon" />
    <title>Retec</title>
</head>

<body>

    <div class="preload">
        <span class="load"></span>
    </div>

    <div class="actions">
        <button class="btn" onclick="window.open('projetos', '_self')"><span>Projetos</span></button>
        <button class="btn" onclick="window.open('login/', '_self')"><span>Login</span></button>
        <button class="btn" id="cad" onclick="window.open('cadastro/', '_self')"><span>Cadastrar Professor</span></button>
    </div>
    <div class="banner">
        <div class="conteudo">
            <h1>RETEC</h1>
            <img src="assets/img/logo.png" width="175px" />
        </div>
    </div>

    <div class="tec">
        <!--este data-anime, serve para a animação da imagem-->
        <img id="tec_img" src="assets/img/bnr3.png" />
    </div>

    <div class="sobre">
        <h2>Sobre o Retec</h2>
        <div class="grid">
            <div class="col">
                <h3>Acessibilidade</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec sapien nulla. Nullam vitae ipsum massa.
                    Ut at semper orci. Aliquam erat volutpat. Vivamus magna orci, mattis et gravida vitae, venenatis et velit.
                    Etiam mi purus, rhoncus vitae arcu eu, laoreet vehicula ante. Cras eget tempor mauris. Etiam diam odio,
                    fringilla quis rutrum et, maximus id est. Quisque a tellus vel nibh blandit accumsan sit amet et massa.
                    Morbi suscipit leo ut tellus consectetur placerat vel nec ex. Donec faucibus sem nec sollicitudin auctor.
                    Duis suscipit risus imperdiet nisi sollicitudin congue. Ut luctus erat quis malesuada volutpat. Proin viverra
                    elit in nulla porttitor, placerat eleifend magna ultricies. Aenean in odio iaculis, egestas sapien dapibus, porta elit.
                </p>
            </div>
            <div class="col">
                <h3>Funcionalidade</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec sapien nulla. Nullam vitae ipsum massa.
                    Ut at semper orci. Aliquam erat volutpat. Vivamus magna orci, mattis et gravida vitae, venenatis et velit.
                    Etiam mi purus, rhoncus vitae arcu eu, laoreet vehicula ante. Cras eget tempor mauris. Etiam diam odio,
                    fringilla quis rutrum et, maximus id est. Quisque a tellus vel nibh blandit accumsan sit amet et massa.
                    Morbi suscipit leo ut tellus consectetur placerat vel nec ex. Donec faucibus sem nec sollicitudin auctor.
                    Duis suscipit risus imperdiet nisi sollicitudin congue. Ut luctus erat quis malesuada volutpat. Proin viverra
                    elit in nulla porttitor, placerat eleifend magna ultricies. Aenean in odio iaculis, egestas sapien dapibus, porta elit.
                </p>
            </div>
            <div class="col">
                <h3>Motivação</h3>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec sapien nulla. Nullam vitae ipsum massa.
                    Ut at semper orci. Aliquam erat volutpat. Vivamus magna orci, mattis et gravida vitae, venenatis et velit.
                    Etiam mi purus, rhoncus vitae arcu eu, laoreet vehicula ante. Cras eget tempor mauris. Etiam diam odio,
                    fringilla quis rutrum et, maximus id est. Quisque a tellus vel nibh blandit accumsan sit amet et massa.
                    Morbi suscipit leo ut tellus consectetur placerat vel nec ex. Donec faucibus sem nec sollicitudin auctor.
                    Duis suscipit risus imperdiet nisi sollicitudin congue. Ut luctus erat quis malesuada volutpat. Proin viverra
                    elit in nulla porttitor, placerat eleifend magna ultricies. Aenean in odio iaculis, egestas sapien dapibus, porta elit.
                </p>
            </div>
        </div>
    </div>
    <!-- Contato -->
    <div class="contato">
        <form class="form" action="model/contato.php" method="POST">
            <h2>Entre em contato conosco!</h2>

            <div class="form-box">
                <label for="nome"><b>Nome</b></label>
                <input type="text" class="inp_txt" name="nome" placeholder="Digite aqui..." min="3" max="64" required>

                <label for="email"><b>E-mail</b></label>
                <input type="email" class="inp_txt" name="email" placeholder="exemplo@email.com" min="3" max="64" required>

                <label for="mensagem"><b>Mensagem</b></label>
                <textarea type="text" class="area_txt" name="mensagem" placeholder="Sua mensagem..." onkeyup="limite_textarea(this.value)" id="texto" data-ls-module="charCounter" maxlength="251" required></textarea>
            </div>

            <div class="av">
                    <span class="aviso">Faça um comentário mais breve para que possamos te ajudar a ter uma melhor experiência.</span>
                </div>
            <div class="limite-caractere">
                <span id="cont">250</span><span>Caracteres restantes</span>
                <input type="submit" class="enviar" value="Enviar" />
            </div>

        </form>
    </div>
</body>

</html>