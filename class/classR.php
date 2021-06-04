<?php

        class repositorio{
            public $turma;
            public $curso;
            public $ano;
            public $nome;
            public $resumo;
            public $autores;
            public $orientadores;
            public $arquivos;

            public function setTurma($turma){
                $this->turma = $turma;
            }

            public function getTurma(){
                return $this->turma;
            }

            public function setCurso($curso){
                $this->curso = $curso;
            }

            public function getCurso(){
                return $this->curso;
            }

            public function setAno($ano){
                $this->ano = $ano;
            }

            public function getAno(){
                return $this->ano;
            }

            public function setNome($nome){
                $this->nome = $nome;
            }

            public function getNome(){
                return $this->nome;
            }

            public function setResumo($resumo){
                $this->resumo = $resumo;
            }

            public function getResumo(){
                return $this->resumo;
            }

            public function setAutores($autores){
                $this->autores = $autores;
            }

            public function getAutores(){
                return $this->autores;
            }

            public function setOrientadores($orientadores){
                $this->orientadores = $orientadores;
            }

            public function getOrientadores(){
                return $this->orientadores;
            }

            public function setArquivos($arquivo){
                $this->arquivos = $arquivo;
            }

            public function getArquivos(){
                return $this->arquivos;
            }

            public function atualizaBD_R(){
                include 'conexao/conexao.inc';

                $query_insert_repositorio = "INSERT INTO repositorio VALUES (NULL, '$this->turma', '$this->curso',
                '$this->ano', '$this->nome', '$this->resumo', '$this->autores', '$this->orientadores', '$this->arquivos')";
                $res2 = mysqli_query($conexao, $query_insert_repositorio);
                //echo mysqli_error($conexao);
                mysqli_close($conexao);
            }
            public function deletaBD_R(){
                include 'conexao/conexao.inc';

                $query_insert_repositorio = "DELETE FROM repositorio WHERE codigo_r = '1'";
                $res = mysqli_query($conexao, $query_insert_repositorio);
                echo mysqli_error($conexao);
                mysqli_close($conexao);
            }

        }

?>