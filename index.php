<?php
    if(session_id() != ''){
        session_destroy();
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" 
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/index.css" rel="stylesheet">
        <title>Retec</title>
    </head>
    <body>
        <div class="actions">
                <button class="btn" id="cad" onclick="window.open('projetos', '_self')">Projetos</button>
                <button class="btn" onclick="window.open('login/index.php', '_self')">Login</button>
                <button class="btn" id="cad" onclick="window.open('cadastro/index.php', '_self')">Cadastrar</button>
        </div>
        <div class="banner">
            <div class="nome">
                <h1>RETEC</h1>
            </div>
            <div class="logo">
                <img src="assets/img/logo.png" width="175px"/>
            </div>
        </div>

        <div class="tec">
            <img id="bnr_img" src="assets/img/bnr3.png"/>
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

        <div class="contato">
            <h2>Entre em contato conosco!</h2>
            <form action="rotas/contato.php" method="POST">
                <label for="nome"><b>Nome</b></label>
                <br>
                <input type="text" class="inp_txt" name="nome" placeholder="Digite aqui..." min="3" max="64" required>
                <br><br>

                <label for="email"><b>E-mail</b></label>
                <br>
                <input type="email" class="inp_txt" name="email" placeholder="exemplo@email.com" min="3" max="64" required>
                <br><br>

                <label for="mensagem"><b>Mensagem</b></label>
                <br>
                <textarea type="text" class="area_txt" name="mensagem" placeholder="Escreva aqui..." required></textarea>
                <br><br>

                <input type="submit" class="enviar" value="Enviar"/>
            </form>
        </div>
        <script>
            // var bnr = document.getElementById("bnr_img");
            // if(( window.innerWidth <= 800 ) && ( window.innerHeight <= 600 )){
            //     alert("TESTE");
            //     brn.src="assets/img/bnr4.png";
            // }
        </script>
    </body>
</html>