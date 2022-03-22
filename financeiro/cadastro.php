<?php
require_once '../DAO/UsuarioDAO.php';

if (isset($_POST['btn_finalizar'])) {

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$resenha = trim($_POST['resenha']);

$objCadastrar = new UsuarioDAO();
$ret = $objCadastrar->Cadastrar($nome,$email,$senha,$resenha);
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    include_once('_head.php');
?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Financeiro: Cadastre-se</h2>
               
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Preencha todos os campos </strong>  
                            </div>
                            <div class="panel-body">
                            <?php include_once('_msg.php');?>
                                <form action="cadastro.php" method="post" role="form" autocomplete="on">
<br/>
                                        <div class="form-group input-group" id="divCadNome">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input name="nome" type="text" id="CadNome" class="form-control" placeholder="Seu Nome" onfocusout="SinalizaCampo('divCadNome','CadNome')" />
                                        </div>
                                     
                                         <div class="form-group input-group" id="divCadEmail">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" type="text" id="CadEmail" class="form-control" autocomplete="on" placeholder="Seu E-mail" onfocusout="SinalizaCampo('divCadEmail','CadEmail')" />
                                        </div>
                                      <div class="form-group input-group" id="divCadSenha">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="senha" type="password" id="CadSenha" class="form-control" placeholder="Digite a Senha" onfocusout="SinalizaCampo('divCadSenha','CadSenha')" />
                                        </div>
                                     <div class="form-group input-group" id="divCadResenha">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="resenha" type="password" id="CadResenha" class="form-control" placeholder="Confirme sua senha" onfocusout="SinalizaCampo('divCadResenha','CadResenha')"/>
                                        </div>
                                     
                                     <button name="btn_finalizar" class="btn btn-success " onclick=" return ValidarCadastro()">Finalizar cadastro</button>
                                    <hr />
                                    Já possui cadastro ?  <a href="login.php" >CLIQUE AQUI</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


   
</body>
</html>
