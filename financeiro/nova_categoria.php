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
                        <h2>Categorias</h2>
                        <h5>Aqui você poderá Cadastrar as categorias dos produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_categoria.php" method="post">
                    <div class="col-md-12">
                        <div class="form-group" id="divDadosNome">
                            <label>Nome</label>
                            <input name="nome" id="dadosNome" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divDadosNome','dadosNome')">
                        </div>

                        <button name="btn_gravar" class="btn btn-success " onclick=" return ValidarMeusDados()">Cadastrar</button>
                        <a href="consultar_categoria.php" class="btn btn-warning">Voltar</a>
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