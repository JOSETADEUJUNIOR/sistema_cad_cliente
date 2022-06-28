<?php require '../DAO/smtpDAO.php';
$objSMTP = new smtpDAO();
$dados = $objSMTP->retornaSMTP();

if (isset($_POST['btn_cadastrar'])) {
    $SMTPID = trim($_POST['SMTPID']);
    $SMTPHost = trim($_POST['SMTPHost']);
    $SMTPPorta = trim($_POST['SMTPPorta']);
    $SMTPUser = trim($_POST['SMTPUser']);
    $SMTPSenha = trim($_POST['SMTPSenha']);
var_dump($SMTPID,$SMTPHost, $SMTPPorta, $SMTPUser, $SMTPSenha);
exit;
    $ret = $objSMTP->CadastrarSMTP($SMTPID,$SMTPHost, $SMTPPorta, $SMTPUser, $SMTPSenha);

}
?>
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

                        <h2>Configuração do SMTP</h2>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <?php

                ?>
                <form id="formSMTP" action="configSmtp.php" method="post">
                    <input id="SMTPID" name="SMTPID" type="hidden" value="<?= $dados[0]['SMTPID'] ?>">
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPHost">
                            <label>Servidor do E-mail SMTP(Host)</label>
                            <input name="SMTPHost" id="SMTPHost" type="text" placeholder="Servidor SMTP" value="<?= $dados[0]['SMTPHost'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPHost','SMTPHost')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPPorta">
                            <label>Porta do SMTP</label>
                            <input name="SMTPPorta" id="SMTPPorta" type="text" placeholder="Padrão 587" value="<?= $dados[0]['SMTPPorta'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPPorta','SMTPPorta')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPUser">
                            <label>Usuário do SMTP</label>
                            <input name="SMTPUser" id="SMTPUser" type="text" placeholder="Usuário SMTP" value="<?= $dados[0]['SMTPUser'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPUser','SMTPUser')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPSenha">
                            <label>Senha do SMTP</label>
                            <input name="SMTPSenha" id="SMTPSenha" type="password" placeholder="Servidor SMTP" value="<?= $dados[0]['SMTPSenha'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPSenha','SMTPSenha')">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="formSMTP" name="btn_cadastrar" class="btn btn-success col-md-6" onclick="return ValidarSMTP()"><?= ($linha[0]['SMTPID'] == "" ? 'Cadastrar' : 'Salvar') ?></button>
                        <a href="index.php" class="btn btn-warning col-md-6">Voltar</a>
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
    <script src="assets/js/jQuery/jquery-3.5.1.min.js"></script>
    <script src="assets/js/validar.js"></script>
    

</body>