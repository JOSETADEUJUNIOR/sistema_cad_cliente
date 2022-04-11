<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/VendaDAO.php';
$pag_ret = 'pdv2.php';

if (isset($_POST['btn_gravar'])) {

    $valorCaixa = trim($_POST['valorCaixa']);

    $objCaixa = new VendaDAO();
    $ret = $objCaixa->AbrirCaixa($valorCaixa);
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
                        <?php include('_msg.php') ?>
                        <h2>Abrir Caixa</h2>
                        <h5>Aqui você poderá abrir o caixa com o valor inicial. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="abrir_caixa.php" method="post">
                <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            Informe os dados
                        </div>
                    <div class="panel-body">
                    
                <div class="col-md-12">
                        <div class="form-group" id="divCaixa">
                            <label>Valor Inicial</label>
                            <input name="valorCaixa" id="valorCaixa" type="text" placeholder="Digite o valor inicial" class="form-control" onfocusout="SinalizaCampo('divCaixa','valorCaixa')">
                        </div>

                        <button name="btn_gravar" class="btn btn-success " onclick=" return ValidarCaixa()">Abrir Caixa</button>
                        <a href="index.php" class="btn btn-warning">Voltar</a>
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