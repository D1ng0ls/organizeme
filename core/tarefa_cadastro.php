<?php
    include 'tarefa_sql.php';
    include 'session.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario_id = $_SESSION['usuario_id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $prazo = $_POST['prazo'];
        $status_id = 1;

        if (criarTarefa($usuario_id, $titulo, $descricao, $prazo, $status_id)) {
            echo "Tarefa cadastrada com sucesso!";

            header("Location: ../todolist.php");

            exit;
        } else {
            echo "Erro ao inserir tarefa!";
        }
    }
?>