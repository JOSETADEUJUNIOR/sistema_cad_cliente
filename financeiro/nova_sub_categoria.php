<?php
require_once '../DAO/UtilDAO.php'; //verifica se esta logado, se não direciona para tela login
UtilDAO::VerLogado();
require_once '../DAO/SubCategoriaDAO.php';
require_once '../DAO/CategoriaDAO.php';
$pag_ret = 'consultar_sub_categoria.php';
$objCat = new CategoriaDAO();
$categorias = $objCat->ConsultarCategoria();

if (isset($_POST['btn_gravar'])) {
    $nome_sub_cat = trim($_POST['nome']);
    $idCat = trim($_POST['cat']);
    $objSubCat = new SubCategoriaDAO();
    $ret = $objSubCat->CadastrarSubCat($nome_sub_cat, $idCat);
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
                        <?php include('_msg.php') ?>
                        <h2>Subcategoria</h2>
                        <h5>Aqui você poderá Cadastrar a subcategoria dos produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_sub_categoria.php" method="post">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Campos de cadastro
                                </div>
                                <div class="panel-body">

                                    <div class="col-md-6">
                                        <div class="form-group" id="divSubNome">
                                            <label>Nome</label>
                                            <input name="nome" id="SubNome" type="text" placeholder="Digite o nome da sub categoria" class="form-control" onfocusout="SinalizaCampo('divSubNome','SubNome')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="divCat">
                                            <label>Selecione a Categoria</label>
                                            <select name="cat" id="cat" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                <option value="">Selecione a Categoria</option>
                                                <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                                    <option value="<?= $categorias[$i]['id_categoria'] ?>"><?= $categorias[$i]['nome_categoria'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="btn_gravar" class="btn btn-success " onclick=" return ValidarSubCat()">Cadastrar</button>
                                        <a href="consultar_sub_categoria.php" class="btn btn-warning">Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
</body>

</html>