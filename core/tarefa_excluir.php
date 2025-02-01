<?php
    include "tarefa_sql.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $tarefa_id = $_GET['id'];

        if(excluirTarefa($tarefa_id)) {
            echo "Tarefa excluida com sucesso!";

            header("Location: ../todolist.php");
            
            exit;
        } else {
            echo "Erro ao excluir tarefa!";
        }
    }

?>