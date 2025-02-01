<?php
    include 'tarefa_sql.php';
    include 'session.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['tarefa_id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $prazo = $_POST['prazo'];
        $status_id = $_POST['status_id'];

        if (atualizarTarefa($id, $titulo, $descricao, $prazo, $status_id)) {
            echo "Tarefa editada com sucesso!";

            header("Location: ../todolist.php");

            exit;
        } else {
            echo "Erro ao editar tarefa!";
        }
    }
?>