<?php
require_once '../../DAO/UtilDAO.php';
UtilDAO::VerLogado();

require_once '../../DAO/PrincipalDAO.php';
$objResult = new PrincipalDAO();



$retCargo = $objResult->GetCargos();
$retFuncionario = $objResult->GetFuncionario();
$retEmpresa = $objResult->GetEmpresa();




?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>
<style>
    #PainelAdmin {
        border-color: #D3D3D3;
        border-style: solid 1px;
        color: black;
    }

    #PainelAdmin:hover {
        background-color: #D3D3D3;
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(red, green, blue, alpha);
        color: white;
    }

    p:hover {
        color: white;
    }
    a:hover{
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
                        <?php foreach ($retEmpresa as $key => $value) { ?>
                            <h2>Painel Administrativo</h2>
                            <h5>Seja bem vindo <strong><?= $value['nome_empresa'] ?></strong></h5>
                        <?php } ?>
                    </div>
                </div>
                <div class="row" >
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
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div id="PainelAdmin" class="panel panel-back noti-box">
                            <span style="background-color: #023e66;" class="icon-box bg-color-green set-icon">
                                <i class="fa fa-users"></i>
                            </span>
                            <div class="text-box">
                                <?php foreach ($retFuncionario as $key => $value) { ?>
                                    <a style="color:black;text-decoration-line: none;" href="consultar_funcionario.php">
                                        <p class="main-text"><?= $value['total'] . " Funcionário(s)" ?></p>
                                        <p class="text-muted">Cadastrados</p>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div id="PainelAdmin" class="panel panel-back noti-box">
                            <span style="background-color: #023e66;" class="icon-box bg-color-blue set-icon">
                                <i class="fa fa-briefcase"></i>
                            </span>
                            <div class="text-box">
                                <?php foreach ($retCargo as $key => $value) { ?>
                                    <a style="color:black;text-decoration-line: none;" href="consultar_cargo.php">
                                        <p class="main-text"><?= $value['total'] . " Cargo(s)" ?></p>
                                        <p class="text-muted">Cadastrados</p>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /. ROW  -->
                <hr />



                
                
            </div>

            <!-- /. PAGE INNER  -->
        </div>

    </div>

</body>

</html>