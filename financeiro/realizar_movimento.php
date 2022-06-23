<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/MovimentoContaDAO.php';
require_once '../DAO/CategoriaContaDAO.php';
require_once '../DAO/FornecedorDAO.php';
require_once '../DAO/ContaDAO.php';
$pag_ret = "realizar_movimento.php";

$objCat = new CategoriaContaDAO();
$objEmp = new FornecedorDAO();
$objConta = new ContaDAO();

if (isset($_POST['btn_gravar'])) {

    $tipo = trim($_POST['tipo']);
    $data = trim($_POST['data']);
    $valor = trim($_POST['valor']);
    $obs = trim($_POST['obs']);
    $categoria = trim($_POST['categoria']);
    $empresa = trim($_POST['empresa']);
    $conta = trim($_POST['conta']);


    $objMovimento = new MovimentoContaDAO();
    $ret = $objMovimento->CadastrarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta);
}

$empresas = $objEmp->ConsultarFornecedor();
$categorias = $objCat->ConsultarCategoria();
$contas = $objConta->ConsultarConta();

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
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Dados do Movimento
                            </div>
                            <div class="panel-body">

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
                                        <input name="data" id="dtMovimento" type="date" class="form-control" onfocusout="SinalizaCampo('divDtMovimento','dtMovimento')">
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
                                            <?php for ($i = 0; $i < count($categorias); $i++) { ?>
                                                <option value="<?= $categorias[$i]['id_cat_conta'] ?>"><?= $categorias[$i]['nome_categoria'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group" id="divEmp">
                                        <label>Empresa*</label>
                                        <select name="empresa" id="emp" class="form-control" onfocusout="SinalizaCampo('divEmp','emp')">
                                            <option value="">Selecione</option>
                                            <?php for ($i = 0; $i < count($empresas); $i++) { ?>
                                                <option value="<?= $empresas[$i]['id_fornecedor'] ?>"><?= $empresas[$i]['nome_fornecedor'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group" id="divConta">
                                        <label>Conta*</label>
                                        <select name="conta" id="conta" class="form-control" onfocusout="SinalizaCampo('divConta','conta')">
                                            <option value="">Selecione</option>
                                            <?php foreach ($contas as $cont) { ?>
                                                <option value="<?= $cont['id_conta'] ?>"><?= $cont['banco_conta'] . " - " . $cont['numero_conta'] . " (R$: " . $cont['saldo_conta'] . ")" ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Observação</label>
                                        <textarea name="obs" placeholder="Digite a Observação (opcional)" class="form-control"></textarea>
                                    </div>


                                    <button name="btn_gravar" class="btn btn-success " onclick="return ValidarMovimento()">Gravar</button>
                                </div>
                            </div>
                        </div>
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
<script>
    $("#tipo").focus();
</script>
</body>

</html>