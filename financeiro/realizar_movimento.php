<?php
require_once '../DAO/MovimentoDAO.php';

if (isset($_POST['btn_gravar'])) {

    $tipo = trim($_POST['tipo']);
    $data = trim($_POST['data']);
    $valor = trim($_POST['valor']);
    $categoria = trim($_POST['categoria']);
    $empresa = trim($_POST['empresa']);
    $conta = trim($_POST['conta']);
    $obs = trim($_POST['obs']);


    $objMovimento = new MovimentoDAO();
    $ret = $objMovimento->CadastrarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta, $obs);
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
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você poderá Lançar seus movimentos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="realizar_movimento.php" method="post">
                    <div class="col-md-6">
                        <div class="form-group" id="divTipo">
                            <label>Tipo*</label>
                            <select name="tipo" id="tipo" class="form-control" onfocusout="SinalizaCampo('divTipo','tipo')">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>

                            </select>
                        </div>


                        <div class="form-group" id="divDtMovimento">
                            <label>Data do Movimento</label>
                            <input name="data"  id="dtMovimento"type="date" class="form-control" onfocusout="SinalizaCampo('divDtMovimento','dtMovimento')">
                        </div>
                        <div class="form-group" id="divValor">
                            <label>Valor</label>
                            <input name="valor" id="valor" placeholder="Digite o valor" class="form-control" onfocusout="SinalizaCampo('divValor','valor')">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="divCat">
                            <label>Categoria*</label>
                            <select name="categoria" id="cat" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                <option value="">Selecione</option>
                                <option value="1">teste</option>


                            </select>
                        </div>
                        <div class="form-group" id="divEmp">
                            <label>Empresa*</label>
                            <select name="empresa" id="emp" class="form-control" onfocusout="SinalizaCampo('divEmp','emp')">
                                <option value="">Selecione</option>
                                <option value="1">teste</option>


                            </select>
                        </div>
                        <div class="form-group" id="divConta">
                            <label>Conta*</label>
                            <select name="selecionar" id="conta" class="form-control" onfocusout="SinalizaCampo('divConta','conta')">
                                <option value="">Selecione</option>
                                <option value="1">teste</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação</label>
                            <textarea name="obs" placeholder="Digite a Observação (opcional)" class="form-control"></textarea>
                        </div>


                        <button name="btn_gravar" class="btn btn-success " onclick="return ValidarMovimento()">Gravar</button>
                </form>
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