<?php
    include 'session.php';
    include 'conexao.php';

    function criarTarefa($usuario_id, $titulo, $descricao, $prazo, $status_id) {
        global $conn;
        $sql = "INSERT INTO tarefas (usuario_id, titulo, descricao, prazo, status_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $usuario_id, $titulo, $descricao, $prazo, $status_id);
        return $stmt->execute();
    }

    function listarTarefas($usuario_id) {
        global $conn;

        $sql = "SELECT id, titulo, descricao, prazo, data_criacao, status_id, (SELECT nome FROM status WHERE id=status_id) as status_nome FROM tarefas WHERE usuario_id = ? ORDER BY prazo ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function buscarTarefa($tarefa_id) {
        global $conn;
        $sql = "SELECT id, titulo, descricao, prazo, data_criacao, status_id, (SELECT nome FROM status WHERE id=status_id) as status_nome FROM tarefas WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $tarefa_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    function atualizarTarefa($id, $titulo, $descricao, $prazo, $status_id) {
        global $conn;
        $sql = "UPDATE tarefas SET titulo = ?, descricao = ?, prazo = ?, status_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $titulo, $descricao, $prazo, $status_id, $id);
        return $stmt->execute();
    }

    function excluirTarefa($id) {
        global $conn;
        $sql = "DELETE FROM tarefas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    function listarStatus() {
        global $conn;
        $sql = "SELECT * FROM status";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
?>