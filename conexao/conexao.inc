<?php
    $servidor = 'localhost';
    $user = 'root';
    $password = '';
    
    $conexao = mysqli_connect($servidor, $user, $password);
    mysqli_select_db($conexao, 'tcc');
?>