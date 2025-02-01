<?php 
    include('core/session.php');

    if(!isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
            exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php include('includes/head.php');?>
    </head>
    <body class="d-flex bg-dark w-100 justify-center justify-content-center align-items-center" style="height:100vh;overflow:hidden">
        <div class="d-flex flex-row gap-3 justify-content-center">
            <div class=" fs-2 d-flex flex-column gap-3">
                <a href="core/usuario_logout.php" class="border text-danger border-2 border-danger fs-2 p-2" title="Sair"><i class="bi bi-box-arrow-right"></i></a>
                <a href="deactivate.php" class="border text-danger border-2 border-danger fs-2 p-2" title="Excluir conta"><i class="bi bi-trash"></i></a>
            </div>
            <div class="text-white">
                <div class="container">
                    <p>Nome:</p>
                    <p><?php echo $_SESSION['usuario_nome']?></p>
                </div>
                <div class="container">
                    <p>Email:</p>
                    <p><?php echo $_SESSION['usuario_email']?></p>
                </div>
            </div>
        </div>
    </body>
</html>