<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/CategoriaContaDAO.php';
$pag_ret = 'consultar_conta_categoria.php';

$objCategoria = new CategoriaContaDAO();
if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $id_cat = $_GET['cod'];
    $dados = $objCategoria->DetalharCategoria($id_cat);
    //1 =            sdaasdasdsadsa            26

    if (count($dados) == 0) {
        header('location: consultar_conta_categoria.php');
        exit;
    }
} else if (isset($_POST['btn_alterar'])) {

    $nome_categoria = trim($_POST['nome']);
    $cod = $_POST['cod'];
    $ret = $objCategoria->AlterarCategoria($nome_categoria, $cod);
} else if (isset($_POST['btn_excluir'])) {

    $idCategoria = $_POST['cod'];
    $ret = $objCategoria->ExcluirCartegoria($idCategoria);
} else {
    echo 'caiu aqui no erro';
    header('location: consultar_conta_categoria.php');
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
                <form action="alterar_conta_categoria.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_cat_conta'] ?>">
                    <div class="form-group" id="divCatNome">
                        <label>Nome da Categoria</label>
                        <input name="nome" id="nomeCat" type="text" value="<?= $dados[0]['nome_categoria'] ?>" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divCatNome','nomeCat')">
                    </div>
                    <button name="btn_alterar" class="btn btn-success" onclick="return ValidarCategoria()">Gravar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirCat">Excluir</button>
                    <a href="consultar_conta_categoria.php" class="btn btn-warning">Voltar</a>
                    <div class="modal fade" id="ExcluirCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Categoria</h4>
                                </div>
                                <div class="modal-body">
                                    <h4> Deseja Realmente excluir a categoria <b><?= $dados[0]['nome_categoria'] ?> ?</b>.<h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button name="btn_excluir" class="btn btn-primary">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>



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