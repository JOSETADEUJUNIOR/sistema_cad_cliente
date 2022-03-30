<?php

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

if (isset($_POST['btn_cadastrar'])) {

    $codBarras = trim($_POST['codBarras']);
    $nomeProduto = trim($_POST['nomeProduto']);
    $dataCad = trim($_POST['dataCad']);
    $descProd = trim($_POST['descProd']);
    $valor = trim($_POST['valor']);
    $estoque = trim($_POST['estoque']);
    $cat = trim($_POST['cat']);
    $subcat = trim($_POST['subcat']);
    $fornecedor = trim($_POST['fornecedor']);

    $ret = $objProd->CadastrarProduto($codBarras, $nomeProduto, $descProd, $valor, $dataCad, $estoque, $fornecedor, $cat, $subcat);
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
                        <h2>Novo Produto</h2>
                        <h5>Aqui você poderá cadastrar todos os Produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="novo_produto.php" method="post">

                    <div class="col-md-3">
                        <div class="form-group" id="divProdCod">
                            <label>Codigo Barras</label>
                            <input name="codBarras" id="codBarras" type="text" placeholder="Digite o codigo de barras" class="form-control" onfocusout="SinalizaCampo('divProdCod','codBarras')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="divProdNome">
                            <label>Nome do Produto</label>
                            <input name="nomeProduto" id="nomeProduto" type="text" placeholder="Digite o nome do produto" class="form-control" onfocusout="SinalizaCampo('divProdNome','nomeProduto')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="divProdCad">
                            <label>Data do Cadastro</label>
                            <input name="dataCad" id="dataCad" type="date" placeholder="Digite o nome digite a data de cadastro do produto" class="form-control" onfocusout="SinalizaCampo('divProdCad','dataCad')">
                        </div>
                    </div>
                    
                    <div class="col-md-6">


                        <div class="form-group" id="divProdCat">

                            <label>Selecione a Categoria</label>

                            <select name="cat" id="cat" class="form-control" onfocusout="SinalizaCampo('divProdCat','cat')">
                                <option value="">Selecione</option>
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
                                <option value="">Selecione</option>
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
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($fornecedores); $i++) { ?>
                                    <option value="<?= $fornecedores[$i]['id_fornecedor'] ?>"><?= $fornecedores[$i]['nome_fornecedor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="divProdEst">
                            <label>Estoque</label>
                            <input name="estoque" id="estoque" type="text" placeholder="Digite o estoque do produto" class="form-control" onfocusout="SinalizaCampo('divProdEst','estoque')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="divProdValor">
                            <label>Valor</label>
                            <input name="valor" id="valor" type="text" placeholder="Digite o valor do produto" class="form-control" onfocusout="SinalizaCampo('divProdValor','valor')">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="divProdDesc">
                            <label>Descrição do produto</label>
                            <textarea name="descProd" id="descProd" type="text" placeholder="Digite a descrição do produto" class="form-control" onfocusout="SinalizaCampo('divProdDesc','descProd')"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="btn_cadastrar" class="btn btn-success " onclick="return ValidarProduto()">Cadastrar</button>
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