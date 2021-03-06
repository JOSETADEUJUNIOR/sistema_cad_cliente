<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/CategoriaDAO.php';
$pag_ret = 'consultar_categoria.php';

$objCat = new CategoriaDAO();
$categorias = $objCat->ConsultarCategoria();

if (isset($_GET['idExcluir']) && is_numeric($_GET['idExcluir'])){

    $idCat = $_GET['idExcluir'];
    $ret = $objCat->ExcluirCategoria($idCat);
    $categorias = $objCat->ConsultarCategoria();
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
                        <h2>Consultar Categoria</h2>
                        <h5>Aqui você poderá consultar suas categorias. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Categorias Cadastradas <span> <a style="color:white;" href="pdfCategoria.php" target="_blank"><i title="Emitir Relatorio de Categorias" style="font-size: 22px;float: right; padding:0px 10px" class="fa fa-print"></i></a></span> <span> <a style="color:white;" href="nova_categoria.php"><i title="Criar nova categoria" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome Categoria</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($categorias as $cat) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $cat['nome_categoria'] ?></td>
                                                    <td style="padding: 3px 1px 3px 3px;">
                                                        <a href="alterar_categoria.php?cod=<?= $cat['id_categoria'] ?>"><i title="Alterar Categoria" style=" color:#c09046; font-size:18px;margin-left:20px; margin-right:5px" class="fa fa-pencil"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#modalExcluir<?= $cat['id_categoria'] ?>"><i title="Excluir Categoria" style=" color:red; font-size:18px; margin-left:5px" class="fa fa-trash"></i></a>
                                                        <div class="modal fade" id="modalExcluir<?= $cat['id_categoria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Deseja excluir a categoria: <br>
                                                                        <label>Nome da Categoria: <?= $cat['nome_categoria'] ?></label><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <a href="consultar_categoria.php?idExcluir=<?= $cat['id_categoria'] ?>" class="btn btn-primary">Sim</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </td>

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
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>