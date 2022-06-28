<?php

use Mpdf\Tag\Span;

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ProdutoDAO.php';
require_once '../DAO/ClienteDAO.php';
$prod = new ProdutoDAO();
$produtos = $prod->ConsultarProduto();
$objCliente = new ClienteDAO();
$clientes = $objCliente->ConsultarCliente();

if (isset($_GET['idExcluir'])) {
    $id = $_GET['idExcluir'];
    $ret = $prod->ExcluirDevolucao($id);
}
if (isset($_POST['btn_gravar'])) {
    $produto = trim($_POST['produtoDevolucao']);
    $valor = trim($_POST['valorProduto']);
    $cliente = trim($_POST['cliente']);
    $dataDevolucao = trim($_POST['dataDevolucao']);
    $descricao = trim($_POST['descricao']);
    $tipo = trim($_POST['tipoDevolucao']);
    $devolucao = new ProdutoDAO();
    $ret = $devolucao->Devolucao($produto, $valor, $cliente, $dataDevolucao, $descricao, $tipo);
} else if (isset($_POST['btnCarregar'])) {
    
    $id = trim($_POST['produtoDevolucao']);
    $dados = $prod->DetalharProduto($id);
}
$ProdDevolvido = $prod->ConsultaDevolucao();


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
                                    Tela para devolução <span class="btn btn-warning btn-xs">Liberado</span>
                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                        <div class="form-group" id="divProd">

                                            <select name="produtoDevolucao" id="produtoDevolucao" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
                                                <option value="<?= ($dados[0]['id_produto'] != '' ? $dados[0]['id_produto'] : '') ?>"><?= ($dados[0]['nome_produto'] != '' ? $dados[0]['nome_produto'] : 'Escolha o Produto...') ?></option>
                                                <?php foreach ($produtos as $prod) { ?>
                                                    <option value="<?= $prod['id_produto'] ?>"><?= $prod['nome_produto'] . ' | estoque: ' . $prod['estoque'] . 'qtd' . '| R$: ' . $prod['valor_produto'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xs-12">
                                        <button name="btnCarregar" onclick=" return Devolucao()" class="btn btn-success col-md-12 col-xs-12 ">Carregar Produto</button>
                                    </div>

                                    <?php if ($dados[0]['id_produto'] != '') { ?>
                                        <div id="CarregaDados">
                                            <div class="col-md-8">
                                                <div class="form-group" id="divDadosNome">
                                                    <label>Produto</label>
                                                    <input name="nomeProduto" value="<?= ($dados[0]['nome_produto'] != '' ? $dados[0]['nome_produto'] : '') ?>" id="nomeProduto" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <div class="form-group" id="divDadosNome">
                                                    <label>Valor</label>
                                                    <input name="valorProduto" id="valorProduto" value="<?= ($dados[0]['valor_produto'] != '' ? $dados[0]['valor_produto'] : '') ?>" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" id="divProd">
                                                    <label>Tipo de devolução</label>
                                                    <select name="tipoDevolucao" id="tipoDevolucao" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
                                                        <option value="">Selecione</option>
                                                        <option value="1">estoque</option>
                                                        <option value="2">Descarte</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group" id="divProd">
                                                    <label>Escolha o Cliente</label>
                                                    <select name="cliente" id="cliente" class="produto form-control" onfocusout="SinalizaCampo('divProd','produto')">
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
                                                    <input name="dataDevolucao" id="dataDevolucao" type="date" value="<?= date('Y-m-d') ?>" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="divDadosNome">
                                                    <label>Descrição da Devolução</label>
                                                    <textarea name="descricao" id="descricao" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <button name="btn_gravar" class="btn btn-success col-md-6 col-xs-12 ">Registrar Devolução</button>
                                                <a href="consultar_categoria.php" class="btn btn-warning col-md-6 col-xs-12">Voltar</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Produtos Devolvidos 
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            <th>Cod Desconto</th>    
                                            <th>Nome Produto</th>
                                            <th>Data Devolução</th>
                                            <th>Valor</th>
                                            <th>Status</th>
                                            <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ProdDevolvido as $devol) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $devol['dvlID'] ?></td>
                                                    <td><?= $devol['nome_produto'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($devol['dvlDT']) ?></td>
                                                    <td><?= $devol['dvlProdValor'] ?></td>
                                                    <td><?= ($devol['dvlStatus']=='L'? "<span class=\"btn btn-warning btn-xs\">Liberado</span>":"<span class=\"btn btn-danger btn-xs\">Usado</span>") ?></td>
                                                    <td style="padding: 3px 1px 3px 3px;">
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $devol['dvlID'] ?>"><i title="Excluir devolução" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>
                                                        <div class="modal fade" id="modalExcluir<?= $devol['dvlID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Deseja excluir a devolução do produto: <br>
                                                                        <label>Nome do Produto: <?= $devol['nome_produto'] ?></label><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <a href="devolucaoProduto.php?idExcluir=<?= $devol['dvlID'] ?>" class="btn btn-primary">Sim</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
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