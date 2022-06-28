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
$produtos = $objProd->TopProduto();
$movimentos = $objResult->GetMovimento();
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
                        <?php foreach ($movimentos as $cv) {

                            if ($cv['data_movimento'] == UtilDao::DataAtual()) {
                                echo  "<script>
                                Swal.fire({
                        
                                    icon: 'warning',
                                    title: 'Alerta',
                                    width: 'auto',
                                    html: '<h3>Existem boletos com vencimento para data de hoje!</h3>',
                                    showConfirmButton: true,
                                    
                                })
                  
                            </script>";
                            }
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" style="text-decoration: none;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Dados da Empresa<i title="Exibir dados Empresa" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-chevron-down"></i></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">


                                            <div class="panel-body col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Cnpj</th>
                                                                <th>Descrição da empresa</th>
                                                                <th>Dt Abertura</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($retEmpresa as $key => $value) { ?>
                                                                <tr class="odd gradeX">
                                                                    <td><?= $value['cnpj_empresa'] ?></td>
                                                                    <td><?= $value['descricao_empresa'] ?></td>
                                                                    <td><?= UtilDAO::ExibirDataBr($value['data_abertura']) ?></td>


                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div id="PainelAdmin" class="panel panel-back noti-box">
                            <span style="background-color: white;" class="icon-box bg-color-red set-icon">
                                <i style="color:#023e66" class="fa fa-shopping-cart"></i>
                            </span>
                            <div class="text-box" style="padding:2px 2px 2px 2px">
                                <?php foreach ($vendaDia as $key => $venda) { ?>
                                    <a style="color:white;text-decoration-line: none;" title="Venda do Dia" href="emitir_venda.php">
                                        <p class="main-text"><b><?= ($venda['item_valor'] == 0 ? "0" : $venda['item_valor']) ?> </b></p>
                                        <p> Venda dia </p>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div id="PainelAdmin" class="panel panel-back noti-box">
                            <span style="background-color: white;" class="icon-box bg-color-red set-icon">
                                <i style="color:#023e66" class="fa fa-shopping-cart"></i>
                            </span>
                            <div class="text-box" style="padding:2px 2px 2px 2px">

                                <a style="color:white;text-decoration-line: none;" title="Venda do Dia" href="emitir_venda.php">
                               

                                <?php foreach ($vendaMes as $vm) { ?>
                                    <?php if ($vm['Mes'] == date('m')) { ?>
                                        <p class="main-text"><b> <?= ($vm['Mes'] != date('m') ? "0" : $vm['TotalVenda']) ?></b></p>
                                    <?php } ?>
                                <?php } ?>
                                <p> Venda Mês </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div id="PainelAdmin" class="panel panel-back noti-box">

                            <span style="background-color: white;"  class="icon-box bg-color-red set-icon">
                                <i style="color:#023e66" class="fa fa-list"></i>
                            </span>
                            <div class="text-box">
                            <a style="color:white;text-decoration-line: none;" href="consultar_cliente.php">   
                           
                            <?php foreach ($retCliente as $key => $value) { ?>
                                <p style="font-size:20px" class="main-text"><?= $value['total']?></p>
                                <?php } ?>
                                <p> Clientes</p>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-3 col-xs-12">
                        <div id="PainelAdmin" class="panel panel-back noti-box">
                            <span style="background-color: white;" class="icon-box bg-color-red set-icon">
                                <i style="color:#023e66" class="fa fa-archive"></i>
                            </span>
                            <div class="text-box">
                                <a style="color:white;text-decoration-line: none;" href="consultar_produto.php">
                              
                                <?php foreach ($produto as $prod) { ?>
                                        <p style="font-size:20px" class="main-text"><?= $prod['id_produto']?></p>
                                <?php } ?>
                                <p>Produtos</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>


                <!-- /. ROW  -->
                <hr />
                <div class="row"> 
                    
                      
                               <div class="col-md-12 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>            
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <!--    Context Classes  -->
                        <div class="panel panel-primary">

                            <div class="panel-heading" style="color:white">
                                Contas a pagar perto do Vencimento
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Conta</th>
                                                <th>Valor</th>
                                                <th>Data vencimento</th>
                                                <th>Observação</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($movimentos as $mov) { ?>
                                                <tr class="">
                                                    <td><?= $mov['banco_conta'] ?></td>
                                                    <td><?= explode('.', $mov['valor_movimento'])[0] . ',' . explode('.', $mov['valor_movimento'])[1] ?></td>
                                                    <td><?= UtilDao::ExibirDataBr($mov['data_movimento']) ?></td>
                                                    <td><?= $mov['observacao_movimento'] ?></td>
                                                    <td><a href="consultar_movimento.php"><?= $mov['data_movimento'] < UtilDao::DataAtual() ? "<span class=\"btn btn-danger btn-xs\">vencida</span>" : ($mov['data_movimento'] == UtilDao::DataAtual() ? "<span class=\"btn btn-success btn-xs\">Vence Hoje</span>" : ($mov['data_movimento'] > UtilDao::DataAtual() ? "<span class=\"btn btn-info btn-xs\">Á vencer</span>" : "asdasd")) ?></a></td>
                                                </tr>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  end  Context Classes  -->
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="display:inline">
                        <!--    Context Classes  -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Ultimos Produtos cadastrados
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Nome</th>
                                                <th>Valor</th>
                                                <th>Estoque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $prod) { ?>
                                                <tr class="info">
                                                    <td><?= $prod['nome_produto'] ?></td>
                                                    <td><?= $prod['valor_produto'] ?></td>
                                                    <td><?= $prod['estoque'] ?></td>
                                                </tr>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  end  Context Classes  -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <!--    Context Classes  -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Produtos Mais Vendidos
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Nome</th>
                                                <th>Valor</th>
                                                <th>Estoque</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $prod) { ?>
                                                <tr class="info">
                                                    <td><?= $prod['nome_produto'] ?></td>
                                                    <td><?= $prod['valor_produto'] ?></td>
                                                    <td><?= $prod['estoque'] ?></td>
                                                </tr>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  end  Context Classes  -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="float:right">
                        <!--    Context Classes  -->
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Ultimas Vendas Realizadas
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>Cod Venda</th>
                                                <th>Data Venda</th>
                                                <th>Cliente</th>
                                                <th>Produto</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dadosVenda as $venda) { ?>
                                                <tr class="info">
                                                    <td><?= $venda['codVenda'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($venda['data_venda']) ?></td>
                                                    <td><?= $venda['nome_cliente'] ?></td>
                                                    <td><?= $venda['nome_produto'] ?></td>
                                                    <td><?= $venda['item_valor'] ?></td>
                                                </tr>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--  end  Context Classes  -->
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

    <script>
        /*=============================================================
    Authour URI: www.binarycart.com
    Version: 1.1
    License: MIT
    
    http://opensource.org/licenses/MIT

    100% To use For Personal And Commercial Use.
   
    ========================================================  */

        (function($) {
            "use strict";
            var mainApp = {

                main_fun: function() {
                    /*====================================
                    METIS MENU 
                    ======================================*/
                    $('#main-menu').metisMenu();

                    /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
                    $(window).bind("load resize", function() {
                        if ($(this).width() < 768) {
                            $('div.sidebar-collapse').addClass('collapse')
                        } else {
                            $('div.sidebar-collapse').removeClass('collapse')
                        }
                    });

                    /*====================================
            MORRIS BAR CHART
         ======================================*/
                    Morris.Bar({
                        element: 'morris-bar-chart1',
                        data: [{
                            y: '2022',
                            a: 22222,
                            b: 90
                        }, {
                            y: '2007',
                            a: 75,
                            b: 65
                        }, {
                            y: '2008',
                            a: 50,
                            b: 40
                        }, {
                            y: '2009',
                            a: 75,
                            b: 65
                        }, {
                            y: '2010',
                            a: 50,
                            b: 40
                        }, {
                            y: '2011',
                            a: 75,
                            b: 65
                        }, {
                            y: '2012',
                            a: 100,
                            b: 90
                        }],
                        xkey: 'y',
                        ykeys: ['a', 'b'],
                        labels: ['Series A', 'Series B'],
                        hideHover: 'auto',
                        resize: true
                    });

                    /*====================================
          MORRIS DONUT CHART
       ======================================*/
                    Morris.Donut({
                        element: 'morris-donut-chart',
                        data: [{
                            label: "Download Sales",
                            value: 12
                        }, {
                            label: "In-Store Sales",
                            value: 30
                        }, {
                            label: "Mail-Order Sales",
                            value: 20
                        }],
                        resize: true
                    });

                    /*====================================
         MORRIS AREA CHART
      ======================================*/

                    Morris.Area({
                        element: 'morris-area-chart',
                        data: [{
                            period: '2010 Q1',
                            iphone: 2666,
                            ipad: null,
                            itouch: 2647
                        }, {
                            period: '2010 Q2',
                            iphone: 2778,
                            ipad: 2294,
                            itouch: 2441
                        }, {
                            period: '2010 Q3',
                            iphone: 4912,
                            ipad: 1969,
                            itouch: 2501
                        }, {
                            period: '2010 Q4',
                            iphone: 3767,
                            ipad: 3597,
                            itouch: 5689
                        }, {
                            period: '2011 Q1',
                            iphone: 6810,
                            ipad: 1914,
                            itouch: 2293
                        }, {
                            period: '2011 Q2',
                            iphone: 5670,
                            ipad: 4293,
                            itouch: 1881
                        }, {
                            period: '2011 Q3',
                            iphone: 4820,
                            ipad: 3795,
                            itouch: 1588
                        }, {
                            period: '2011 Q4',
                            iphone: 15073,
                            ipad: 5967,
                            itouch: 5175
                        }, {
                            period: '2012 Q1',
                            iphone: 10687,
                            ipad: 4460,
                            itouch: 2028
                        }, {
                            period: '2012 Q2',
                            iphone: 8432,
                            ipad: 5713,
                            itouch: 1791
                        }],
                        xkey: 'period',
                        ykeys: ['iphone', 'ipad', 'itouch'],
                        labels: ['iPhone', 'iPad', 'iPod Touch'],
                        pointSize: 2,
                        hideHover: 'auto',
                        resize: true
                    });

                    /*====================================
    MORRIS LINE CHART
 ======================================*/
                    Morris.Line({
                        element: 'morris-line-chart',
                        data: [{
                            y: '2006',
                            a: 100,
                            b: 90
                        }, {
                            y: '2007',
                            a: 75,
                            b: 65
                        }, {
                            y: '2008',
                            a: 50,
                            b: 40
                        }, {
                            y: '2009',
                            a: 75,
                            b: 65
                        }, {
                            y: '2010',
                            a: 50,
                            b: 40
                        }, {
                            y: '2011',
                            a: 75,
                            b: 65
                        }, {
                            y: '2012',
                            a: 100,
                            b: 90
                        }],
                        xkey: 'y',
                        ykeys: ['a', 'b'],
                        labels: ['Series A', 'Series B'],
                        hideHover: 'auto',
                        resize: true
                    });


                },

                initialization: function() {
                    mainApp.main_fun();

                }

            }
            // Initializing ///

            $(document).ready(function() {
                mainApp.main_fun();
            });

        }(jQuery));
    </script>


</body>

</html>