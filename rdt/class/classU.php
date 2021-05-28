<link href="../css/loading.css" rel="stylesheet">
<title>Validando...</title>


            <center><br><br><br><br><br><br><br>
            As duas senhas são diferentes!
            <div class='loader'></div>
            </center>
           
<?php
    //Faz com que os usuario não faça merda 
    $nomecompleto = filter_input(INPUT_POST, 'nomecompleto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rsenha = filter_input(INPUT_POST, 'rsenha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if($senha != $rsenha)
        {
            echo "<script>alert('teste')</script>";
            sleep(5);
            header("location: ../cadastro/index.php");
            
            
        }

    $objeto = new usuario();
    $objeto->setNome($nomecompleto);
    $objeto->setEmail($email);
    $objeto->setSenha($senha,$rsenha);
    $objeto->setTipo($tipo);
    $objeto->atualizaBD_U();    

class usuario{
    
    public $nome;
    public $email;
    public $senha;
    public $rsenha;
    public $tipo;

    //NOME
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    //EMAIL
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    //SENHA
    public function setSenha($senha,$rsenha){
        // $this->senha = $senha;
        // $this->rsenha = $rsenha;
        // if($senha != $rsenha)
        // {
        //     echo "<script>alert('teste')</script>";
        //     sleep(5);
        //     header("location: ../cadastro/index.php");
            
            
        // }
        // else{
            $this->senha = md5($senha);
        // }

    }
    public function getSenha(){
        return $this->senha;
    }

    //TIPO
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getTipo(){
        return $this->tipo;

    }
    
    
    public function atualizaBD_U(){
        include '../conexao/conexao.inc';
            $query_insert_usuario = "INSERT INTO usuario VALUES (NULL, '$this->nome', '$this->email', '$this->senha', '$this->tipo')";
            $res = mysqli_query($conexao, $query_insert_usuario);
            echo mysqli_error($conexao);
            mysqli_close($conexao);
            header("Location:../index.php?");
            header("Location:../cadastro/index.php?alert=1");
        }
}

/*
    public function deletaBD_U(){
        include 'conexao/conexao.inc';

        $query_insert_usuario = "DELETE FROM usuario WHERE codigo_u = '1'";
        $res = mysqli_query($conexao, $query_insert_usuario);
        echo mysqli_error($conexao);
        mysqli_close($conexao);
    }

}
*/
?>