<?php
require_once '../../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../../DAO/FuncionarioDAO.php';


$objFuncionario = new FuncionarioDAO();

$funcionarios = $objFuncionario->ConsultarFuncionario();


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
                        <h2>Consultar Funcionários</h2>
                        <h5>Aqui você poderá consultar seus funcionários. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Funcionários cadastrados <span> <a style="color:white;" href="novo_funcionario.php"><i title="Criar Novo Funcionário" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome Funcionário</th>
                                            <th>Data Admissão</th>
                                            <th>Data Demissão</th>
                                            <th>Email</th>
                                            <th>Senha</th>
                                            <th>Cargo</th>
                                            <th>Ação</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i=0; $i<count($funcionarios) ; $i++) {?>
                                        <tr class="odd gradeX">
                                            <td><?= $funcionarios[$i]['nome_funcionario']?></td>
                                            <td><?= UtilDAO::ExibirDataBr($funcionarios[$i]['data_admissao'])?></td>
                                            <td><?= UtilDAO::ExibirDataBr($funcionarios[$i]['data_demissao'])?></td>
                                            <td><?= $funcionarios[$i]['funcionario_email']?></td>
                                            <td><?= $funcionarios[$i]['funcionario_senha']?></td>
                                            <td><?= $funcionarios[$i]['nome_cargo']?></td>
                                            <td style="padding: 3px 1px 3px 3px;"> 
                                                <a href="alterar_funcionario.php?cod=<?=$funcionarios[$i]['id_funcionario']?>"><i title="Alterar Cargo" style=" color:#c09046; font-size:18px;margin-left:20px; margin-right:5px" class="fa fa-pencil"></i></a>
                                               <!-- <a href="alterar_cargo.php"><i title="Excluir Cargo" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>-->
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