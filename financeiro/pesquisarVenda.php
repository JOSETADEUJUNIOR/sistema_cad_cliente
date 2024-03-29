<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ClienteDAO.php';
require_once '../DAO/VendaDAO.php';
$objVenda = new VendaDAO();
$objcliente = new ClienteDAO();
$clientes = $objcliente->ConsultarCliente();
require_once '../DAO/ProdutoDAO.php';

$itemVenda = '';
$valor = '';

require_once '../DAO/VendaDAO.php';
$objVenda = new VendaDAO();

if (isset($_POST['btn_finalizar_venda'])) {
    $ret = -7;
    $pag_ret = 'pdv2.php';
}

if (isset($_POST['recVenda'])) {
    
    $idVendaRet = $_POST['idvenda'];
    $itens = $objVenda->ItensVenda($idVendaRet);
    
}

if (isset($_POST['btn_adicionar'])) {


    if (isset($_POST['idvenda']) && $_POST['idvenda'] > 0) {
        $idVenda = $_POST['idvenda'];
        $itemVenda = explode('-', $_POST['produto'])[0];
        $valor = explode('-', $_POST['produto'])[1];
        $qtdVenda = trim($_POST['qtd']);

        $idVendaRet = $objVenda->AddItem($idVenda, $itemVenda, $qtdVenda, $valor);
        if ($idVendaRet == 0) {
            $ret = 0;
            $itens = $objVenda->ItensVenda($idVendaRet);
        }
        $itens = $objVenda->ItensVenda($idVendaRet);
    } else {
        $dtVenda = trim($_POST['dtvenda']);
        $clienteVenda = trim($_POST['cliente']);
        $itemVenda = explode('-', $_POST['produto'])[0];
        $valor = explode('-', $_POST['produto'])[1];
        $qtdVenda = trim($_POST['qtd']);
        $idVendaRet = $objVenda->CadastrarVenda($dtVenda, $clienteVenda, $itemVenda, $qtdVenda, $valor);
        if ($idVendaRet == 0) {
            $ret = 0;
        }
        $itens = $objVenda->ItensVenda($idVendaRet);
    }
}

if (isset($_GET['idExcluir'])) {

    $idItem = explode('-', $_GET['idExcluir'])[0];
    $idVenda = explode('-', $_GET['idExcluir'])[1];
    $idVendaRet = $objVenda->RetiraItem($idItem, $idVenda);
    $itens = $objVenda->ItensVenda($idVendaRet);
}

$dadosVenda = $objVenda->DetalhesVenda($idVendaRet);
$valorTotVenda = $objVenda->ValorTotVenda($idVendaRet);

$objProduto = new ProdutoDAO();
$produtos = $objProduto->ConsultarProdutoVenda();


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
                        <h2>CONSULTAR VENDA</h2>
                    </div>
                </div>

                <!-- /. ROW  -->
                <hr />
                <form action="pesquisarVenda.php" method="post">

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Reabrir Venda
                                </div>
                                <div class="panel-body">

                                    <div class="col-md-6">
                                        <div class="form-group" id="divSubNome">
                                            <label>Codigo da venda</label>
                                            <input type="text" name="idvenda" value="<?= @$idVendaRet ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="divSubNome">
                                            <button class="btn btn-info"  name="recVenda">Abrir Venda</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Itens da Venda
                                </div>
                                <div class="panel-body">


                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th>Quantidade</th>
                                                    <th>Valor</th>
                                                    <th>Excluir item</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (is_countable(@$itens) && count($itens) > 0) : ?>
                                                    <?php for ($i = 0; $i < count($itens); $i++) { ?>
                                                        <tr class="odd gradeX">
                                                            <td><?= $itens[$i]['nome_produto'] ?></td>
                                                            <td><?= $itens[$i]['qtd_produto'] ?></td>
                                                            <td><?= $itens[$i]['item_valor'] ?></td>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $itens[$i]['id_item_venda'] ?>"><i title="Excluir Item" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>
                                                                <div class="modal fade" id="modalExcluir<?= $itens[$i]['id_item_venda'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Deseja excluir o item: <br>
                                                                                <label>Nome do item: <?= $itens[$i]['id_item_venda'] ?></label><br>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                <a href="pdv2.php?idExcluir=<?= $itens[$i]['id_item_venda'] . '-' . $itens[$i]['id_venda'] ?>" class="btn btn-primary">Sim</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>


                                                        </tr>
                                                    <?php } ?>

                                                <?php endif ?>

                                            </tbody>
                                        </table>






                                        <div class="col-md-8">
                                           
                                            <div class="form-group" id="divCat">
                                                <label>Selecione o Produto</label>
                                                <select name="produto" id="produto" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                    <option value="">Escolha o produto</option>
                                                    <?php foreach ($produtos as $prod) { ?>
                                                        <option value="<?= $prod['id_produto'] . '-' . $prod['valor_produto'] ?>"><?= $prod['nome_produto'] . ' - estoque: ' . $prod['estoque'] . 'qtd' ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" id="divSubNome">
                                                <label>Quantidade</label>
                                                <input name="qtd" id="qtd" type="text" placeholder="Digite a quantidade" class="form-control" onfocusout="SinalizaCampo('divSubNome','SubNome')">
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group" id="divSubNome">
                                                <label>Adicionar item</label>
                                                <button name="btn_adicionar" class="btn btn-success ">Adicionar</button>
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-sm-7" style="float: right;">
                                            <a href="pdfVenda.php?idVenda=<?= $idVendaRet?> target=_blank " class="btn btn-success ">Finalizar Venda</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Dados da Venda
                            </div>
                            <div class="panel-body">

                                <div class="col-md-3">
                                    <div class="form-group" id="divSubNome">
                                        <label>Numero da Venda</label>
                                        <input disabled value="<?= (@$dadosVenda[0]['id_venda'] == '' ? '' : $dadosVenda[0]['id_venda']) ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3" style="float:right">
                                    <div class="form-group" id="divSubNome">
                                        <label>Data Venda</label>
                                        <input disabled value="<?= UtilDAO::ExibirDataBr((@$dadosVenda[0]['data_venda'] == '' ? '' : $dadosVenda[0]['data_venda'])) ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="divSubNome">
                                        <label>Dados do Cliente</label>
                                        <span><strong>Nome:</strong> <?= (@$dadosVenda[0]['nome_cliente'] == '' ? '' : $dadosVenda[0]['nome_cliente']) ?></span>
                                        <span><strong>Rua:</strong> <?= (@$dadosVenda[0]['rua_cliente'] == '' ? '' : $dadosVenda[0]['rua_cliente']) ?></span>
                                        <span><strong>Bairro:</strong> <?= (@$dadosVenda[0]['bairro_cliente'] == '' ? '' : $dadosVenda[0]['bairro_cliente']) ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">

                                <label style="text-align:right">Valor Total: <?= $valorTotVenda[0]['valorTotal'] ?> </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


</body>

</html>