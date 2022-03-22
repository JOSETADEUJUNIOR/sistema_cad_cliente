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
                        <h2>Consultar Movimentos</h2>
                        <h5>Aqui você poderá consultar seus movimentos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data inicial</label>
                        <input type="date" placeholder="Escolha a data inicial" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data inicial</label>
                        <input type="date" placeholder="Escolha a data inicial" class="form-control">
                    </div>
                </div>

                    <center>
                        <button class="btn btn-info">Pesquisar</button>
                    </center>
                
                <hr>

                <div class="row">
                 <div class="col-md-12">
                  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Movimentos
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Categoria</th>
                                                <th>Empresa</th>
                                                <th>Conta</th>
                                                <th>Tipo</th>
                                                <th>Obs</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>(Data)</td>
                                                <td>(Valor)</td>
                                                <td>(Categoria)</td>
                                                <td>(Empresa)</td>
                                                <td>(Conta)</td>
                                                <td>(Tipo)</td>
                                                <td>(Obs)</td>
                                               
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-xs" >Excluir</a>
                                                </td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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