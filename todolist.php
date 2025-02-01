<?php
    include('core/tarefa_sql.php');

    if(!isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
            exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $tarefa_id = $_GET['id'];
        $tarefaEdit  = buscarTarefa($tarefa_id);
    } else {
        $tarefaEdit = null;
    }

    $tarefas = listarTarefas($_SESSION['usuario_id']);
    $status_list = listarStatus();

    $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

    $colorStatus = array("bg-danger", "bg-primary", "bg-success");
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('includes/head.php')?>
    </head>
    <body>
        <header>
            <nav class="navbar p-4 ">
                <a href="" class="navbar-brand">
                    <img src="assets/media/global/logo.png" width="32" height="32" class="d-inline-block align-text-bottom"/>
                    OrganizeMe!
                </a>
                <a href="usuario.php" class="d-flex text-dark gap-3">
                    <i class="bi bi-person-circle fs-3"></i>
                </a>
            </nav>
        </header>
        <main>
            <div class="text-center">
                <p><span id="local"></span>, <?php echo date("d")." de ".$meses[date("n")-1]." de ".date("Y") ?></p>
                <p><img id="clima" class="bi fs-4 text-dark align-middle" alt=""/> <span id="temperatura"></span></p>
            </div>
            <div class="container-xxl p-4 w-100">
                <form action="<?php if(isset($tarefa_id)){echo "core/tarefa_edit.php";} else {echo "core/tarefa_cadastro.php";}?>" method="post" class="d-flex align-items-center justify-content-center flex-column">
                    <div class="d-flex flex-column gap-3 w-100">
                        <input type="text" name="titulo" placeholder="Adicionar tarefa" value="<?php if(isset($tarefa_id)) echo htmlspecialchars($tarefaEdit['titulo'])?>" id="task" required class="form-control">
                        <textarea name="descricao" placeholder="Descrição..." id="descricao" rows="2" class="form-control"><?php if(isset($tarefa_id)) echo htmlspecialchars($tarefaEdit['descricao'])?></textarea>
                        <?php if(isset($tarefa_id)):?>
                            <input type="text" name="tarefa_id" value="<?php echo $tarefa_id?>" hidden>
                            <select class="form-select" name="status_id">
                                <?php foreach($status_list as $status):?>
                                    <option value="<?php echo $status['id']?>" <?php if($tarefaEdit['status_id'] == $status['id']) echo "selected"?>><?php echo $status['nome']?></option>
                                <?php endforeach;?>
                            </select>
                        <?php endif;?>
                        <div class="d-flex flex-row align-items-right justify-content-between gap-3">
                            <input type="date" name="prazo" id="prazo" required value="<?php if(isset($tarefa_id)) echo $tarefaEdit['prazo']?>" min="<?php echo date("Y-m-d") ?>" class="form-control">
                            <input type="submit" name="adicionar" id="adicionar" value="<?php if(isset($tarefa_id)){ echo "Editar";} else {echo"Adicionar";} ?>" class="form-control bg-primary text-white">
                        </div>
                    </div>
                </form>
            </div>
            <div class="container d-flex w-100 justify-content-center p-5">
                <table id="tarefaTable" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Título</th>
                            <th scope="col">Descrição</th>
                            <th scope="col" onclick="sortTable(2)">Prazo <i id="prazoCol" class="bi bi-chevron-down"></i></th>
                            <th scope="col" onclick="sortTable(3)">Status <i id="statusCol" class="bi bi-chevron-expand"></th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tarefas as $tarefa): ?>
                            <tr class="text-center">
                                <td><?= htmlspecialchars($tarefa['titulo']) ?></td>
                                <td><?= htmlspecialchars($tarefa['descricao']) ?></td>
                                <td><?= date('d/m/Y', strtotime($tarefa['prazo'])) ?></td>
                                <td><span class="text-white rounded-4 px-2 <?php echo $colorStatus[$tarefa['status_id']-1] ?>"><?= htmlspecialchars($tarefa['status_nome']) ?></span></td>
                                <td>
                                    <a href="?id=<?= $tarefa['id'] ?>" class="text-decoration-none">
                                        <i class="bi bi-pencil"></i>
                                    </a> | 
                                    <a href="core/tarefa_excluir.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');" class="text-decoration-none text-danger">
                                        <i class="bi bi-trash"></i>
                                    <a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer class="p-4"></footer>
        <script src="assets/script/pages/todolist/weather.js"></script>
        <script src="assets/script/pages/todolist/order.js"></script>
    </body>
</html>