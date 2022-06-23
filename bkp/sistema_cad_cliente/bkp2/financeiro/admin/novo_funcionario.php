<?php
require_once '../../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../../DAO/CargoDAO.php';
require_once '../../DAO/FuncionarioDAO.php';
$pag_ret= "consultar_funcionario.php";
$getCargo = new CargoDAO();
$cargos = $getCargo->ConsultarCargo();

    if (isset($_POST['btn_cadastrar'])) {
    
        $nomeFuncionario = trim($_POST['nomeFuncionario']);
        $loginFuncionario = trim($_POST['loginFuncionario']);
        $senhaFuncionario = trim($_POST['senhaFuncionario']);
        $dataAdmissao = trim($_POST['dataAdmissao']);
        $dataDemissao = trim($_POST['dataDemissao']);
        $cargo = trim($_POST['Cargo']);
      
        $objFuncionario =  new FuncionarioDAO();
       $ret =  $objFuncionario->CadastrarFuncionario($nomeFuncionario, $dataAdmissao, $loginFuncionario, $senhaFuncionario, $cargo);

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
                        <h2>Novo Funcionário</h2>
                        <h5>Aqui você poderá cadastrar todos os funcionários. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="novo_funcionario.php" method="post">
                    <div class="col-md-6">    
                        <div class="form-group" id="divFuncNome">
                            <label>Nome do Funcionário</label>
                            <input name="nomeFuncionario" id="nomeFuncionario" type="text" placeholder="Digite o nome funcionário" class="form-control" onfocusout="SinalizaCampo('divFuncNome','nomeFuncionario')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divFuncLogin">
                            <label>Login</label>
                            <input name="loginFuncionario" id="loginFuncionario" type="text" placeholder="Digite o login do funcionário" class="form-control" onfocusout="SinalizaCampo('divFuncLogin','loginFuncionario')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divFuncSenha">
                            <label>Senha</label>
                            <input name="senhaFuncionario" id="senhaFuncionario" type="text" placeholder="Digite a senha do funcionário" class="form-control" onfocusout="SinalizaCampo('divFuncSenha','senhaFuncionario')">
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group" id="divFuncAdmissao">
                            <label>Data de Admissão</label>
                            <input name="dataAdmissao" id="dataAdmissao" type="date" placeholder="Digite o nome digite a data de Admissão" class="form-control" onfocusout="SinalizaCampo('divFuncAdmissao','dataAdmissao')">
                         </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group" id="divFuncDemissao">
                            <label>Data de Demissão</label>
                            <input name="dataDemissao" id="dataDemissao" type="date" placeholder="Digite a data de demissão" class="form-control" onfocusout="SinalizaCampo('divFuncDemissao','dataDemissao')">
                        </div>
                    </div>
                    <div class="col-md-12">
                        
                    <div class="form-group" id="divFuncTipo">
                    
                         <label>Selecione o Cargo</label>
                         
                        <select name="Cargo" id="Cargo" class="form-control" onfocusout="SinalizaCampo('divFuncTipo','Cargo')">
                        <option value="">Selecione o Cargo</option>
                        <?php for ($i=0; $i<count($cargos) ; $i++) { ?>
                            <option value="<?= $cargos[$i]['id_cargo']?>"><?= $cargos[$i]['nome_cargo']?></option>
                            <?php } ?>  
                            </select>
                        </div>
                     
                    </div>
                    <div class="col-md-12">
                        <button name="btn_cadastrar" class="btn btn-success " onclick="return ValidarFuncionario()">Cadastrar</button>
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