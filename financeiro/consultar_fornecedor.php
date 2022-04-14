<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();

require_once '../DAO/FornecedorDAO.php';
$pag_ret = 'consultar_fornecedor.php';

$objForn = new FornecedorDAO();
$fornecedores = $objForn->ConsultarFornecedor();

if (isset($_GET['idExcluir']) && is_numeric($_GET['idExcluir'])) {

    $idForn = trim($_GET['idExcluir']);
    $ret = $objForn->ExcluirFornecedor($idForn);
    $produtos = $objForn->ConsultarFornecedor();
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
                        <h2>Consultar Empresas</h2>
                        <h5>Aqui você poderá consultar seus Fornecedores/Empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Empresas cadastradas <span> <a style="color:white;" href="pdf_fornecedor.php" target="_blank"><i title="Emitir Relatorio de Empresa" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span> <span> <a style="color:white;" href="novo_fornecedor.php"><i title="Criar nova Empresa" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Cnpj</th>
                                                <th>Nome Empresa</th>
                                                <th>Telefone</th>
                                                <th>E-mail</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($fornecedores as $forn) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $forn['cnpj_fornecedor'] ?></td>
                                                    <td><?= $forn['nome_fornecedor'] ?></td>
                                                    <td><?= $forn['telefone_fornecedor'] ?></td>
                                                    <td><?= $forn['email_fornecedor'] ?></td>
                                                    <td style="padding: 3px 1px 3px 3px;">
                                                        <a href="alterar_fornecedor.php?cod=<?= $forn['id_fornecedor'] ?>"><i title="Alterar Empresa" style=" color:#c09046; font-size:14px;margin-left:2px; margin-right:2px" class="fa fa-pencil"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $forn['id_fornecedor'] ?>"><i title="Excluir Empresa" style=" color:red; font-size:14px; margin-left:2px" class="fa fa-trash"></i></a>
                                                        <div class="modal fade" id="modalExcluir<?= $forn['id_fornecedor'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Deseja excluir o Empresa: <br>
                                                                        <label>Nome da Empresa: <?= $forn['nome_fornecedor'] ?></label><br>
                                                                        <label>Cnpj da Empresa: <?= $forn['cnpj_fornecedor'] ?></label>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <a href="consultar_fornecedor.php?idExcluir=<?= $forn['id_fornecedor'] ?>" class="btn btn-primary">Sim</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="#" data-toggle="modal" data-target="#modalDetalhes<?= $forn['id_fornecedor'] ?>"><i title="Detalhes da Empresa" style=" color:blue; font-size:14px; margin-left:5px" class="fa fa-chevron-down"></i></a>
                                                        <div class="modal fade" id="modalDetalhes<?= $forn['id_fornecedor'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Detalhes da Empresa</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Rua</th>
                                                                                        <th>CEP</th>
                                                                                        <th>Bairro</th>
                                                                                        <th>Cidade</th>
                                                                                        <th>Estado</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="odd gradeX">
                                                                                        <td><?= $forn['rua_fornecedor'] ?></td>
                                                                                        <td><?= $forn['cep_fornecedor'] ?></td>
                                                                                        <td><?= $forn['bairro_fornecedor'] ?></td>
                                                                                        <td><?= $forn['cidade_fornecedor'] ?></td>
                                                                                        <td><?= $forn['estado_fornecedor'] ?></td>
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