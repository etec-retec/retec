<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />

<?php
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $instituicao = $_POST["instituicao"];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email_rec = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rsenha = filter_input(INPUT_POST, 'rsenha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = strtolower($email);
    $email_rec = strtolower($email_rec);
    
    if($email == $email_rec){
        header("location: ../cadastro/index.php?repeat");
        $impedimento = TRUE;
    }

    if($senha != $rsenha){
        header("location: ../cadastro/index.php?senha");
        $impedimento = TRUE;
    }

    include '../conexao/conexao.inc';
    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conexao, $query);
    $retorno = mysqli_affected_rows($conexao);
    if($retorno > 0){
        $nome = htmlentities($nome, ENT_QUOTES, "UTF-8");
        header("location: ../cadastro/index.php?email");
    }

    function addUsuario($nome, $sobrenome, $instituicao, $email, $email_rec, $senha, $matricula, $rg){
        $objeto = new Usuario();
        $objeto->setNome($nome, $sobrenome);
        $objeto->setInstituicao($instituicao);
        $objeto->setEmail($email);
        $objeto->setEmail_rec($email_rec);
        $objeto->setSenha($senha);
        $objeto->setMatricula($matricula);
        $objeto->setRG($rg);
        $objeto->atualizaBD_U();   
    }

    class Usuario{
        public $nome;
        public $sobrenome;
        public $nome_completo;
        public $instituicao;
        public $email;
        public $email_rec;
        public $senha;
        public $rsenha;
        public $matricula;
        public $rg;
        public $unico;

        public function setNome($nome, $sobrenome){
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->nome_completo = $nome." ".$sobrenome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setInstituicao($instituicao){
            $array = $instituicao;
            if(isset($array[1])){
                $this->instiuicao = $instituicao;
                $this->unico = FALSE;
                $_GLOBALS["instituicao"] = $instituicao;
            }else{
                $this->instituicao = $instituicao[0];
                $this->unico = TRUE;
            }
        }

        public function getInstituicao(){
            return $this->instituicao;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail_rec($email_rec){
            $this->email_rec = $email_rec;
        }

        public function getEmail_rec(){
            return $this->email_rec;
        }

        public function setSenha($senha){
            $this->senha = md5($senha);
        }
        public function getSenha(){
            return $this->senha;
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }

        public function getTipo(){
            return $this->matricula;
        }

        public function setRG($rg){
            $this->rg = $rg;
        }

        public function getRG(){
            return $this->rg;
        }

        public function atualizaBD_U(){
            include '../conexao/conexao.inc';
            if ($this->unico == TRUE){
                $query_insert_usuario = "INSERT INTO solicitacoes VALUES (NULL, '$this->nome_completo', '$this->email','$this->email_rec', '$this->matricula', '$this->rg', '$this->senha', '$this->instituicao')";
                $res = mysqli_query($conexao, $query_insert_usuario);
                mysqli_close($conexao);
                header("Location: ../login/?alert1");
            }else{
                $array = explode(',', $this->instituicao);
                var_dump($GLOBALS["instituicao"]);
                foreach($GLOBALS["instituicao"] as $inst){
                    $query_insert_usuario = "INSERT INTO solicitacoes VALUES (NULL, '$this->nome_completo', '$this->email','$this->email_rec', '$this->matricula', '$this->rg', '$this->senha', '$inst')";
                    $res = mysqli_query($conexao, $query_insert_usuario);
                }
                mysqli_close($conexao);
                header("Location: ../login/?alert2");
            }
        }
    }

    if(isset($_GET["create"]) and $retorno == 0){
        if(!isset($impedimento)){
            addUsuario($nome, $sobrenome, $instituicao, $email, $email_rec, $senha, $matricula, $rg);
        }
    }
?>