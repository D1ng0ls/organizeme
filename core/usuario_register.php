<?php
include 'usuario_sql.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = verificarUsuario($email);

    if ($stmt->num_rows > 0) {
        $_SESSION['msg']['email'] = "Esse e-mail já está cadastrado. Tente outro!";
        header("Location: ../register.php");
    } else {
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        if (cadastrarUsuario($nome, $email, $senha_criptografada)) {
            echo "Cadastro realizado com sucesso!";

            $usuario = autenticarUsuario($email, $senha);

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $email;

            echo $_SESSION['usuario_id']." ".$_SESSION['usuario_nome'];

            header("Location: ../todolist.php");

            exit;
        } else {
            echo "Erro ao cadastrar usuário!";
        }
    }
}
?>
