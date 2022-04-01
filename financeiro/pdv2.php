<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ClienteDAO.php';
require_once '../DAO/VendaDAO.php';
$objVenda = new VendaDAO();
$objcliente = new ClienteDAO();
$clientes = $objcliente->ConsultarCliente();
require_once '../DAO/ProdutoDAO.php';
$objProduto = new ProdutoDAO();
$produtos = $objProduto->ConsultarProduto();


require_once '../DAO/VendaDAO.php';
$objVenda = new VendaDAO();

if (isset($_POST['btn_finalizar_venda'])) {
    $ret = -7;
    $pag_ret = 'pdv2.php'; 
}
if (isset($_POST['btn_adicionar'])) {

    if (isset($_POST['idvenda']) && $_POST['idvenda'] > 0) {
     echo 'se existe cai aqui';
    $idVenda = $_POST['idvenda'];
    $itemVenda = explode('-', $_POST['produto'])[0];
    $valor = explode('-', $_POST['produto'])[1];
    $qtdVenda = trim($_POST['qtd']);

    $idVendaRet = $objVenda->AddItem($idVenda, $itemVenda, $qtdVenda, $valor);
    $itens = $objVenda->ItensVenda($idVendaRet);
    var_dump($idVendaRet);
        
    }else{
        echo 'se não existe cai aqui';
        $dtVenda = trim($_POST['dtvenda']);
        $clienteVenda = trim($_POST['cliente']);
        $itemVenda = explode('-', $_POST['produto'])[0];
        $valor = explode('-', $_POST['produto'])[1];
        $qtdVenda = trim($_POST['qtd']);
        $idVendaRet = $objVenda->CadastrarVenda($dtVenda, $clienteVenda, $itemVenda, $qtdVenda, $valor);
        if ($idVendaRet == 0) {
            $ret = 0;
        }
        $itens = $objVenda->ItensVenda($idVendaRet);
        
    }
   
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
                        <h2>Checkout</h2>
                        <h5>Iniciar Venda. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="pdv2.php" method="post">
                   
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Campos para a venda
                                </div>
                                <div class="panel-body">

                                    <div class="col-md-6">
                                        <div class="form-group" id="divSubNome">
                                            <label>Data da Venda</label>
                                            <input name="dtvenda" id="dtvenda" type="date" placeholder="Digite a data da venda" class="form-control" onfocusout="SinalizaCampo('divSubNome','SubNome')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="divCat">
                                            <label>Selecione o Cliente</label>
                                            <select name="cliente" id="cliente" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                                <option value="">Escolher cliente</option>
                                                <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                                    <option value="<?= $clientes[$i]['id_cliente'] ?>"><?= $clientes[$i]['nome_cliente'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                    <input type="hidden" name="idvenda" value="<?= $idVendaRet?>">
                        <div class="form-group" id="divCat">
                            <label>Selecione o Produto</label>
                            <select name="produto" id="produto" class="form-control" onfocusout="SinalizaCampo('divCat','cat')">
                                <option value="">Escolha o produto</option>
                                <?php foreach ($produtos as $prod) {?>
                                    <option value="<?= $prod['id_produto'].'-'.$prod['valor_produto'] ?>"><?= $prod['nome_produto'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group" id="divSubNome">
                            <label>Quantidade</label>
                            <input name="qtd" id="qtd" type="text" placeholder="Digite a quantidade" class="form-control" onfocusout="SinalizaCampo('divSubNome','SubNome')">
                        </div>
                        
                    </div> 
                    <div class="col-md-2">
                        <div class="form-group" id="divSubNome">
                        <label>Adicionar item</label>
                          <button name="btn_adicionar" class="btn btn-success ">Adicionar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Itens da Venda
                                </div>
                                <div class="panel-body">

                              
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
                                            <?php foreach ($itens as $item) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $item['nome_produto'] ?></td>
                                                    <td><?= $item['qtd_produto'] ?></td>
                                                    <td><?= $item['item_valor'] ?></td>
                                                    

                                                </tr>
                                            <?php } ?>

                                   
                                
                                        </tbody>
                                    </table>
                                    <div class="col-md-7 col-sm-7" style="float: right;">
                                     <button  name="btn_finalizar_venda" class="btn btn-success ">Finalizar Venda</button>
                                    </div>
                                </div>
                                </div>
                                <div class="panel-footer">
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

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->


</body>

</html>