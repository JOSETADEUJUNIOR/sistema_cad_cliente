<?php

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
$pag_ret = 'consultar_venda.php';

$objMov = new MovimentoDAO();

if (isset($_POST['btnFiltrar'])) {

    $dtIncial = trim($_POST['dtInicial']);
    $dtFinal = trim($_POST['dtFinal']);
    @$movimentos = $objMov->ConsultarMovimento($dtIncial, $dtFinal);

    if (!is_array($movimentos)) {
        $ret = 0;
    }else {
        if (count($movimentos)==0) {
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
                        <h2>Consultar Vendas</h2>
                        <h5>Aqui você poderá consultar suas vendas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="consultar_venda.php" method="post">

                    
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Data inicial</label>
                            <input name="dtInicial" id="dtInicial" value="<?= @$dtIncial ?>" type="date" placeholder="Escolha a data inicial" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Data Final</label>
                            <input name="dtFinal" id="dtFinal" value="<?= @$dtFinal ?>" type="date" placeholder="Escolha a data Final" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                        <button id="btnFiltrar" name="btnFiltrar" class="btn btn-info" onclick="return ValidarConsultaMov()">Pesquisar</button>
                    </div>

                </form>


                <hr>
                <?php if (is_countable(@$movimentos) && count($movimentos)> 0):?>
                <?php if (isset($movimentos) && count($movimentos) > 0) { ?>
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Vendas realizadas  
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Data venda</th>
                                                <th>produto</th>
                                                <th>qtd</th>
                                                <th>Valor</th>
                                                <th>Valor Total</th>
                                                


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (is_array(@$movimentos) || is_object(@$movimentos))
                                                foreach (@$movimentos as $mov) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= UtilDAO::ExibirDataBr($mov['data_venda']) ?></td>
                                                    <td><?= $mov['nome_produto'] ?></td>
                                                    <td><?= $mov['qtd_produto'] ?></td>
                                                    <td><?= $mov['item_valor'] ?></td>
                                                    <td><?= ($mov['item_valor']) * ($mov['qtd_produto']).',00' ?></td>
                                                   
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
            <?php endif ?>
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