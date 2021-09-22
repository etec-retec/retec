<meta charset="UTF-8">
<?php
    session_start();

    $id = $_GET["tcc"];
    
    include "../conexao/conexao.inc";
    $query = "SELECT * FROM repositorio WHERE codigo_r = '$id'";
    $resultado = mysqli_query($conexao, $query);
    if(mysqli_affected_rows($conexao) == 0){
        header("Location: ../erro/401.php");
    }else{
        while($elemento = mysqli_fetch_row($resultado)){
            $codigo = $elemento[0];
            $nome = $elemento[1];
            $prof_orientador = $elemento[2];
            $prof_corientador = $elemento[3];
            $membros_grupo = $elemento[4];
            $membros_banca = $elemento[5];
            $curso = $elemento[6];
            $ano = $elemento[7];
            $mencao = $elemento[8];
            $resumo = $elemento[9];
            $abstract = $elemento[10];
            $pa_ch = $elemento[11];
            $key_words = $elemento[12];
            $data_ap = $elemento[13];
            $instituicao = $elemento[14];
            $foto = $elemento[15];
            $pdf = $elemento[16];
            $zip = $elemento[17];
        }
    }

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
        <link href="../css/projeto.css" rel="stylesheet">
        <link href="../assets/img/icon.ico" type="image/x-icon" rel="icon"/>
        <title>Retec - Projeto</title>
    </head>
    <body>

    <?php
        if(isset($_GET['criado'])){
    ?>
            <div class="marker">Projeto criado com sucesso!</div>
    <?php
        }elseif(isset($_GET['editado'])){
    ?>
            <div class="marker">Projeto editado com sucesso!</div>
    <?php
        }
    ?>

    <div class="banner"> 
        <?php
            if(isset($_SESSION["numLogin"])){
                ?>
                <button class="voltar" onclick="window.open('../projetos/', '_self')">❮ Voltar</button>
        <?php
            }else{
        ?>
                <button class="voltar" style="width:200px" onclick="window.open('../projetos/', '_self')">❮ Outros Projetos</button>
        <?php
            }
        ?> 
    </div>

    <div class="grid-container">

        <div class="info_esquerda">
            <div class="foto">
            <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($foto).'"/>';
            ?>
            </div>

            <div class="caixa">
                <p>
                    <label><b>Prof. Orientador: </b></label> <?php echo $prof_orientador;?>
                </p>
                <p>
                    <label><b>Prof. Coorientador: </b></label> <?php echo $prof_corientador;?>
                </p>
                <p>
                    <label><b>Membros: </b></label>
                    <ul id="list1">
                
                    </ul>
                </p>
                <p>
                    <label><b>Banca: </b></label>
                    <ul id="list2">

                    </ul>
                </p>
                <p>
                    <label><b>Escola: </b></label><?php echo $instituicao;?>
                </p>
                <p>
                    <label><b>Curso: </b></label><?php echo $curso;?>
                </p>
                <p>
                    <label><b>Data de Apresentação: </b></label><span id="data">111</span>
                </p>
                <p>
                    <label><b>Ano de Conclusão: </b></label> <?php echo $ano;?>
                </p>
                <p>
                    <label><b>Menção: </b></label> <span style="text-transform:uppercase;"><?php echo $mencao;?></span>
                </p>
            </div>
        <br><br>
        </div>

        <div class="info_direita">
            <h1 style="text-transform:none"><?php echo $nome;?></h1>
            <h2>Resumo</h2>
            <div class="abstract">
                <?php echo $resumo;?>
            </div>

            <h2>Abstract</h2>
            <div class="abstract">
                <?php echo $abstract;?>
            </div>

            <h2>Palavras-chave</h2>
            <div class="abstract">
                <?php echo $pa_ch;?>
            </div>

            <h2>Key Words</h2>
            <div class="abstract">
                <?php echo $key_words;?>
            </div>

            <h2>Downloads</h2>
            <div class="downloads">
                <p>
                    <label>Artigo: </label>
                    <?php
                        echo "<a download='artigo.pdf' href='data:application/pdf;base64,".base64_encode($pdf)."'> PDF</a>";
                    ?>
                </p>
                <p>    
                    <label>Projeto Completo(.zip): </label>
                    <?php
                        echo "<a download='tcc.rar' href='data:application/zip;base64,".base64_encode($zip)."'> ZIP</a>";
                    ?>
                </p>
            </div>
        </div>
    </div>
    <input type="text" value="<?php echo $membros_grupo; ?>" id="lst1" hidden/>
    <input type="text" value="<?php echo $membros_banca; ?>" id="lst2" hidden/>
    <script>
        ul = document.getElementById("list1");
        ul2 = document.getElementById("list2");

        membros_grupo = document.getElementById("lst1").value;
        membros_grupo = membros_grupo.split(',');

        membros_banca = document.getElementById("lst2").value;
        membros_banca = membros_banca.split(',');

        for(i=0; i<=(membros_grupo.length-1); i++){
            li = document.createElement("li");
            li.textContent = membros_grupo[i];
            ul.appendChild(li);
        }

        for(i=0; i<=(membros_banca.length-1); i++){
            li = document.createElement("li");
            li.textContent = membros_banca[i];
            ul2.appendChild(li);
        }

        data = "<?php echo $data_ap;?>"
        data = data.split("-");
        nova_data = data[2]+'/'+data[1]+'/'+data[0];
        document.getElementById("data").textContent = nova_data;

    </script>
    </body>
</html>