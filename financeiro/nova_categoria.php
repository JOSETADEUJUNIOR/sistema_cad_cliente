<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/CategoriaDAO.php';
$pag_ret = 'consultar_categoria.php';

if (isset($_POST['btn_gravar'])) {

    $nome_categoria = trim($_POST['nome']);

    $objCat = new CategoriaDAO();
    $ret = $objCat->CadastrarCategoria($nome_categoria);
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
                        <h2>Categoria</h2>
                        <h5>Aqui você poderá Cadastrar a categoria dos produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_categoria.php" method="post">
                <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            Campo de cadastro
                        </div>
                    <div class="panel-body">
                    
                <div class="col-md-12">
                        <div class="form-group" id="divDadosNome">
                            <label>Nome</label>
                            <input name="nome" id="nomeCategoria" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','nomeCategoria')">
                        </div>

                        <button name="btn_gravar" class="btn btn-success " onclick=" return ValidarCategoria()">Cadastrar</button>
                        <a href="consultar_categoria.php" class="btn btn-warning">Voltar</a>
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