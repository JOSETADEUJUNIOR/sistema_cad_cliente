<?php
require_once '../../DAO/UtilDAO.php';
$nome = UtilDAO::NomeLogado();
?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Sistema Cadastro de Cliente</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Sistema Clientes</a>
    </div>
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Olá, <?= $nome ?> </div>
</nav>

<div class="modal fade" id="Sair" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Sair do Sistema</h4>
                    </div>
                    <div class="modal-body">
                        <h4> Deseja Realmente <b>Sair ?</b>.<h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="login.php" name="btn_excluir" class="btn btn-primary">Sim</a>
                    </div>
                </div>
            </div>
        </div>