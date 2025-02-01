<?php
include 'usuario_sql.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = autenticarUsuario($email, $senha);

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $email;
        header("Location: ../todolist.php");
        exit;
    } else {
        $_SESSION['msg']['login'] = "E-mail ou senha incorretos!";
        header("Location: ../login.php");
    }
}

?>
