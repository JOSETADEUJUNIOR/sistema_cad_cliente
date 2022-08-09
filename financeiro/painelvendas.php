<?php

use Mpdf\Tag\Span;

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/VendaDAO.php';
$vd = new VendaDAO();

$vendas = $vd->ListagemGeralVenda();

foreach ($vendas as $venda) {
    if ($venda['faturado'] == 0) {

        $totalVendas  = $venda['Total'] + $totalVendas;
    } else {
        $totalPrazo = $venda['Total'] + $totalPrazo;
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
                        <?php include('_msg.php') ?>
                        <h2>Vendas realizadas</h2>
                        <h5>Visualize as vendas realizadas e vendas a prazo. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Vendas realizadas <h5 style="color:white; text-align: right;">Vendas realizadas: <?= '<strong>R$:' . number_format($totalVendas, 2, ",", ".") . '</strong>' ?> </br> Vendas a receber: <?= '<strong>R$:' . number_format($totalPrazo, 2, ",", ".") . '</strong>' ?></h5>

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID Venda</th>
                                                <th>Cliente</th>
                                                <th>Data Venda</th>
                                                <th>Valor</th>
                                                <th>Faturada?</th>
                                                <th>Data Prazo</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($vendas as $vend) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $vend['id_venda'] ?></td>
                                                    <td><?= $vend['nome_cliente'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($vend['data_venda']) ?></td>
                                                    <td><?= $vend['Total'] ?></td>
                                                    <td><?= ($vend['faturado'] == 1 ? '<span class="btn btn-warning btn-xs">não</span>' : '<span class="btn btn-success btn-xs">Sim</span>') ?></td>
                                                    <td><?= ($vend['data_prazo'] != "" ? '<span class="btn btn-warning btn-xs">' . UtilDAO::ExibirDataBr($vend['data_prazo']) . '</span>' : "<span class=\"btn btn-info btn-xs\">Venda à vista</span>") ?></td>
                                                    <td><?php if ($vend['faturado'] > 0) { ?>
                                                            <a href="pdv2.php?idVenda=<?= $vend['id_venda'] ?>" class="btn btn-warning btn-xs">Faturar?</a>
                                                    </td>
                                                <?php } else { ?>
                                                    <button name="btn_finalizar_Venda" class="btn btn-success btn-xs">Faturada</button>
                                                <?php } ?>

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