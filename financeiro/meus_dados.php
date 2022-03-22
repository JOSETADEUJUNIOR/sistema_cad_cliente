<?php
    require_once '../DAO/UsuarioDAO.php';
    if (isset($_POST['btn_alterar'])) {
        
        $nome = trim($_POST['nome']);
       
        $objUsuario = new UsuarioDAO();
        $ret = $objUsuario->Meus_Dados($nome); 

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
                        <?php include('_msg.php')?>
                        <h2>Meus Dados</h2>
                        <h5>Aqui você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
            <form action="meus_dados.php" method="post">
                <div class="form-group" id="divDadosNome">
                    <label>Nome</label>
                    <input name="nome" id="dadosNome" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosNome','dadosNome')"> 
                </div>
                <div class="form-group" id="divDadosEmail">
                    <label>E-mail</label>
                    <input name="email" id="dadosEmail" type="text" placeholder="Digite o seu nome" class="form-control" onfocusout="SinalizaCampo('divDadosEmail','dadosEmail')"> 
                </div>
                
                   <button name="btn_alterar" class="btn btn-success " onclick=" return ValidarMeusDados()">Alterar</button>
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