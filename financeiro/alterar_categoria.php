<?php

require_once '../DAO/CategoriaDAO.php';
$pag_ret = 'consultar_categoria.php';
$objCategoria = new CategoriaDAO();


if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
   
    $id_cat = $_GET['cod'];
    $dados = $objCategoria->DetalharCategoria($id_cat);
}else if (isset($_POST['btn_gravar'])) {

    $nome_cat = trim($_POST['nome']);
    $id_cat = trim($_POST['cod']);

    $ret = $objCategoria->EditarCategoria($nome_cat, $id_cat);
} else{
    header('location: consultar_categoria.php');
    exit;
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
                <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria']?>">
                    <div class="form-group" id="divCatNome">
                        <label>Nome da Categoria</label>
                        <input name="nome" value="<?= $dados[0]['nome_categoria']?>" id="nomeCategoria" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divCatNome','nomeCategoria')">
                    </div>
                    <button name="btn_gravar" class="btn btn-success" onclick="return ValidarCategoria()">Gravar</button>
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