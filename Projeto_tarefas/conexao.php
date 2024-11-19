<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database= 'tarefas';

    $conexao = new mysqli ($host,$username, $password, $database);

    if($conexao->connect_error){
        die('Conexão falhou'. $conexao->connect_error);
    }
?>