<?php

session_start();

require_once '../DAO/ProdutoDAO.php';
require_once '../DAO/UtilDAO.php';
$pag_ret = 'consultar_produto.php';

$objProd = new ProdutoDAO();
$produtos = $objProd->ConsultarProduto();

if (isset($_GET['idExcluir']) && is_numeric($_GET['idExcluir'])) {
    
    $idProd = trim($_GET['idExcluir']);
    $ret = $objProd->ExcluirProduto($idProd);
    $produtos = $objProd->ConsultarProduto();
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
                        <h2>Consultar Produto</h2>
                        <h5>Aqui você poderá consultar seus produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <div class="row col-md-6">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Produtos cadastrados <span> <a style="color:white;" href="novo_produto.php"><i title="Criar Novo Produto" style="font-size: 22px;float: right;" class="fa fa-plus-circle"></i></a></span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Produto</th>
                                                <th>Estoque</th>
                                                <th>Valor</th>
                                                <th>Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produtos as $key => $value) {?>
                                            
                                         
                                                <tr class="odd gradeX">
                                                    <td><?= $value['cod_produto'] ?></td>
                                                    <td><?= $value['nome_produto'] ?></td>
                                                    <td><?= $value['estoque'] ?></td>
                                                    <td><?= $value['valor_produto'] ?></td>
                                                    <td style="padding: 2px 1px 2px 2px;">
                                                        <a href="?adicionar=<?= $key ?>"><i title="Adicionar Produto" style=" color:#c09046; font-size:16px;margin-left:5px; margin-right:5px" class="fa fa-pencil"></i></a>
                                                        <a href="?retirar=<?= $key ?>"><i title="Excluir Produto" style=" color:#c09046; font-size:16px;margin-left:5px; margin-right:5px" class="fa fa-pencil"></i></a>
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

                <div class="row col-md-6">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Tela de Vendas
                        </div>
                        <div class="panel-body">
                           
                        <p>
                            
                            <?php 

                            if (isset($_GET['adicionar'])) {
                                //add ao carrinho
                                $idProduto = (int) $_GET['adicionar'];
                                if (isset($produtos[$idProduto])) {
                                    if (isset($_SESSION['carrinho'][$idProduto])){
                                       $_SESSION['carrinho'][$idProduto]['quantidade']++;

                                    }else {
                                        $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1, 'nome'=>$produtos[$idProduto]['nome_produto'],'preco'=>$produtos[$idProduto]['valor_produto']);
                                    }
                                    echo "<script>
                                    Swal.fire({
                            
                                        icon: 'success',
                                        title: 'Sucesso',
                                        width: 'auto',
                                        html: '<h3>Item adicionado ao carrinho!</h3>',
                                        showConfirmButton: false,
                                        timer: 4000,
                                    })
                                </script>";

                                }else {
                                    die('Você não pode adicionar um item que não existe.') ;
                                }

                            }
                            if (isset($_GET['retirar'])) {
                                //add ao carrinho
                                $idProduto = (int) $_GET['retirar'];
                                if (isset($produtos[$idProduto])) {
                                    if (isset($_SESSION['carrinho'][$idProduto])){
                                        if ($_SESSION['carrinho'][$idProduto]['quantidade']==0) {
                                            echo "<script>
                                            Swal.fire({
                                    
                                                icon: 'error',
                                                title: 'Oops...',
                                                width: 'auto',
                                                html: '<h3>o item não esta adicionado ao carrinho!</h3>',
                                                showConfirmButton: false,
                                                timer: 4000,
                                            })
                                        </script>";
                                           
                                        }else {
                                            $_SESSION['carrinho'][$idProduto]['quantidade']--;
                                            echo "<script>
                                            Swal.fire({
                                            
                                                        icon: 'success',
                                                        title: 'Sucesso',
                                                        width: 'auto',
                                                        html: '<h3>Item Retirado do carrinho!</h3>',
                                                        showConfirmButton: false,
                                                        timer: 4000,
                                                        })
                                                   </script>";

                                        }
                                      
                                    }else {
                                        $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1, 'nome'=>$produtos[$idProduto]['nome_produto'],'preco'=>$produtos[$idProduto]['valor_produto']);
                                    }
                                    
                                }else {
                                    die('Não existe mais itens ao carrinho.') ;
                                }

                            }


                            ?>
                        
                        <h3>Vendas:</h3>
                                                  
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                           

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                 <?php foreach ($_SESSION['carrinho'] as $key => $value) {?>
                                     
                                            <tr class="odd gradeX">
                                                <td><?= $value['nome']?></td>
                                                <td><?= $value['quantidade'] ?></td>
                                                <td><?= ($value['quantidade'])*($value['preco']).',00'?></td>
                                               
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                             
                          
                        </div>
                        <div class="panel-footer">
                          
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