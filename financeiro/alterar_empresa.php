<?php
    require_once '../DAO/EmpresaDAO.php';
    if (isset($_POST['btn_alterar'])) {
        
        $nome = trim($_POST['nome']);
        $endereco = trim($_POST['endereco']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);

        $objEmpresa = new EmpresaDAO();

        $ret = $objEmpresa->AlterarEmpresa($nome,$endereco,$telefone,$email); 

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
                <form action="nova_empresa.php" method="post">   
                <div class="form-group col-md-6" id="divEmpNome">
                    <label>Nome da Empresa</label>
                    <input name="nome" id="empNome" type="text" value="<?= $nome == ''?"":$nome?>" placeholder="Digite o nome da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpNome','empNome')" > 
                </div>
                <div class="form-group col-md-6" id="divEmpEnd">
                    <label>Endereço da Empresa</label>
                    <input name="endereco" id="empEnd" type="text" placeholder="Digite o Endereço da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpEnd','empEnd')"> 
                </div>
                <div class="form-group col-md-6" id="divEmpTel">
                    <label>Telefone da Empresa</label>
                    <input name="telefone" id="empTel" type="phone" placeholder="Digite o Telefone da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpTel','empTel')"> 
                </div>
                <div class="form-group col-md-6" id="divEmpEmail">
                    <label>E-mail da Empresa</label>
                    <input name="email" id="empEmail" type="text" placeholder="Digite o e-mail da Empresa" class="form-control" onfocusout="SinalizaCampo('divEmpEmail','empEmail')"> 
                </div>
               <div class="col-md-12">
                    <button name="btn_alterar" class="btn btn-success " onclick=" return ValidarEmpresa()">Alterar</button>
                    <button class="btn btn-danger ">Excluir</button>
                    <a href="consultar_empresa.php" class="btn btn-warning ">Voltar</a>
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