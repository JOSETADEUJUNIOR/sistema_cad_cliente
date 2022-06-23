<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/VendaDAO.php';
$pag_ret = 'pdv2.php';


$objCaixa = new VendaDAO();

if (isset($_POST['btn_gravar'])) {

    $CaixaExiste = $objCaixa->CaixaDoDia();

    if ($CaixaExiste[0]['data_caixa']== UtilDAO::DataAtual()) {
        $ret = -10;
    }else{
        $valorCaixa = trim($_POST['valorCaixa']);
        $tipoMov = trim($_POST['tipoMov']);

        $ret = $objCaixa->AbrirCaixa($valorCaixa);
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
                                        <div class="form-group col-md-12" id="divCaixa">
                                            <label>Valor Inicial</label>
                                            <input name="valorCaixa" id="valorCaixa" type="text" placeholder="Digite o valor inicial" class="form-control" onfocusout="SinalizaCampo('divCaixa','valorCaixa')">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4" id="divCaixa">
                                            <button name="btn_gravar" class="btn btn-success " onclick=" return ValidarCaixa()">Abrir Caixa</button>
                                            <a href="pdv2.php" class="btn btn-warning">Ir para Venda</a>
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
                                                <th>Valor Inicial</th>
                                                <th>Valor em Caixa</th>
                                                <th>Data Movimento</th>
                                                <th>Ação</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($caixaDia as $cx) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $cx['valor_inicial']?></td>
                                                    <td><?= $cx['valor_caixa'] ?></td>
                                                    <td><?= UtilDAO::ExibirDataBr($cx['data_caixa']) ?></td>
                                                    <td><a href="movimento_caixa.php?dataCaixa=<?= $cx['data_caixa']?>"><i title="Movimentar o Caixa" style=" color:#c09046; font-size:18px;margin-left:20px; margin-right:5px" class="fa fa-pencil"></i></a></td>
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