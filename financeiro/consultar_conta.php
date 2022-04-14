<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ContaDAO.php';

$objConta = new ContaDAO();
$contas = $objConta->ConsultarConta();
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
                        <h2>Consultar Conta</h2>
                        <h5>Aqui você poderá consultar suas contas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Contas Cadastradas  <span> <a href="nova_conta.php"><i title="Criar Nova Conta" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome do Banco</th>
                                            <th>Agencia</th>
                                            <th>Numero da Conta</th>
                                            <th>Saldo</th>
                                           
                                            <th>Ação</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i<count($contas) ; $i++) { ?> 
                                        
                                        <tr class="odd gradeX">
                                            <td><?= $contas[$i]['banco_conta']?></td>
                                            <td><?= $contas[$i]['agencia_conta']?></td>
                                            <td><?= $contas[$i]['numero_conta']?></td>
                                            <td><?= $contas[$i]['saldo_conta']?></td>
                                            
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="alterar_conta.php?cod=<?=$contas[$i]['id_conta']?>">alterar</a>
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
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
    
</body>

</html>