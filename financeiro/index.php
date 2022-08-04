<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/PrincipalDAO.php';
require_once '../DAO/VendaDAO.php';
$objVenda = new VendaDAO();
$dadosVenda = $objVenda->ConsultarVenda();
require_once '../DAO/ProdutoDAO.php';
$objResult = new PrincipalDAO();
$objProd = new ProdutoDAO();

$vendaMes = $objVenda->VendaMes();


$retCliente = $objResult->GetClientes();
$retEmpresa = $objResult->GetEmpresa();
$produto = $objResult->GetProduto();
$fornecedores = $objResult->GetFornecedor();
$produtos = $objProd->ResultadoProdutoEstoque();
$movimentos = $objResult->GetMovimento();
$MovDebito = $objResult->GetMovimentoDebito();
$MovCredito = $objResult->GetMovimentoCredito();
$vendaDia = $objResult->GetVendaDia();


?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>
<style>
    #PainelAdmin {
        border-color: #B0C4DE;
        border-style: solid 1px;
        color: white;
        background-color: #023e66;

    }


    #PainelAdmin:hover {
        background-color: #4682B4;
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(red, green, blue, alpha);
        color: white;
    }

    p:hover {
        color: white;
    }

    a:hover {
        text-decoration: none;
    }

    .main-text {
        font-size: 14px;
    }

    .text-box {
        padding: 2px 2px 2px 2px";

    }

    i {
        width: 30px;
        height: 30px;
    }
</style>

<body>
    <div id="wrapper">
        <?php include_once('_topo.php'); ?>
        <?php include_once('_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($retEmpresa as $key => $value) { ?>
                            <h2>Painel Administrativo</h2>
                            <h5>Seja bem vindo <strong><?= $value['nome_empresa'] ?></strong></h5>
                        <?php } ?>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <?php foreach ($vendaDia as $key => $venda) { ?>
                                    <h3><?= ($venda['item_valor'] == 0 ? "0" : $venda['item_valor']) ?> </h3>
                                <?php } ?>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Venda do dia

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa-edit fa-5x"></i>
                                <?php foreach ($movimentos as $cv) {
                                    if ($cv['data_movimento'] == UtilDao::DataAtual()) {
                                        $totalDebito = $totalDebito + $cv['valor_movimento'];
                                    }
                                } ?>


                                <h3><?= number_format("$totalDebito", 2, ",", "."); ?> </h3>
                            </div>
                            <div style="background-color:#db0610" class="panel-footer back-footer-red">
                                Boletos a pagar no Dia

                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">


                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Dados das vendas
                            </div>
                            <div class="panel-body">
                                <div id="columnchart_material" style="width: 100%; height: 80%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Valores de Credito e Débito
                            </div>
                            <div class="panel-body">

                                <div id="donutchart" style="width: 100%; height: 80%;"></div>

                            </div>
                        </div>
                    </div>

                    <hr />

                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Produtos com Baixo Estoque
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Produto</th>
                                                <th>Estoque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $prod) {?>
                                            <tr>
                                                <td><a target="_blank" href="<?= $prod['path'] ?>"><img height="50" width="50" src="<?= $prod['path'] ?>" alt=""></a></td>
                                                <td><?= $prod['nome_produto'] ?></td>
                                                <td><?= $prod['estoque'] ?></td>
                                                
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /. PAGE INNER  -->
            </div>

        </div>

        <!-- BOOTSTRAP SCRIPTS -->
        <!-- METISMENU SCRIPTS -->

        <!-- MORRIS CHART SCRIPTS -->
        <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="assets/js/morris/morris.js"></script>
        <!-- CUSTOM SCRIPTS -->

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([

                    ['ValorDebito', 'ValorCredito'],
                    ['Valor Credito', <?php echo ($MovCredito[0]["Total"]!=''?$MovCredito[0]["Total"]:'0,00') ?>],
                    ['Valor Débito', <?php echo ($MovDebito[0]["Total"]!=''?$MovDebito[0]["Total"]:'0,00') ?>]

                ]);

                var options = {
                    title: 'Valores de Credito e Débito',
                    pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
            }
        </script>


        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['bar']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Mes', 'Receita líquida'],


                    <?php
                    require_once '../DAO/ProdutoDAO.php';
                    $objResult = new PrincipalDAO();
                    $objProd = new ProdutoDAO();

                    $vendaMes = $objVenda->VendaMes();


                    foreach ($vendaMes as $dados) {
                        $valor = $dados['TotalVenda'];
                        $Mes = $dados['Mes'];

                    ?>['<?php echo $Mes ?>', '<?php echo $valor ?>'],
                    <?php } ?>
                ]);

                var options = {
                    chart: {
                        title: 'Dados das vendas/Mês',
                        subtitle: 'Dados tirados em: <?php echo date('d/m/Y h:i') ?>',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }

            
        </script>

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










<html>

<head>

</head>

<body>

</body>

</html>