<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ClienteDAO.php';
require_once '../DAO/UtilDAO.php';
$objCliente = new ClienteDAO();

$clientes = $objCliente->ConsultarCliente();


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
                        <h2>Consultar Clientes</h2>
                        <h5>Aqui você poderá consultar seus clientes. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Clientes cadastrados <span> <a style="color:white;" href="novo_cliente.php"><i title="Criar Novo Cliente" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome Cliente</th>
                                            <th>Bairro</th>
                                            <th>Cep</th>
                                            <th>Cidade</th>
                                            <th>Dt Nascimento</th>
                                            <th>Cpf</th>
                                            <th>Ações</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i=0; $i<count($clientes) ; $i++) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $clientes[$i]['nome_cliente']?></td>
                                            <td><?= $clientes[$i]['bairro_cliente']?></td>
                                            <td><?= $clientes[$i]['cep_cliente']?></td>
                                            <td><?= $clientes[$i]['cidade_cliente']?></td>
                                            <td><?= UtilDAO::ExibirDataBr($clientes[$i]['data_nascimento'])?></td>
                                            <td><?= $clientes[$i]['cpf_cliente']?></td>
                                            <td style="padding: 3px 1px 3px 3px;"> 
                                                <a href="alterar_cliente.php?cod=<?= $clientes[$i]['id_cliente']?>"><i title="Alterar Cargo" style=" color:#c09046; font-size:18px; margin-right:10px" class="fa fa-pencil"></i></a>
                                                <!--<a href="excluir_cliente.php"><i title="Excluir Cargo" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>-->
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