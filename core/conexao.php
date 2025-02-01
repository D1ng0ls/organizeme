<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'todolist';
    $port = 3306;

    $conn =  mysqli_connect($host, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
?>

