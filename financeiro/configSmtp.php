<?php require 'DAO/Conexao.php'; ?>
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
                $linha['SMTPHost'] = "";
                $linha['SMTPPort'] = "";
                $linha['SMTPUser'] = "";
                $linha['SMTPSenha'] = "";
                if (!$linha = ("Select SMTPID, SMTPHost, SMTPPorta, SMTPUser, SMTPSenha from cad_colaborador.SMTP"))) {
                }
                ?>
                <form id="formSMTP">
                    <input id="SMTPID" name="SMTPID" type="hidden" value="<?= $linha['SMTPID'] ?>">
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPHost">
                            <label>Servidor do E-mail SMTP(Host)</label>
                            <input name="SMTPHost" id="SMTPHost" type="text" placeholder="Servidor SMTP" value="<?= $linha['SMTPHost'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPHost','SMTPHost')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPPorta">
                            <label>Porta do SMTP</label>
                            <input name="SMTPPorta" id="SMTPPorta" type="text" placeholder="Padrão 587" value="<?= $linha['SMTPPorta'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPPorta','SMTPPorta')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPUser">
                            <label>Usuário do SMTP</label>
                            <input name="SMTPUser" id="SMTPUser" type="text" placeholder="Usuário SMTP" value="<?= $linha['SMTPUser'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPUser','SMTPUser')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="DivSMTPSenha">
                            <label>Senha do SMTP</label>
                            <input name="SMTPSenha" id="SMTPSenha" type="password" placeholder="Servidor SMTP" value="<?= $linha['SMTPSenha'] ?>" class="form-control" onfocusout="SinalizaCampo('DivSMTPSenha','SMTPSenha')">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" id="formSMTP" name="formSMTP" form="formSMTP" class="btn btn-success col-md-6" onclick="return ValidarSMTP()"><?= ($linha['SMTPID'] == "" ? 'Cadastrar' : 'Salvar') ?></button>
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
    <script>
        $('#formSMTP').submit(function(e) {

            e.preventDefault(); // não da refresh na pagina
            var c_SMTPID = $('#SMTPID').val();
            var c_SMTPHost = $('#SMTPHost').val();
            var c_SMTPPorta = $('#SMTPPorta').val();
            var c_SMTPUser = $('#SMTPUser').val();
            var c_SMTPSenha = $('#SMTPSenha').val();
            $.ajax({
                url: 'smtpAjax.php',
                method: 'POST',
                data: {
                    SMTPID: c_SMTPID,
                    SMTPHost: c_SMTPHost,
                    SMTPPorta: c_SMTPPorta,
                    SMTPUser: c_SMTPUser,
                    SMTPSenha: c_SMTPSenha,
                },
                dataType: 'json'
            }).done(function(result) {
                if (result == -1) {
                    Swal.fire({

                        icon: 'success',
                        title: 'Sucesso',
                        width: 'auto',
                        html: '<h3>Ação realizada com sucesso!</h3>',
                        showConfirmButton: false,
                        timer: 2000,
                    })
                } else {
                    $('#crgNome').focus();
                    Swal.fire({

                        icon: 'error',
                        title: 'Ops......',
                        width: 'auto',
                        html: '<h3>Erro ao realizar a ação, tente mais tarde!</h3>',
                        showConfirmButton: false,
                        timer: 2000,
                    });


                }

            });

        });
    </script>

</body>