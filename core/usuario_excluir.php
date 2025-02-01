<?php
    include 'session.php';
    include 'usuario_sql.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario_id = $_SESSION['usuario_id'];
        $senha = $_POST["senha"];
    
        if (excluirUsuario($usuario_id, $senha)) {
            echo "Conta excluída com sucesso.";
            session_destroy();
            header("Location: ../");
        } else {
            $_SESSION['msg']['deactivate'] = "Senha incorreta!";
            header("Location: ../deactivate.php");
        }
    }
?>