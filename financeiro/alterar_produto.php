<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ProdutoDAO.php';
require_once '../DAO/FornecedorDAO.php';
require_once '../DAO/SubCategoriaDAO.php';
require_once '../DAO/CategoriaDAO.php';
$pag_ret = 'consultar_produto.php';
$objProd = new ProdutoDAO();
$objForn = new FornecedorDAO();
$fornecedores = $objForn->ConsultarFornecedor();
$objCat = new CategoriaDAO();
$categorias = $objCat->ConsultarCategoria();
$objSubCat = new SubCategoriaDAO();
$Subcategorias = $objSubCat->ConsultarSubCategoria();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $idProd = trim($_GET['cod']);
    $dados = $objProd->DetalharProduto($idProd);
} else if (isset($_POST['btn_alterar'])) {

    $codBarras = trim($_POST['codBarras']);
    $nomeProduto = trim($_POST['nomeProduto']);
    $dataCad = trim($_POST['dataCad']);
    $descProd = trim($_POST['descProd']);
    $valor = trim($_POST['valor']);
    $estoque = trim($_POST['estoque']);
    $cat = trim($_POST['cat']);
    $subcat = trim($_POST['subcat']);
    $fornecedor = trim($_POST['fornecedor']);
    $cod = trim($_POST['cod']);

    $ret = $objProd->AlterarProduto($codBarras, $nomeProduto, $descProd, $valor, $dataCad, $estoque, $fornecedor, $cat, $subcat, $cod);
} else {
    header('location: consultar_produto.php');
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
                        <h2>Alterar Produto</h2>
                        <h5>Aqui você poderá alterar o produto. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_produto.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_produto'] ?>">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Campos de cadastro
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <div class="form-group" id="divProdCod">
                                            <label>Codigo Barras</label>
                                            <input name="codBarras" id="codBarras" value="<?= $dados[0]['cod_produto'] ?>" type="text" placeholder="Digite o codigo de barras" class="form-control" onfocusout="SinalizaCampo('divProdCod','codBarras')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="divProdNome">
                                            <label>Nome do Produto</label>
                                            <input name="nomeProduto" id="nomeProduto" value="<?= $dados[0]['nome_produto'] ?>" type="text" placeholder="Digite o nome do produto" class="form-control" onfocusout="SinalizaCampo('divProdNome','nomeProduto')">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="divProdCad">
                                            <label>Data do Cadastro</label>
                                            <input name="dataCad" id="dataCad" value="<?= $dados[0]['data_cadastro'] ?>" type="date" placeholder="Digite o nome digite a data de cadastro do produto" class="form-control" onfocusout="SinalizaCampo('divProdCad','dataCad')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group" id="divProdCat">

                                            <label>Selecione a Categoria</label>

                                            <select name="cat" id="cat" class="form-control" onfocusout="SinalizaCampo('divProdCat','cat')">
                                                <option value="<?= $dados[0]['id_categoria'] ?>"><?= $dados[0]['nome_categoria'] ?></option>
                                                <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                                    <option value="<?= $categorias[$i]['id_categoria'] ?>"><?= $categorias[$i]['nome_categoria'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group" id="divProdSubCat">

                                            <label>Selecione a Sub Categoria</label>

                                            <select name="subcat" id="subcat" class="form-control" onfocusout="SinalizaCampo('divProdSubCat','subcat')">
                                                <option value="<?= $dados[0]['id_subCategoria'] ?>"><?= $dados[0]['nome_subcategoria'] ?></option>
                                                <?php for ($i = 0; $i < count($Subcategorias); $i++) { ?>
                                                    <option value="<?= $Subcategorias[$i]['id_subCategoria'] ?>"><?= $Subcategorias[$i]['nome_subcategoria'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group" id="divProdForn">

                                            <label>Selecione o Fornecedor</label>

                                            <select name="fornecedor" id="fornecedor" class="form-control" onfocusout="SinalizaCampo('divProdForn','fornecedor')">
                                                <option value="<?= $dados[0]['id_fornecedor'] ?>"><?= $dados[0]['nome_fornecedor'] ?></option>
                                                <?php for ($i = 0; $i < count($fornecedores); $i++) { ?>
                                                    <option value="<?= $fornecedores[$i]['id_fornecedor'] ?>"><?= $fornecedores[$i]['nome_fornecedor'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="divProdEst">
                                            <label>Estoque</label>
                                            <input name="estoque" id="estoque" value="<?= $dados[0]['estoque'] ?>" type="text" placeholder="Digite o estoque do produto" class="form-control" onfocusout="SinalizaCampo('divProdEst','estoque')">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" id="divProdValor">
                                            <label>Valor</label>
                                            <input name="valor" id="valor" value="<?= $dados[0]['valor_produto'] = explode('.', $dados[0]['valor_produto'])[0] . ',00' ?>" type="text" placeholder="Digite o valor do produto" class="form-control" onfocusout="SinalizaCampo('divProdValor','valor')">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="divProdDesc">
                                            <label>Descrição do produto</label>
                                            <textarea name="descProd" id="descProd" type="text" placeholder="Digite a descrição do produto" class="form-control" onfocusout="SinalizaCampo('divProdDesc','descProd')"><?= $dados[0]['descricao_produto'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="btn_alterar" class="btn btn-success " onclick="return ValidarProduto()">Alterar</button>
                                        <a href="consultar_produto.php" class="btn btn-warning ">Voltar</a>
                                    </div>
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