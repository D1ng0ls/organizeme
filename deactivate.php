<?php 
    include('core/session.php');
    
    if(!isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
            exit();
    }

    if(isset($_SESSION['msg']['deactivate'])){
        $deactivate_msg = $_SESSION['msg']['deactivate'];
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php include('includes/head.php');?>
    </head>
    <body class="d-flex bg-dark w-100 justify-center justify-content-center align-items-center" style="height:100vh;overflow:hidden">
        <div class="d-flex flex-row gap-3 justify-content-center border border-2 border-danger p-3 text-white">
            <form action="core/usuario_excluir.php" method="post" class="d-flex flex-column gap-3">
                <p class="alert alert-secondary">Tem certeza de que deseja desativar sua conta? Esta ação é irreversível e resultará na perda de todos os seus dados!</p>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required class="form-control bg-dark text-white <?php if(isset($deactivate_msg)) echo "is-invalid"?>">
                <small class="text-danger"><?php echo isset($deactivate_msg) ? $deactivate_msg: '' ?></small> 
                <input type="submit" name="enviar" id="enviar" value="Deletar conta" class="form-control bg-primary text-white border-primary">
            </form>
            </div>
        </div>
    </body>
</html>