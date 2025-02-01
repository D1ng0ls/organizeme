<?php
    include 'conexao.php';

    function autenticarUsuario($email, $senha) {
        global $conn;
        $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $senha_armazenada);
            $stmt->fetch();

            if (password_verify($senha, $senha_armazenada)) {
                return ['id' => $id, 'nome' => $nome];
            }
        }
        return null;
    }

    function verificarUsuario($email) {
        global $conn;
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt;
    }

    function cadastrarUsuario($nome, $email, $senha_criptografada) {
        global $conn;
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_criptografada);
        return $stmt->execute();
    }

    function excluirUsuario($id, $senha) {
        global $conn;

        $sql = "SELECT senha FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($senha_criptografada);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($senha, $senha_criptografada)) {
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
?>
