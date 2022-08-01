<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/MovimentoContaDAO.php';
$dtIncial = '';
$dtFinal = '';
$tipo = '';

$pag_ret = 'consultar_movimento.php';

if (isset($_GET['idExcluir']) && is_numeric($_GET['idExcluir'])) {
    
    $objMov = new MovimentoContaDAO();
    $idMov = $_GET['idExcluir'];
    $ret = $objMov->ExcluirMovimento($idMov);
}

if (isset($_POST['btnFiltrar'])) {

    $dtIncial = trim($_POST['dtInicial']);
    $dtFinal = trim($_POST['dtFinal']);
    $tipo = trim($_POST['tipo']);

    $objMov = new MovimentoContaDAO();
    $movimentos = $objMov->ConsultarMovimento($dtIncial, $dtFinal, $tipo);

    if (!is_array($movimentos)) {

        $ret = 0;
    } else {
        if (count($movimentos) == 0) {
            $ret = -3;
        }
    }
    
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
                        <h2>Consultar Movimentos</h2>
                        <h5>Aqui você poderá consultar seus movimentos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="consultar_movimento.php" method="post">

                    <div class="col-md-2">
                        <div class="form-group" id="divTipo">
                            <label>Tipo*</label>
                            <select name="tipo" id="tipo" class="form-control" onfocusout="SinalizaCampo('divTipo','tipo')">
                                <option value="3" <?= $tipo == 3 ? 'selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipo == 1 ? 'selected' : '' ?>>Credito</option>
                                <option value="2" <?= $tipo == 2 ? 'selected' : '' ?>>Débito</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data inicial</label>
                            <input name="dtInicial" id="dtInicial" value="<?= $dtIncial ?>" type="date" placeholder="Escolha a data inicial" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data Final</label>
                            <input name="dtFinal" id="dtFinal" value="<?= $dtFinal ?>" type="date" placeholder="Escolha a data Final" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                        <button id="btnFiltrar" name="btnFiltrar" class="btn btn-info" onclick="return ValidarConsultaMov()">Pesquisar</button>
                    </div>

                </form>
                <hr>
                <?php if (isset($movimentos) && count($movimentos) > 0) { ?>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Movimentos
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Valor</th>
                                                    <th>Categoria</th>
                                                    <th>Empresa</th>
                                                    <th>Conta</th>
                                                    <th>Tipo</th>
                                                    <th>Obs</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($movimentos as $mov) { ?>

                                                    <tr class="odd gradeX">
                                                        <td><?= UtilDAO::ExibirDataBr($mov['data_movimento']) ?></td>
                                                        <td><?= explode('.',$mov['valor_movimento'])[0].','.explode('.',$mov['valor_movimento'])[1] ?></td>
                                                        <td><?= $mov['nome_categoria'] ?></td>
                                                        <td><?= $mov['nome_fornecedor'] ?></td>
                                                        <td><?= $mov['banco_conta'] ?></td>
                                                        <td><?= ($mov['tipo_movimento'] == 1 ? "Credito" : "Débito") ?></td>
                                                        <td><?= $mov['observacao_movimento'] ?></td>

                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $mov['id_movimento'] ?>" class="btn btn-danger btn-xs">Excluir</a>

                                                            <div class="modal fade" id="modalExcluir<?= $mov['id_movimento'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Deseja excluir o movimento: <br>
                                                                            <label>Data: <?= UtilDAO::ExibirDataBr($mov['data_movimento']) ?> </label><br>
                                                                            <label>Valor: <?= $mov['valor_movimento'] ?></label><br>
                                                                            <label>Categoria: <?= $mov['nome_categoria'] ?></label><br>
                                                                            <label>Empresa: <?= $mov['nome_fornecedor'] ?></label></br>
                                                                            <label>Conta: <?= $mov['banco_conta'] . ' / ' . $mov['agencia_conta'] . ' / ' . $mov['numero_conta'] ?></label>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                            <a href="consultar_movimento.php?idExcluir=<?= $mov['id_movimento'] ?>" class="btn btn-primary">Sim</a>
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
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- /. PAGE INNER  -->
        </div>

        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
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