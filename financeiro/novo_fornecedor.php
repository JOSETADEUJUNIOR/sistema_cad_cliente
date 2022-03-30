<?php
require_once '../DAO/FornecedorDAO.php';
$pag_ret = 'consultar_fornecedor.php';
$objForn = new FornecedorDAO();

if (isset($_POST['btn_cadastrar'])) {
    
    $cnpj = trim($_POST['cnpj']);
    $nome = trim($_POST['nomeFornecedor']);
    $telefone = trim($_POST['tel']);
    $email = trim($_POST['email']);
    $rua = trim($_POST['rua']);
    $cep = trim($_POST['cep']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $ret = $objForn->CadastrarFornecedor($nome, $telefone, $email, $rua, $cep, $bairro, $cidade, $estado, $cnpj);
  
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
                        <h2>Novo Fornecedor</h2>
                        <h5>Aqui você poderá cadastrar todos os Fornecedores. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="novo_fornecedor.php" method="post">
                    
                <div class="col-md-4">    
                        <div class="form-group" id="divFornCnpj">
                            <label>Cnpj</label>
                            <input name="cnpj" id="cnpj" type="text" placeholder="Digite o cnpj" class="form-control" onfocusout="SinalizaCampo('divFornCnpj','cnpj')">
                        </div>
                    </div>  
                <div class="col-md-8">    
                        <div class="form-group" id="divFornNome">
                            <label>Nome do Fornecedor</label>
                            <input name="nomeFornecedor" id="nomeFornecedor" type="text" placeholder="Digite o nome do fornecedor" class="form-control" onfocusout="SinalizaCampo('divFornNome','nomeFornecedor')">
                        </div>
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group" id="divFornTel">
                            <label>Telefone</label>
                            <input name="tel" id="tel" type="text" placeholder="Digite o telefone" class="form-control" onfocusout="SinalizaCampo('divFornTel','tel')">
                         </div>
                    </div>
                    <div class="col-md-8">    
                        <div class="form-group" id="divFornEmail">
                            <label>E-mail</label>
                            <input name="email" id="email" type="text" placeholder="Digite o e-mail" class="form-control" onfocusout="SinalizaCampo('divFornEmail','email')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divFornCep">
                            <label>Cep</label>
                            <input name="cep" id="cep" type="text" placeholder="Digite o cep" class="form-control" onfocusout="SinalizaCampo('divFornCep','cep')">
                        </div>
                    </div>
                    <div class="col-md-9">    
                        <div class="form-group" id="divFornRua">
                            <label>Rua</label>
                            <input name="rua" id="rua" type="text" placeholder="Digite a rua" class="form-control" onfocusout="SinalizaCampo('divFornRua','rua')">
                        </div>
                    </div>
                    <div class="col-md-4">    
                        <div class="form-group" id="divFornBairro">
                            <label>Bairro</label>
                            <input name="bairro" id="bairro" type="text" placeholder="Digite o bairro" class="form-control" onfocusout="SinalizaCampo('divFornBairro','bairro')">
                        </div>
                    </div>
                    <div class="col-md-4">    
                        <div class="form-group" id="divFornCidade">
                            <label>Cidade</label>
                            <input name="cidade" id="cidade" type="text" placeholder="Digite a cidade" class="form-control" onfocusout="SinalizaCampo('divFornCidade','cidade')">
                        </div>
                    </div>
                    <div class="col-md-4">    
                        <div class="form-group" id="divFornEstado">
                            <label>Estado</label>
                            <input name="estado" id="estado" type="text" placeholder="Digite o estado" class="form-control" onfocusout="SinalizaCampo('divFornEstado','estado')">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="btn_cadastrar" class="btn btn-success " onclick="return ValidarFornecedor()">Cadastrar</button>
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