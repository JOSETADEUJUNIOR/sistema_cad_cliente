<?php
require_once '../../DAO/UtilDAO.php';
UtilDAO::VerLogado();
    require_once '../../DAO/FuncionarioDAO.php';
    require_once '../../DAO/CargoDAO.php';
    require_once '../../DAO/UtilDAO.php';

    $pag_ret = 'consultar_funcionario.php';
    $objFuncionario = new FuncionarioDAO();
    $objCargo = new CargoDAO();
    $cargos = $objCargo->ConsultarCargo();

    if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
        
        $id_funcionario = $_GET['cod'];
        $dados = $objFuncionario->DetalharFuncionario($id_funcionario);
       

        if (count($dados)== 0) {
            header('location: consultar_funcionario.php');
            exit;
        }
    }else if (isset($_POST['btn_alterar'])) {
        
        $nome_funcionario = trim($_POST['nomeFuncionario']);
        $data_admissao = trim($_POST['dataAdmissao']);
        $loginFuncionario = trim($_POST['loginFuncionario']);
        $senhaFuncionario = trim($_POST['senhaFuncionario']);
        $data_demissao = trim($_POST['dataDemissao']);
        $cargo = trim($_POST['cargo']);
        $cod = $_POST['cod'];
        $ret = $objFuncionario->AlterarFuncionario($nome_funcionario,$data_admissao,$loginFuncionario, $senhaFuncionario,$cargo,$cod);
    }else if (isset($_POST['btn_excluir'])) {
    
        $idFunc = $_POST['cod'];
        $ret = $objFuncionario->ExcluirFuncionario($idFunc); 
    }else{
        header('location: consultar_funcionario.php');
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
                        <h2>Alterar Funcionário</h2>
                        <h5>Aqui você poderá Alterar todos os funcionários. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_funcionario.php" method="post">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_funcionario']?>">
                     <div class="col-md-6">    
                        <div class="form-group" id="divFuncNome">
                            <label>Nome do Funcionário</label>
                            <input name="nomeFuncionario" id="nomeFuncionario" value="<?= @($dados[0]['nome_funcionario']==""?"":$dados[0]['nome_funcionario'])?>" type="text"  class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divFuncLogin">
                            <label>Email</label>
                            <input name="loginFuncionario" id="loginFuncionario" type="text" value="<?= @($dados[0]['funcionario_email']==""?"":$dados[0]['funcionario_email'])?>" placeholder="Digite o login do funcionário" class="form-control" onfocusout="SinalizaCampo('divFuncLogin','loginFuncionario')">
                        </div>
                    </div>
                    <div class="col-md-3">    
                        <div class="form-group" id="divFuncSenha">
                            <label>Senha</label>
                            <input name="senhaFuncionario" id="senhaFuncionario" type="text" value="<?= @($dados[0]['funcionario_senha']==""?"":$dados[0]['funcionario_senha'])?>" placeholder="Digite a senha do funcionário" class="form-control" onfocusout="SinalizaCampo('divFuncSenha','senhaFuncionario')">
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group" id="divFuncNome">
                            <label>Data de Admissão</label>
                            <input name="dataAdmissao" id="dataAdmissao" type="date" value="<?= @($dados[0]['data_admissao']==""?"":$dados[0]['data_admissao'])?>"  class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                         </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group" id="divFuncNome">
                            <label>Data de Demissão</label>
                            <input name="dataDemissao" id="dataDemissao" type="date" value="<?= @($dados[0]['data_demissao']==""?"":$dados[0]['data_demissao'])?>"  class="form-control" onfocusout="SinalizaCampo('divNomeCat','nomeCategoria')">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o Cargo</label>
                            <select name="cargo" id="cargo" class="form-control" onfocusout="SinalizaCampo('divTipo','tipo')">
                            <option value="<?= @$dados[0]['id_cargo']?>"><?= @$dados[0]['nome_cargo']?></option>
                            <?php for ($i=0; $i<count($cargos) ; $i++) { ?> 
                            <option value="<?= $cargos[$i]['id_cargo']?>"><?= $cargos[$i]['nome_cargo']?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="btn_alterar" class="btn btn-success " onclick="return ValidarCategoria()">Alterar</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirFuncionario">Excluir</button>
                        <a href="consultar_funcionario.php" class="btn btn-warning ">Voltar</a>

                        <div class="modal fade" id="ExcluirFuncionario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Funcionário</h4>
                                </div>
                                <div class="modal-body">
                                    <h4> Deseja Realmente excluir o funcionário <b><?= $dados[0]['nome_funcionario']?> ?</b>.<h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button name="btn_excluir" class="btn btn-primary">Sim</button>
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
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
</body>

</html>