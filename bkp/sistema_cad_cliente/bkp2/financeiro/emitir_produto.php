<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ProdutoDAO.php';

$objproduto = new ProdutoDAO();
$produtos = $objproduto->ConsultarProduto();


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
                        <h2>Relatorio de Produto</h2>
                        <h5>Aqui você poderá consultar seus produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form id="form1" action="pdf_rel_produto.php" target="_blank" method="get">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Relatório de Produtos
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10">
                                        <div class="form-group" id="divCat">
                                            <label>Selecione o Produto</label>
                                            <select name="produto" id="produto" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                <option value="">Escolher produto</option>
                                                <?php for ($i = 0; $i < count($produtos); $i++) { ?>
                                                    <option value="<?= $produtos[$i]['id_produto'] ?>"><?= $produtos[$i]['nome_produto']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                                        <button id="btnFiltrar" name="btnFiltrar" class="btn btn-info">Pesquisar</button>
                                    </div>
                                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                                        <button id="btnFiltrar" name="btnEstoque" class="btn btn-warning">Produtos c/ baixo estoque</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    

                </form>



                <hr>

            </div>

            <!-- /. PAGE INNER  -->
        </div>





        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        // $("#tel").mask("(00) 0000-00009");

        $("#cpfCliente").mask("000.000.000-00");
       
    </script>
    
    
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