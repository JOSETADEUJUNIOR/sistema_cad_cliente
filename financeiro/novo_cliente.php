<?php

require_once '../DAO/ClienteDAO.php';
$pag_ret = "consultar_cliente.php";
if (isset($_POST['btn_cadastrar'])) {
 
    $nomeCliente = trim($_POST['nomeCliente']);
    $rua = trim($_POST['clienteRua']);
    $bairro = trim($_POST['clienteBairro']);
    $cep = trim($_POST['clienteCep']);
    $cidade = trim($_POST['clienteCidade']);
    $estado = trim($_POST['clienteEstado']);
    $dataNascimento = trim($_POST['clienteNascimento']);
    $obs = trim($_POST['clienteObs']);

    $objCliente = new ClienteDAO();
    $ret = $objCliente->CadastrarCliente($nomeCliente, $rua, $bairro, $cep, $cidade, $estado, $dataNascimento, $obs);
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
                        <h2>Novo Cliente</h2>
                        <h5>Aqui você poderá cadastrar todos os seus clientes. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
            <form action="novo_cliente.php" method="post">   
                <div class="form-group col-md-12" id="divClientNome">
                    <label>Nome do Cliente</label>
                    <input name="nomeCliente" id="nomeCliente" type="text"  placeholder="Digite o nome do cliente" class="form-control" onfocusout="SinalizaCampo('divClientNome','nomeCliente')" > 
                </div>
                <div class="form-group col-md-6" id="divClientRua">
                    <label>Rua</label>
                    <input name="clienteRua" id="clienteRua" type="text" placeholder="Digite a rua do cliente" class="form-control" onfocusout="SinalizaCampo('divClientRua','clienteRua')"> 
                </div>
                <div class="form-group col-md-6" id="divClientBairro">
                    <label>Bairro</label>
                    <input name="clienteBairro" id="clienteBairro" type="phone" placeholder="Digite o bairro do cliente" class="form-control" onfocusout="SinalizaCampo('divClientBairro','clienteBairro')"> 
                </div>
                <div class="form-group col-md-6" id="divClientCep">
                    <label>Cep</label>
                    <input name="clienteCep" id="clienteCep" type="text" placeholder="Digite cep do cliente" class="form-control" onfocusout="SinalizaCampo('divClientCep','clienteCep')"> 
                </div>
                <div class="form-group col-md-6" id="divClientCidade">
                    <label>Cidade</label>
                    <input name="clienteCidade" id="clienteCidade" type="text" placeholder="Digite a cidade do cliente" class="form-control" onfocusout="SinalizaCampo('divClientCidade','clienteCidade')"> 
                </div>
                <div class="form-group col-md-6" id="divClientEstado">
                    <label>Estado</label>
                    <input name="clienteEstado" id="clienteEstado" type="text" placeholder="Digite o estado do cliente" class="form-control" onfocusout="SinalizaCampo('divClientEstado','clienteEstado')"> 
                </div>
                <div class="form-group col-md-6" id="divClientNascimento">
                    <label>Data nascimento</label>
                    <input name="clienteNascimento" id="clienteNascimento" type="date" placeholder="Digite a data de nascimento" class="form-control" onfocusout="SinalizaCampo('divClientNascimento','clienteNascimento')"> 
                </div>
                <div class="form-group col-md-12" id="divClientObs">
                    <label>Obs</label>
                    <input name="clienteObs" id="clienteObs" type="text" placeholder="Digite uma observação para o cliente" class="form-control"> 
                </div>
                
                <div class="col-md-12">
                    <button name="btn_cadastrar" class="btn btn-success" onclick=" return ValidarCliente()">Cadastrar</button>
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
    
</body>

</html>