<?php
    include('core/session.php');
    if(isset($_SESSION['usuario_id'])) {
        header("Location: todolist.php");
            exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <?php include('includes/head.php')?>
    </head>
    <body class="d-flex bg-dark w-100 justify-center justify-content-center align-items-center" style="height:100vh;overflow:hidden">
        <div class="d-flex">
            <div class="text-white text-center d-flex flex-column gap-5">
                <div class="d-flex justify-content-evenly fs-1 align-items-center"><img src="assets/media/global/logo.png" width="128" heigth="128" alt="logo.png"> OrganizeMe!</div>
                <h1>Bem vindo ao OrganizeMe!</h1>
                <h2><a href="login.php" class="text-decoration-none">Acessar <i class="bi-box-arrow-in-right"></i></a></h2>
            </div>
        </div>
    </body>
</html>