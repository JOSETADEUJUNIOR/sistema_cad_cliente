<?php

require_once '../DAO/ProdutoDAO.php';
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
                                                <th>Codigo Barras</th>
                                                <th>Nome Produto</th>
                                                <th>Descrição Produto</th>
                                                <th>Valor</th>
                                                <th>Data Cadastro</th>
                                                <th>Nome Fornecedor</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $prod) {
                                                # code...
                                            } { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $prod['cod_produto'] ?></td>
                                                    <td><?= $prod['nome_produto'] ?></td>
                                                    <td><?= $prod['descricao_produto'] ?></td>
                                                    <td><?= $prod['valor_produto'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($prod[$i]['data_cadastro']) ?></td>
                                                    <td><?= $prod['nome_fornecedor'] ?></td>
                                                    <td style="padding: 3px 1px 3px 3px;">
                                                        <a href="alterar_produto.php?cod=<?= $prod['id_produto'] ?>"><i title="Alterar Produto" style=" color:#c09046; font-size:18px;margin-left:20px; margin-right:5px" class="fa fa-pencil"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $prod['id_produto'] ?>"><i title="Excluir Categoria" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>
                                                        <div class="modal fade" id="modalExcluir<?= $prod['id_produto'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Deseja excluir o produto: <br>
                                                                        <label>Nome do produto: <?= $prod['nome_produto'] ?></label><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <a href="consultar_categoria.php?idExcluir=<?= $prod['id_produto'] ?>" class="btn btn-primary">Sim</a>
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