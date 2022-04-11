<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ClienteDAO.php';

$objcliente = new ClienteDAO();
$clientes = $objcliente->ConsultarCliente();


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
                <form id="form1" action="pdf_rel_venda.php" target="_blank" method="get">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Relatório de Vendas
                                </div>
                                <div class="panel-body">
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

                                    <div class="col-md-10">
                                        <div class="form-group" id="divCat">
                                            <label>Selecione o Cliente</label>
                                            <select name="cliente" id="cliente" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                <option value="">Escolher cliente</option>
                                                <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                                    <option value="<?= $clientes[$i]['id_cliente'] ?>"><?= $clientes[$i]['nome_cliente'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                                        <button id="btnFiltrar" name="btnFiltrar" class="btn btn-info" onclick="return ValidarConsultaMov()">Pesquisar</button>
                                    </div>
                                    <div class="col-md-12" style="display:block; padding: 24px 10px">
                                        <button id="btnVendaHoje" name="btnVendaHoje" class="btn btn-warning" >Venda do dia</button>
                                    </div>

                </form>

            </div>
        </div>
    </div>
    </div>
    </div>




    <hr>

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