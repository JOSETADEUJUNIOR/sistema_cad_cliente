<?php

require_once '../DAO/CategoriaDAO.php';
$pag_ret= "consultar_categoria.php";
if (isset($_POST['btn_cadastrar'])) {

    $nome_categoria = trim($_POST['nomeCategoria']);

    $objCategoria = new CategoriaDAO();
    $ret = $objCategoria->CadastrarCategoria($nome_categoria);
   
    
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
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastrar todas as suas categorias. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_categoria.php" method="post">
                    <div class="form-group" id="divNomeCat">
                        <label>Nome da Categoria</label>
                        <input name="nomeCategoria" id="nomeCategoria" type="text" placeholder="Digite o nome da categoria" class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                    </div>

                    <button name="btn_cadastrar" class="btn btn-success " onclick="return ValidarCategoria()">Cadastrar</button>
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