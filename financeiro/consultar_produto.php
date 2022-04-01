<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ProdutoDAO.php';
require_once '../DAO/UtilDAO.php';
$pag_ret = 'consultar_produto.php';

$objProd = new ProdutoDAO();
$produtos = $objProd->ConsultarProduto();

if (isset($_GET['idExcluir']) && is_numeric($_GET['idExcluir'])) {
    
    $idProd = trim($_GET['idExcluir']);
    $ret = $objProd->ExcluirProduto($idProd);
    $produtos = $objProd->ConsultarProduto();
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
                    <?php include_once('_msg.php'); ?>
                        <h2>Consultar Produto</h2>
                        <h5>Aqui você poderá consultar seus produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Produtos cadastrados <span> <a style="color:white;" href="novo_produto.php"><i title="Criar Novo Produto" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Produto</th>
                                                <th>Estoque</th>
                                                <th>Valor</th>
                                                <th>Dt Cadastro</th>
                                                <th>Fornecedor</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $prod) {?>
                                            
                                         
                                                <tr class="odd gradeX">
                                                    <td><?= $prod['cod_produto'] ?></td>
                                                    <td><?= $prod['nome_produto'] ?></td>
                                                    <td><?= $prod['estoque'] ?></td>
                                                    <td><?= $prod['valor_produto'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($prod['data_cadastro']) ?></td>
                                                    <td><?= $prod['nome_fornecedor'] ?></td>
                                                    <td style="padding: 2px 1px 2px 2px;">
                                                        <a href="alterar_produto.php?cod=<?= $prod['id_produto'] ?>"><i title="Alterar Produto" style=" color:#c09046; font-size:16px;margin-left:5px; margin-right:5px" class="fa fa-pencil"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $prod['id_produto'] ?>"><i title="Excluir Produto" style=" color:red; font-size:16px; margin-left:1px" class="fa fa-trash"></i></a>
                                                        <div class="modal fade" id="modalExcluir<?= $prod['id_produto'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Deseja excluir o produto: <br>
                                                                        <label>Codigo: <?= $prod['cod_produto'] ?></label><br>
                                                                        <label>Nome do produto: <?= $prod['nome_produto'] ?></label>
                                                                        <label>Valor do produto: <?= $prod['valor_produto'] ?></label>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <a href="consultar_produto.php?idExcluir=<?= $prod['id_produto'] ?>" class="btn btn-primary">Sim</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#" data-toggle="modal" data-target="#modalDetalhes<?= $prod['id_produto'] ?>"><i title="Detalhes do Produto" style=" color:blue; font-size:18px; margin-left:15px" class="fa fa-chevron-down"></i></a>
                                                        <div class="modal fade" id="modalDetalhes<?= $prod['id_produto'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Detalhes do Produto</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Categoria</th>
                                                                                        <th>SubCategoria</th>
                                                                                        <th>Descrição</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="odd gradeX">
                                                                                        <td><?= $prod['nome_categoria'] ?></td>
                                                                                        <td><?= $prod['nome_subcategoria'] ?></td>
                                                                                        <td><?= $prod['descricao_produto'] ?></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Voltar</button>
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
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>