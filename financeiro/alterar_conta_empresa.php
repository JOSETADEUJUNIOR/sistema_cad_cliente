<?php
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerLogado();
    require_once '../DAO/EmpresaContaDAO.php';
    $pag_ret = 'consultar_conta_empresa.php';

    $objEmpresa = new EmpresaContaDAO();

    if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
        $id_Emp = $_GET['cod'];
        $dados = $objEmpresa->DetalharEmpresa($id_Emp);

        if (count($dados)== 0) {
            header('location: consultar_conta_empresa.php');
            exit;
        }

    }else if (isset($_POST['btn_alterar'])) {
        
       
        $nome = trim($_POST['nome']);
        $endereco = trim($_POST['endereco']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);
        $cod = $_POST['cod'];
        $ret = $objEmpresa->AlterarEmpresa($nome,$endereco,$telefone,$email,$cod); 

    } else if (isset($_POST['btn_excluir'])) {
        
        $idEmpresa = trim($_POST['cod']);
        $ret = $objEmpresa->ExcluirEmpresa($idEmpresa);
    }else{
        header('location: consultar_conta_empresa.php');
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
                        <?php include_once('_msg.php')?>
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá alterar a empresa. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_conta_empresa.php" method="post">   
                <input type="hidden" name="cod" value="<?= ($dados[0]['id_empresa']==""?"":$dados[0]['id_empresa'])?>">
                <div class="form-group col-md-6" id="divEmpNome">
                    <label>Nome da Empresa</label>
                    <input name="nome" id="empNome" type="text" value="<?= @$dados[0]['nome_empresa'] ?>" placeholder="Digite o nome da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpNome','empNome')" > 
                </div>
                <div class="form-group col-md-6" id="divEmpEnd">
                    <label>Endereço da Empresa</label>
                    <input name="endereco" id="empEnd" type="text" value="<?= @$dados[0]['endereco_empresa'] ?>" placeholder="Digite o Endereço da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpEnd','empEnd')"> 
                </div>
                <div class="form-group col-md-6" id="divEmpTel">
                    <label>Telefone da Empresa</label>
                    <input name="telefone" id="empTel" type="phone" value="<?= @$dados[0]['telefone_empresa'] ?>" placeholder="Digite o Telefone da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpTel','empTel')"> 
                </div>
                <div class="form-group col-md-6" id="divEmpEmail">
                    <label>E-mail da Empresa</label>
                    <input name="email" id="empEmail" type="text" value="<?= @$dados[0]['email_empresa'] ?>" placeholder="Digite o e-mail da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpEmail','empEmail')"> 
                </div>
               <div class="col-md-12">
                    <button name="btn_alterar" class="btn btn-success " onclick=" return ValidarEmpresa()">Alterar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirEmp">Excluir</button>
                    <a href="consultar_conta_empresa.php" class="btn btn-warning ">Voltar</a>
                    <div class="modal fade" id="ExcluirEmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Excluir Empresa</h4>
                                </div>
                                <div class="modal-body">
                                    <h4> Deseja Realmente excluir a empresa <b><?= $dados[0]['nome_empresa']?> ?</b>.<h4>
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