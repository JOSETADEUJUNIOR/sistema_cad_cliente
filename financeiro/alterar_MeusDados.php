<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/FuncionarioDAO.php';
$pag_ret = 'meus_dados.php';
 
$objFunc = new FuncionarioDAO();


if (isset($_GET['cod']) || is_numeric($_GET['cod'])) {
    
    @$id_func = trim(@$_GET['cod']);

    $dados = $objFunc->DetalhaDados($id_func);    

}else if (isset($_POST['btn_alterar'])){

    $id_func = trim($_POST['cod']);
    $nome = trim($_POST['nome']);
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);

    $ret = $objFunc->AlterarDados($id_func, $nome, $login, $senha);

}






$usuario = $objFunc->MeusDados();

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
                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_MeusDados.php" method="post">

                <input type="hidden" name="cod" value="<?= $dados[0]['id_funcionario']?>">
                    <div class="col-md-12">
                    <div class="form-group col-md-6" id="divDadosNome">
                        <label>Nome</label>
                        <input name="nome" value="<?= $dados[0]['nome_funcionario']?>" id="dadosNome" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosNome','dadosNome')">
                    </div>
                    <div class="form-group col-md-3" id="divDadosEmail">
                        <label>Login</label>
                        <input name="login" value="<?= $dados[0]['funcionario_email']?>" id="dadosLogin" type="text" placeholder="Digite o login" class="form-control" onfocusout="SinalizaCampo('divDadosEmail','dadosEmail')">
                    </div>
                    <div class="form-group col-md-3" id="divDadosEmail">
                        <label>Senha</label>
                        <input name="senha" value="<?= $dados[0]['funcionario_senha']?>" id="dadosSenha" type="text" placeholder="Digite a senha" class="form-control" onfocusout="SinalizaCampo('divDadosEmail','dadosEmail')">
                    </div>
                    <div class="col-md-12" id="divDadosEmail">
                         <button name="btn_alterar" class="btn btn-success col-md-2 " onclick=" return ValidarMeusDados()">Alterar</button>
                         <a href="meus_dados.php" class="btn btn-warning col-md-2 " >Voltar</a>
                    </div>   
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