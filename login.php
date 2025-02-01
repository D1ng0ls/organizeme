<?php
    include('core/session.php');

    if(isset($_SESSION['msg']['login'])){
        $login_msg = $_SESSION['msg']['login'];
    }

    if(isset($_SESSION['usuario_id'])) {
        header("Location: todolist.php");
        exit();
    };
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <?php include('includes/head.php')?>
        <link href="assets/style/pages/login/login.css" rel="stylesheet">
    </head>
    <body class="container-login d-flex flex-row justify-content-center align-items-center w-100" style="height: 100vh">
        <div class="d-flex">
            <div class="container-xxl container-fluid bg-light bg-opacity-75 text-dark rounded-4 d-flex flex-column justify-content-evenly p-4 text-center gap-4">
                <h2>Bem vindo de volta!</h2>
                <form action="core/usuario_login.php" method="post" class="d-flex flex-column justify-content-around align-items-center gap-4">
                    <div class="input-content w-75">
                        <input type="text" id="email" name="email" placeholder="E-mail" required class="form-control <?php if(isset($login_msg)) echo "is-invalid"?>">
                        <small class="text-danger"><?php echo isset($login_msg) ? $login_msg: '' ?></small> 
                    </div>
                    <div class="input-content w-75">
                        <input type="password" id="senha" name="senha" placeholder="Senha" required class="form-control <?php if(isset($login_msg)) echo "is-invalid"?>">
                        <small class="text-danger"><?php echo isset($login_msg) ? $login_msg: '' ?></small> 
                    </div>
                    <div class="input-content w-25">
                        <input type="submit" value="Entrar" id="enviar" class="form-control bg-dark text-white border-dark">
                    </div>
                </form>
                <a href="register.php" class="text-primary text-decoration-underline">Ainda não se cadastrou?</a>
            </div>
        </div>
    </body>
</html>