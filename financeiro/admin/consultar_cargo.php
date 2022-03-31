<?php
require_once './DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once './DAO/CargoDAO.php';

$objCargo = new CargoDAO();

$cargos = $objCargo->ConsultarCargo();


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
                    <?php include_once('_msg.php') ?> 
                        <h2>Consultar Cargos</h2>
                        <h5>Aqui você poderá consultar seus cargos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                     
                    <div class="panel-heading">
                             Cargos cadastrados  <span> <a style="color:white;" href="pdfCargo.php" target="_blank"><i title="Emitir Relatorio de Cargo" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span>   <span> <a style="color:white;" href="novo_cargo.php"><i title="Criar Novo Cargo" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    
                                    <thead>
                                        <tr>
                                            <th>Nome do Cargo</th>
                                            <th>Descrição do Cargo</th>
                                            <th >Ação</th>
                                            
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i=0; $i<count($cargos) ; $i++) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $cargos[$i]['nome_cargo']?></td>
                                            <td><?= $cargos[$i]['descricao_cargo']?></td>
                                            <td style="padding: 3px 1px 3px 3px;"> 
                                                <a href="alterar_cargo.php?cod=<?= $cargos[$i]['id_cargo']?>"><i title="Alterar cargo" style=" color:#c09046; font-size:18px; margin-right:10px" class="fa fa-pencil"></i></a>
                                                <!--<a href="alterar_cargo.php"><i title="Excluir Cliente" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>-->
                                            </td>
                                        </tr>
                                    <?php }?>
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

    
</body>
<script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
</html>