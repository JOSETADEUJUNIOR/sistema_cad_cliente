<?php

require_once '../DAO/CategoriaDAO.php';

if (isset($_POST['btn_gravar'])) {

    $nome_categoria = trim($_POST['nome']);

    $objCategoria = new CategoriaDAO();
    $ret = $objCategoria->EditarCategoria($nome_categoria);
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>

<body>
    <div id="wrapper">
        <?php include_once('_topo.php'); ?>
        <?php include_once('_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once('_msg.php') ?>
                        <h2>Alterar Categoria</h2>
                        <h5>Aqui você poderá alterar todas as suas categorias. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_categoria.php" method="post">
                    <div class="form-group" id="divCatNome">
                        <label>Nome da Categoria</label>
                        <input name="nome" id="nomeCat" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divCatNome','nomeCat')">
                    </div>
                    <button name="btn_gravar" class="btn btn-success" onclick="return ValidarCategoria()">Gravar</button>
                    <button class="btn btn-danger">Excluir</button>
                    <a href="consultar_categoria.php" class="btn btn-warning">Voltar</a>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

</body>

</html>