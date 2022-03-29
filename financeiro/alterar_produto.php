<?php

require_once '../DAO/ProdutoDAO.php';
$pag_ret = 'consultar_produto.php';
$objProd = new ProdutoDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
  
    $idProd = trim($_GET['cod']);
    $dados = $objProd->DetalharProduto($idProd);
}else if (isset($_POST['btn_alterar'])) {
    
    $codBarras = trim($_POST['codBarras']);
    $nomeProduto = trim($_POST['nomeProduto']);
    $dataCad = trim($_POST['dataCad']);
    $descProd = trim($_POST['descProd']);
    $valor = trim($_POST['valor']);
    $fornecedor = trim($_POST['fornecedor']);
    $cod = trim($_POST['cod']);

    $ret = $objProd->AlterarProduto($codBarras, $nomeProduto, $dataCad, $descProd, $valor, $fornecedor,$cod);
}else{
    header('location: consultar_produto.php');
    exit;
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
                        <h2>Novo Produto</h2>
                        <h5>Aqui você poderá cadastrar todos os Produtos. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_produto.php" method="post">
                  <input type="hidden" name="cod" value="<?= $dados[0]['id_produto']?>">  
                <div class="col-md-3">    
                        <div class="form-group" id="divProdCod">
                            <label>Codigo Barras</label>
                            <input name="codBarras" id="codBarras" value="<?= $dados[0]['cod_produto']?>" type="text" placeholder="Digite o codigo de barras" class="form-control" onfocusout="SinalizaCampo('divProdCod','codBarras')">
                        </div>
                    </div>  
                <div class="col-md-6">    
                        <div class="form-group" id="divProdNome">
                            <label>Nome do Produto</label>
                            <input name="nomeProduto" id="nomeProduto" value="<?= $dados[0]['nome_produto']?>" type="text" placeholder="Digite o nome do produto" class="form-control" onfocusout="SinalizaCampo('divProdNome','nomeProduto')">
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group" id="divProdCad">
                            <label>Data do Cadastro</label>
                            <input name="dataCad" id="dataCad" value="<?= $dados[0]['data_cadastro']?>" type="date" placeholder="Digite o nome digite a data de cadastro do produto" class="form-control" onfocusout="SinalizaCampo('divProdCad','dataCad')">
                         </div>
                    </div>
                    <div class="col-md-9">    
                        <div class="form-group" id="divProdDesc">
                            <label>Descrição do produto</label>
                            <input name="descProd" id="descProd" value="<?= $dados[0]['descricao_produto']?>" type="text" placeholder="Digite a descrição do produto" class="form-control" onfocusout="SinalizaCampo('divProdDesc','descProd')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divProdValor">
                            <label>Valor</label>
                            <input name="valor" id="valor" value="<?= $dados[0]['valor_produto']?>" type="text" placeholder="Digite o valor do produto" class="form-control" onfocusout="SinalizaCampo('divProdValor','valor')">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        
                    <div class="form-group" id="divProdForn">
                    
                         <label>Selecione o Fornecedor</label>
                         
                        <select name="fornecedor" id="fornecedor" class="form-control" onfocusout="SinalizaCampo('divProdForn','fornecedor')">
                        <option value="<?= $dados[0]['id_produto']?>">Selecione</option>
                        <?php for ($i=0; $i<count($cargos) ; $i++) { ?>
                            <option value="<?= $cargos[$i]['id_cargo']?>"><?= $cargos[$i]['nome_cargo']?></option>
                            <?php } ?>  
                            </select>
                        </div>
                     
                    </div>
                    <div class="col-md-12">
                        <button name="btn_alterar" class="btn btn-success " onclick="return ValidarProduto()">Cadastrar</button>
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