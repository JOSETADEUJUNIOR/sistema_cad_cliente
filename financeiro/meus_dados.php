<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/FuncionarioDAO.php';

$objFunc = new FuncionarioDAO();
$usuario = $objFunc->MeusDados();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>
<style>
a:hover{
        text-decoration: none;
    }
h4:hover{
    
    color:yellowgreen;
    text-decoration: none;
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
                        <?php include('_msg.php') ?>
                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Consultar meus dados <i title="Exibir meus dados" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-chevron-down"></i></a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">


                                                <div class="panel-body col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome do usuário</th>
                                                                    <th>Login</th>
                                                                    <th>Senha</th>
                                                                    <th>Ação</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($usuario as $user) { ?>
                                                                    <tr class="odd gradeX">
                                                                        <td><?= $user['nome_funcionario'] ?></td>
                                                                        <td><?= $user['funcionario_email'] ?></td>
                                                                        <td><?= $user['funcionario_senha'] ?></td>
                                                                        <td style="padding: 3px 1px 3px 3px;">
                                                                            <a href="alterar_MeusDados.php?cod=<?= $user['id_funcionario'] ?>"><i title="Alterar meus dados" style=" color:#c09046; font-size:18px; margin-right:10px" class="fa fa-pencil"></i></a>
                                                                            <!--<a href="excluir_cliente.php"><i title="Excluir Cargo" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>-->
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


                                </div>
                            </div>

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