<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ContaDAO.php';
$pag_ret = 'consultar_conta.php';
$objConta = new ContaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id_cont = $_GET['cod'];
    $dados = $objConta->DetalharConta($id_cont);

    if (count($dados)==0) {
        header('location: consultar_conta.php');
        exit;
    }
    }else if (isset($_POST['btn_gravar'])) {

        $nome = trim($_POST['nome']);
        $agencia = trim($_POST['agencia']);
        $numConta = trim($_POST['numConta']);
        $saldo = trim($_POST['saldo']);
        $cod = $_POST['cod'];
        $ret = $objConta->AlterarConta($nome,$agencia,$numConta,$saldo, $cod);
    }else if (isset($_POST['btn_excluir'])) {
        
        $idConta = trim($_POST['cod']);
        $ret = $objConta->ExcluirConta($idConta);
    }else{
        header('location: consultar_conta.php');
        exit;
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar a Conta. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_conta.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta']?>">
                <div class="form-group col-md-12" id="divNome">
                        <label>Nome do Banco</label>
                        <input name="nome" id="nomeBanco" type="text" value="<?= @$dados[0]['banco_conta']?>" placeholder="Digite o nome do Banco" class="form-control" onfocusout="SinalizaCampo('divNome','nomeBanco')" >
                    </div>

                    <div class="form-group col-md-4" id="divAgencia">
                        <label>Agencia</label>
                        <input name="agencia" id="agencia" type="text" value="<?= @$dados[0]['agencia_conta']?>" placeholder="Digite  a Agencia" class="form-control" onfocusout="SinalizaCampo('divAgencia','agencia')">
                    </div>
                    <div class="form-group col-md-4" id="divConta">
                        <label>Numero da Conta</label>
                        <input name="numConta" id="numConta" type="phone" value="<?= @$dados[0]['numero_conta']?>" placeholder="Digite o numero da conta" class="form-control" onfocusout="SinalizaCampo('divConta','numConta')">
                    </div>
                    <div class="form-group col-md-4" id="divSaldo">
                        <label>Saldo</label>
                        <input name="saldo" id="saldo" type="text" value="<?= @$dados[0]['saldo_conta']?>" placeholder="Digite o saldo da conta" class="form-control" onfocusout="SinalizaCampo('divSaldo','saldo')">
                    </div>
                    <div class="col-md-12">
                        <button name="btn_gravar" class="btn btn-success " onclick="return ValidarConta()">Gravar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirConta">Excluir</button>
                        <a href="consultar_conta.php" class="btn btn-warning ">Voltar</a>
                        <div class="modal fade" id="ExcluirConta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Conta</h4>
                                </div>
                                <div class="modal-body">
                                    <h4> Deseja Realmente excluir a conta <b><?= $dados[0]['banco_conta']?> ?</b>.<h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button name="btn_excluir" class="btn btn-primary">Sim</button>
                                </div>
                            </div>
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