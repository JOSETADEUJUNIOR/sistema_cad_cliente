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
                        <h2>Consultar Empresa</h2>
                        <h5>Aqui você poderá consultar suas empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Empresas Cadastradas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nome da Empresa</th>
                                            <th>Endereço</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Ação</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>(Nome da Categoria))</td>
                                            <td>(Enedereço))</td>
                                            <td>(Telefone))</td>
                                            <td>(E-mail))</td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="alterar_empresa.php">alterar</a>
                                            </td>
                                            
                                        </tr>
                                        
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

    
</body>

</html>