<?php
require_once '../../DAO/UtilDAO.php';
UtilDAO::VerLogado();
$dados = "";
require_once '../../DAO/CargoDAO.php';
$pag_ret = 'consultar_cargo.php';
$objCargo = new CargoDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $id_cargo = $_GET['cod'];
    @$dados = $objCargo->DetalharCargo($id_cargo);

    if (count($dados) == 0) {
        header('location: consultar_cargo.php');
        exit;
    }
} else if (isset($_POST['btn_alterar'])) {

    $nome_cargo = trim($_POST['nomeCargo']);
    $cargo_descricao = trim($_POST['cargoDescricao']);
    $cod = $_POST['cod'];
    $ret = $objCargo->AlterarCargo($nome_cargo, $cargo_descricao, $cod);
} else if (isset($_POST['btn_excluir'])) {

    $idCargo = $_POST['cod'];
    $ret = $objCargo->ExcluirCargo($idCargo);
} else {
    header('location: consultar_categoria.php');
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
                        <?php include_once('_msg.php') ?>
                        <h2>Alterar Cargo</h2>
                        <h5>Aqui você poderá alterar o Cargo. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <form action="alterar_cargo.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_cargo'] ?>">
                    <div class="col-md-12">
                        <div class="form-group" id="divCargoNome">
                            <label>Nome do Cargo</label>
                            <input name="nomeCargo" id="nomeCargo" type="text" value="<?= @($dados[0]['nome_cargo'] == "" ? "" : $dados[0]['nome_cargo']) ?>" placeholder="Digite o nome do cargo" class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="divCargoDesc">
                            <label>Descrição do Cargo</label>
                            <input name="cargoDescricao" id="cargoDescricao" type="text" value="<?= @$dados[0]['descricao_cargo'] ?>" placeholder="Digite a descrição do cargo" class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button name="btn_alterar" class="btn btn-success " onclick="return ValidarCategoria()">Alterar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirCargo">Excluir</button>
                        <a href="consultar_cargo.php" class="btn btn-warning ">Voltar</a>

                        <div class="modal fade" id="ExcluirCargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Excluir Cargo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4> Deseja Realmente excluir o cargo <b><?= $dados[0]['nome_cargo'] ?> ?</b>.<h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button name="btn_excluir" class="btn btn-primary">Sim</button>
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