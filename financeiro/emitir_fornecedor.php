<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/FornecedorDAO.php';

$objfornecedor = new FornecedorDAO();
$fornecedor = $objfornecedor->ConsultarFornecedor();


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
                        <h2>Consultar Fornecedor</h2>
                        <h5>Aqui você poderá consultar seus Fornecedor. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form id="form1" action="pdf_rel_fornecedor.php" target="_blank" method="get">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Relatório de Fornecedor
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10">
                                        <div class="form-group" id="divCat">
                                            <label>Selecione o Fornecedor</label>
                                            <select name="fornecedor" id="fornecedor" class="form-control" >
                                                <option value="">Escolher Fornecedor</option>
                                                <?php for ($i = 0; $i < count($fornecedor); $i++) { ?>
                                                    <option value="<?= $fornecedor[$i]['id_fornecedor'] ?>"><?= $fornecedor[$i]['nome_fornecedor'].'-'.$fornecedor[$i]['cnpj_fornecedor'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                                        <button id="btnFiltrar" name="btnFiltrar" class="btn btn-info" onclick="return ValidarConsultaMov()">Pesquisar</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Relatório de Fornecedores
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10">
                                    <div class="form-group" id="divDadosNome">
                                        <label>Digite o cnpj</label>
                                        <input name="cnpj" id="cnpjFornecedor" type="text" placeholder="Digite o cpf" class="form-control">
                                     </div>
                                </div>
                                    <div class="col-md-2" style="display:block; padding: 24px 10px">
                                        <button id="btnFiltrar" name="btnCnpj" class="btn btn-info" onclick="return ValidarConsultaMov()">Pesquisar</button>
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

        $("#cnpjFornecedor").mask("00.000.000/0000-00");
       
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