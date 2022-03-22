<?php

require_once '../DAO/PrincipalDAO.php';
require_once '../DAO/UtilDAO.php';
$objResult = new PrincipalDAO();

$retCliente = $objResult->GetClientes();
$retCargo = $objResult->GetCargos();
$retFuncionario = $objResult->GetFuncionario();
$retEmpresa = $objResult->GetEmpresa();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once('_head.php'); ?>
<style>
    #PainelAdmin{
        border-color: #D3D3D3;
        border-style: solid 1px;
        color:black;
    }
    #PainelAdmin:hover{
        background-color: #D3D3D3;
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(red, green, blue, alpha);
        color: white;
    }
    p:hover{
        color: white;
    }
    
</style>
<body>
    <div id="wrapper">
        <?php include_once('_topo.php'); ?>
        <?php include_once('_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        <?php foreach ($retEmpresa as $key => $value) { ?>   
                        <h2>Painel Administrativo</h2>   
                            <h5>Seja bem vindo <strong><?= $value['nome_empresa']?></strong></h5>
                       <?php }?>
                        </div>
                    </div>              
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">           
                            <div id="PainelAdmin" class="panel panel-back noti-box">
                                    <span style="background-color: blue;" class="icon-box bg-color-red set-icon">
                                    <i class="fa fa-list"></i>
                                    </span>
                                    <div class="text-box" >
                                    <?php foreach ($retCliente as $key => $value) { ?>
                                        <a style="color:black;text-decoration-line: none;" href="consultar_cliente.php">
                                        <p class="main-text"><?= $value['total']. " Cliente(s)"?></p>
                                        <p class="text-muted">Cadastrados</p>
                                        </a>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                       
                        <div class="col-md-4 col-sm-6 col-xs-6">           
                            <div id="PainelAdmin" class="panel panel-back noti-box">
                                <span style="background-color: green;" class="icon-box bg-color-green set-icon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <div class="text-box" >
                                <?php foreach ($retFuncionario as $key => $value) { ?>
                                    <a style="color:black;text-decoration-line: none;" href="consultar_funcionario.php">
                                        <p class="main-text"><?= $value['total']." Funcionário(s)"?></p>
                                        <p class="text-muted">Cadastrados</p>
                                    </a> 
                                <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6">           
                            <div id="PainelAdmin" class="panel panel-back noti-box">
                                <span style="background-color: blue;" class="icon-box bg-color-blue set-icon">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                <div class="text-box" >
                                <?php foreach ($retCargo as $key => $value) { ?>
                                    <a style="color:black;text-decoration-line: none;" href="consultar_cargo.php">
                                        <p class="main-text"><?= $value['total']." Cargo(s)"?></p>
                                        <p class="text-muted">Cadastrados</p>
                                    </a>    
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                <div class="row">
                

                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <?php foreach ($retEmpresa as $key => $value) { ?>   
                            
                            <strong><?= $value['nome_empresa']?></strong>
                            </div>
                            <div class="panel-body">
                            <strong> Descrição da Empresa:</strong> <?= $value['descricao_empresa']?><br>
                            <strong> CNPJ da Empresa:</strong> <?= $value['cnpj_empresa']?><br>
                            <strong> Empresa Aberta em:</strong> <?= UtilDAO::ExibirDataBr($value['data_abertura'])?>  

                            </div>
                           
                        </div>
                    </div>
                    
                    <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                
                </div>            
                <?php } ?>
                </div>
                <!-- /. PAGE INNER  -->
        </div>
       
    </div>
    
</body>

</html>