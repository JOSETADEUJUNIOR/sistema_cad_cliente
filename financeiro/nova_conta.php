<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ContaDAO.php';
$pag_ret = "consultar_conta.php";

if (isset($_POST['btn_cadastrar'])) {

    $nome = trim($_POST['nome']);
    $agencia = trim($_POST['agencia']);
    $numConta = trim($_POST['numConta']);
    $saldo = trim($_POST['saldo']);


    $objConta = new ContaDAO();
    $ret = $objConta->CadastrarConta($nome, $agencia, $numConta, $saldo);
}


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
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas Contas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_conta.php" method="post">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Dados da Conta
                            </div>
                            <div class="panel-body">

                                <div class="form-group col-md-12" id="divNome">
                                    <label>Nome do Banco</label>
                                    <input name="nome" id="nomeBanco" type="text" placeholder="Digite o nome do banco" class="form-control" onfocusout="SinalizaCampo('divNome','nomeBanco')">
                                </div>

                                <div class="form-group col-md-4" id="divAgencia">
                                    <label>Agência</label>
                                    <input name="agencia" id="agencia" type="text" placeholder="Digite a agência" class="form-control" onfocusout="SinalizaCampo('divAgencia','agencia')">
                                </div>
                                <div class="form-group col-md-4" id="divConta">
                                    <label>Numero da Conta</label>
                                    <input name="numConta" id="numConta" type="phone" placeholder="Digite o numero da conta" class="form-control" onfocusout="SinalizaCampo('divConta','numConta')">
                                </div>
                                <div class="form-group col-md-4" id="divSaldo">
                                    <label>Saldo</label>
                                    <input name="saldo" id="saldo" type="text" placeholder="Digite o saldo da conta" class="form-control" onfocusout="SinalizaCampo('divSaldo','saldo')">
                                </div>
                                <div class="col-md-12">
                                    <button name="btn_cadastrar" class="btn btn-success" onclick="return ValidarConta()">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                </form>
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