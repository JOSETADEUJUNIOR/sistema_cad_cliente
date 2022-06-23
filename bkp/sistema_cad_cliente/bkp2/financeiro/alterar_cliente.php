<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerLogado();
require_once '../DAO/ClienteDAO.php';

$pag_ret = 'consultar_cliente.php';
$objCliente = new ClienteDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $id_cliente = $_GET['cod'];
    @$dados = $objCliente->DetalharCliente($id_cliente);

    if (count($dados) == 0) {
        header('location: consultar_cliente.php');
        exit;
    }
}else if (isset($_POST['btn_alterar'])) {

    $nomeCliente = trim($_POST['nomeCliente']);
    $clienteRua = trim($_POST['clienteRua']);
    $clienteBairro = trim($_POST['clienteBairro']);
    $clienteCep = trim($_POST['cep']);
    $clienteCidade = trim($_POST['clienteCidade']);
    $clienteEstado = trim($_POST['clienteEstado']);
    $clienteNascimento = trim($_POST['clienteNascimento']);
    $clienteObs = trim($_POST['clienteObs']);
    $cpf = trim($_POST['cpfCliente']);
    $restricao = trim($_POST['restricao']);
    $cod = $_POST['cod'];
    $ret = $objCliente->AlterarCliente($nomeCliente, $clienteRua, $clienteBairro, $clienteCep, $clienteCidade, $clienteEstado, $clienteNascimento, $clienteObs, $cpf, $restricao, $cod );

} else if (isset($_POST['btn_excluir'])) {

    $id_client = $_POST['cod'];
    $ret = $objCliente->ExcluirCliente($id_client);
} else {

    header('location: consultar_cliente.php');
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
                        <?php include_once('_msg.php'); ?>
                        <h2>Alterar Cliente</h2>
                        <h5>Aqui você poderá alterar todos os seus clientes. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_cliente.php" method="post">
                    <input type="text" name="cod" value="<?= $dados[0]['id_cliente'] ?>">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Campos do Endereço
                                </div>
                                <div class="panel-body">

                                    <div class="form-group col-md-6" id="divClientCep">
                                        <label>Cep</label>
                                        <input name="cep" id="cep" value="<?= $dados[0]['cep_cliente'] ?>" type="text" placeholder="Digite cep do cliente" class="form-control" onfocusout="SinalizaCampo('divClientCep','clienteCep')">

                                    </div>
                                    <div class="form-group col-md-6" id="divClientRua">
                                        <label>Rua</label>
                                        <input name="clienteRua" id="clienteRua" value="<?= @$dados[0]['rua_cliente'] ?>" type="text" placeholder="Digite a rua do cliente" class="form-control" onfocusout="SinalizaCampo('divClientRua','clienteRua')">
                                    </div>
                                    <div class="form-group col-md-4" id="divClientBairro">
                                        <label>Bairro</label>
                                        <input name="clienteBairro" id="clienteBairro" value="<?= @$dados[0]['bairro_cliente'] ?>" type="phone" placeholder="Digite o bairro do cliente" class="form-control" onfocusout="SinalizaCampo('divClientBairro','clienteBairro')">
                                    </div>

                                    <div class="form-group col-md-4" id="divClientCidade">
                                        <label>Cidade</label>
                                        <input name="clienteCidade" id="clienteCidade" value="<?= @$dados[0]['cidade_cliente'] ?>" type="text" placeholder="Digite a cidade do cliente" class="form-control" onfocusout="SinalizaCampo('divClientCidade','clienteCidade')">
                                    </div>
                                    <div class="form-group col-md-4" id="divClientEstado">
                                        <label>Estado</label>
                                        <input name="clienteEstado" id="clienteEstado" value="<?= @$dados[0]['estado_cliente'] ?>" type="text" placeholder="Digite o estado do cliente" class="form-control" onfocusout="SinalizaCampo('divClientEstado','clienteEstado')">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Dados do Cliente
                                </div>

                                <div class="panel-body">
                                    <div class="form-group col-md-10" id="divClientNome">
                                        <label>Nome do Cliente</label>
                                        <input name="nomeCliente" id="nomeCliente" type="text" value="<?= @$dados[0]['nome_cliente'] ?>" placeholder="Digite o nome do cliente" class="form-control" onfocusout="SinalizaCampo('divClientNome','nomeCliente')">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" id="divRestricao">
                                            <label>Cliente Restrito?</label>
                                            <select name="restricao" id="restricao" class="form-control" >
                                            <option value="<?=$dados[0]['restricao']?>"><?=($dados[0]['restricao']>0?'SIM':'NÃO')?></option>    
                                                <option value="0">NÃO</option>
                                                <option value="1">SIM</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="divClientNascimento">
                                        <label>Data nascimento</label>
                                        <input name="clienteNascimento" id="clienteNascimento" value="<?= @$dados[0]['data_nascimento'] ?>" type="date" placeholder="Digite a data de nascimento" class="form-control" onfocusout="SinalizaCampo('divClientNascimento','clienteNascimento')">
                                    </div>
                                    <div class="form-group col-md-6" id="divClientCpf">
                                        <label>CPF do Cliente</label>
                                        <input name="cpfCliente" id="cpfCliente" value="<?= @$dados[0]['cpf_cliente'] ?>" type="text" placeholder="Digite o cpf do cliente" class="form-control" onfocusout="SinalizaCampo('divClientCpf','cpfCliente')">
                                    </div>
                                    <div class="form-group col-md-12" id="divClientObs">
                                        <label>Obs</label>
                                        <textarea name="clienteObs" id="clienteObs" type="text" placeholder="Digite uma observação para o cliente" class="form-control"><?= @$dados[0]['obs_cliente'] ?></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <button name="btn_alterar" class="btn btn-success" onclick=" return ValidarCliente()">Alterar</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirCliente">Excluir</button>
                                        <a href="consultar_cliente.php" class="btn btn-warning ">Voltar</a>
                                        <div class="modal fade" id="ExcluirCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Excluir Cliente</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4> Deseja Realmente excluir o cliente <b><?= $dados[0]['nome_cliente'] ?> ?</b>.<h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <button name="btn_excluir" class="btn btn-primary">Sim</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                </form>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        // $("#tel").mask("(00) 0000-00009");

        $("#cpfCliente").mask("000.000.000-00");
       
    </script>
</body>

</html>