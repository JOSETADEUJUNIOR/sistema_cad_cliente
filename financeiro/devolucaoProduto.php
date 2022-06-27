<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ProdutoDAO.php';
require_once '../DAO/ClienteDAO.php';
$prod = new ProdutoDAO();
$produtos = $prod->ConsultarProduto();
$objCliente = new ClienteDAO();
$clientes = $objCliente->ConsultarCliente();

if (isset($_POST['btn_gravar'])) {

    $nome_categoria = trim($_POST['nome']);

    $objCat = new CategoriaDAO();
    $ret = $objCat->CadastrarCategoria($nome_categoria);
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
                        <h2>Devolução / Troca de Produto</h2>
                        <h5>Realize aqui a troca ou devolução do valor do produto. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="devolucaoProduto.php" method="post">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Campo de cadastro
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group" id="divProd">

                                            <select name="produto" id="produto" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
                                                <option value="">Escolha o produto</option>
                                                <?php foreach ($produtos as $prod) { ?>
                                                    <option value="<?= $prod['id_produto'] . '-' . $prod['valor_produto'] ?>"><?= $prod['nome_produto'] . ' | estoque: ' . $prod['estoque'] . 'qtd' . '| R$: ' . $prod['valor_produto'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <button name="btnCarregar" class="btn btn-success col-md-12 col-xs-12 " onclick=" return ValidarCategoria()">Carregar Produto</button>
                                    </div>

                                    <div id="CarregaDados" style="display:block;">
                                        <div class="col-md-10">
                                            <div class="form-group" id="divDadosNome">
                                                <label>Produto</label>
                                                <input name="nome" id="nomeCategoria" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" id="divDadosNome">
                                                <label>Valor</label>
                                                <input name="nome" id="nomeCategoria" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group" id="divProd">
                                                <label>Escolha o Cliente</label>
                                                <select name="produto" id="produto" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
                                                    <option value="">Escolha o Cliente</option>
                                                    <?php foreach ($clientes as $cli) { ?>
                                                        <option value="<?= $cli['id_cliente'] ?>"><?= $cli['nome_cliente'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" id="divDadosNome">
                                                <label>Data Devolução</label>
                                                <input name="dataDevolucao" id="dataDevolucao" type="date" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                            <button name="btn_gravar" class="btn btn-success col-md-6 col-xs-12 " onclick=" return ValidarCategoria()">Cadastrar</button>
                                            <a href="consultar_categoria.php" class="btn btn-warning col-md-6 col-xs-12">Voltar</a>
                                        </div>
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