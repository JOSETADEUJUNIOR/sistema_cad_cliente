<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/VendaDAO.php';
$pag_ret = 'abrir_caixa.php';


$objCaixa = new VendaDAO();

if (isset($_GET['dataCaixa'])) {
    
    $dataCaixa = $_GET['dataCaixa'];

}

if (isset($_POST['btn_gravar'])) {

    $VerSaldo = $objCaixa->CaixaDoDia();
    $valorCaixa = trim($_POST['valorCaixa']);
    $tipoMov = trim($_POST['tipoMov']);
    $dataCaixa = trim($_POST['dataCaixa']);
    
    var_dump($VerSaldo[0]['valor_caixa']);
    var_dump($valorCaixa);
    if ($VerSaldo[0]['valor_caixa'] < $valorCaixa && $tipoMov == 1 ) {
        $ret = -9;
        
    }else {
        $ret = $objCaixa->MovimentarCaixa($valorCaixa, $dataCaixa, $tipoMov);
        
    }
    
}

$caixaDia = $objCaixa->CaixaDoDia();

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
                        <h2>Movimentar Caixa</h2>
                        <h5>Aqui você poderá realizar retirada ou inserir valor. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="movimento_caixa.php" method="post">
                <input type="hidden" name="dataCaixa" value="<?= $dataCaixa?>">    
                <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Informe os dados
                                </div>
                                <div class="panel-body">

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12" id="divCaixa">
                                            <label>Valor Movimento</label>
                                            <input name="valorCaixa" id="valorCaixa" type="text" placeholder="Digite o valor do movimento" class="form-control" onfocusout="SinalizaCampo('divCaixa','valorCaixa')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="divTipoMov">
                                            <label>Selecione o movimento</label>
                                            <select name="tipoMov" id="tipoMov" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                <option value="">Selecione o tipo</option>
                                                    <option value="1">Sangria do Caixa</option>
                                                    <option value="2">Lançar Valor</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group col-md-12" id="divCaixa">
                                            <button name="btn_gravar" class="btn btn-success col-md-2 col-xs-12 " onclick=" return ValidarCaixa()">Realizar Movimento</button>
                                            <a href="abrir_caixa.php" class="btn btn-warning col-md-2 col-xs-12">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Movimento do Caixa 
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Valor Incial</th>
                                                <th>Valor em Caixa</th>
                                                <th>Data Movimento</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($caixaDia as $cx) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $cx['valor_inicial'] ?></td>
                                                    <td><?= $cx['valor_caixa'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($cx['data_caixa']) ?></td>
                                                   
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
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


</body>

</html>