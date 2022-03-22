<?php

require_once '../DAO/CargoDAO.php';
$pag_ret = "consultar_cargo.php";
if (isset($_POST['btn_cadastrar'])) {
    
    $nomeCargo = trim($_POST['nomeCargo']);
    $cargoDescricao = trim($_POST['cargoDescricao']);

    $objCargo = new CargoDAO();
    $ret = $objCargo->CadastrarCargo($nomeCargo, $cargoDescricao);

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
                        <h2>Novo Cargo</h2>
                        <h5>Aqui você poderá cadastrar todos os Cargos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="novo_cargo.php" method="post">
                    <div class="col-md-12">    
                        <div class="form-group" id="divCargoNome">
                            <label>Nome do Cargo</label>
                            <input name="nomeCargo" id="nomeCargo" type="text" placeholder="Digite o nome do cargo" class="form-control" onfocusout="SinalizaCampo('divCargoNome','nomeCargo')">
                        </div>
                    </div>
                    <div class="col-md-12">    
                        <div class="form-group" id="divCargoDesc">
                            <label>Descrição do Cargo</label>
                            <input name="cargoDescricao" id="cargoDescricao" type="text" placeholder="Digite a descrição do cargo" class="form-control" onfocusout="SinalizaCampo('divCargoDesc','cargoDescricao')">
                        </div>
                    </div>          
                    
                    <div class="col-md-12">
                        <button name="btn_cadastrar" class="btn btn-success " onclick="return ValidarCargo()">Cadastrar</button>
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