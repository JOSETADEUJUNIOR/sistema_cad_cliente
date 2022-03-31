<?php
require_once './DAO/UsuarioDAO.php';
if (isset($_POST['btn_acessar'])) {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    
    $objLogar = new UsuarioDAO();
    $ret = $objLogar->ValidarLogin($email,$senha);
    $pag_ret= "login.php";
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    include_once('_head.php');
   
?>
 <style>
     body{
         background-color: #98FB98;
     }


 </style>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Sistema de Cadastro: Painel Admin</h2>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Faça seu acesso </strong>  
                        
                            </div>
                            <div class="panel-body">
                                <form action="login.php" method="post" role="form">
                                       <br />
                                       <?php include_once('_msg.php');?>
                                     <div class="form-group input-group" id="divLoginEmail">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name="email" id="emailLogin" type="text" class="form-control" placeholder="Seu e-mail "  onfocusout="SinalizaCampo('divLoginEmail','emailLogin')" />
                                        </div>
                                        <div class="form-group input-group" id="divLoginSenha">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="senha" id="senhaLogin" type="password" class="form-control"  placeholder="Sua senha" onfocusout="SinalizaCampo('divLoginSenha','senhaLogin')" />
                                        </div>
                                    
                                     
                                     <button name="btn_acessar" class="btn btn-primary " onclick=" return ValidarLogin()">Acessar</button>
                                     </form>
                                   
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


   
</body>
</html>
