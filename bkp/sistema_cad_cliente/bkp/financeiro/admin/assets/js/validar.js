
function ValidarLogin(){

    if ($("#emailLogin").val().trim() == ""){
        
        $("#emailLogin").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo e-mail corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
        return false;
    
    }else if ($("#senhaLogin").val().trim() == ""){
        $("#senhaLogin").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        
          return true;
    }
}


function ValidarCategoria(){

    if ($("#nomeCategoria").val().trim() == "") {
        $("#nomeCategoria").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o Nome Corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}

function ValidarSubCat(){
    if ($("#SubNome").val().trim() == "") {
        $("#subNome").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o Nome Corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }if ($("#cat").val().trim() == "") {
        $("#cat").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a Categoria!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }

}


function ValidarMeusDados(){

    if ($("#dadosNome").val().trim() == ""){
        $("#dadosNome").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else if ($("#dadosEmail").val().trim() == ""){
        $("#dadosEmail").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo E-mail corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}

function ValidarCliente(){

    if ($("#nomeCliente").val().trim() == "") {
        $("#nomeCliente").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome do cliente corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteRua").val().trim() == "") {
        $("#clienteRua").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo rua corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteBairro").val().trim() == "") {
        $("#clienteBairro").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo bairro corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteCep").val().trim() == "") {
        $("#clienteCep").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cep corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteCidade").val().trim() == "") {
        $("#clienteCidade").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cidade corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteEstado").val().trim() == "") {
        $("#clienteEstado").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo estado corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#clienteNascimento").val().trim() == "") {
        $("#clienteNascimento").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo data de nascimento corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }
}

function ValidarCargo(){
    if ($("#nomeCargo").val().trim() == "") {
        $("#nomeCargo").focus();
        Swal.fire({
            icon: 'warning',
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
        })
        return false;
    }
    if ($("#cargoDescricao").val().trim() == "") {
        $("#cargoDescricao").focus();
        Swal.fire({
            icon: 'warning',
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo descrição corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
        })
        return false;
    }
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }

}

function ValidarFuncionario(){

    if ($("#nomeFuncionario").val().trim() == "") {
        $("#nomeFuncionario").focus();        
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#loginFuncionario").val().trim() == "") {
        $("#loginFuncionario").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo login corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#senhaFuncionario").val().trim() == "") {
        $("#senhaFuncionario").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
          return false;

    }else if ($("#senhaFuncionario").val().length < 6){
        $("#senhaFuncionario").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo senha com no mínimo 6 caracteres</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    if ($("#dataAdmissao").val().trim() == "") {
        $("#dataAdmissao").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo data admissão corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }
    
    
    if ($("#Cargo").val().trim() == "") {
        $("#Cargo").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cargo corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;

    }

    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }





}



function ValidarMovimento(){

    if ($("#tipo").val().trim() == ""){
        $("#tipo").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo tipo corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#dtMovimento").val().trim() == ""){
        $("#dtMovimento").focus();
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Data do Movimento corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }
    if ($("#valor").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Valor corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    if ($("#cat").val().trim() == ""){

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                width: 'auto',
                html: '<h3>Preencha o campo Categoria corretamente</h3>',
                showConfirmButton: false,
                timer: 2000,
                
                })
            return false;
    }
    if ($("#emp").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Empresa corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    if ($("#conta").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Conta corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return false;
    }
}



function ValidarConta(){

    if ($("#nomeBanco").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome do banco Corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#agencia").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo agencia corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#numConta").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo numero da conta corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#saldo").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo saldo corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return false;
    }


}



function ValidarProduto(){

    if ($("#codBarras").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo codigo do produto corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#nomeProduto").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome do produto corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#dataCad").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo data do cadastro corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#cat").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a categoria corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#subcat").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a sub Categoria corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#fornecedor").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione o fornecedor corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    
    if ($("#estoque").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione o estoque corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#valor").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo valor do produto corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    
    
    
    if ($("#descProd").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo descrição do produto corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }

    
    
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}



function ValidarFornecedor(){

    if ($("#cnpj").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cnpj corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#nomeFornecedor").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#tel").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo telefone corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#email").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo e-mail corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }

    if ($("#cep").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo cep corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#rua").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a rua corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#bairro").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione o bairro corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#cidade").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione a cidade corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#estado").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Selecione o estado corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }

}
function SinalizaCampo(div,nome){
    console.log(nome);//dadosNome

    if ($("#"+nome).val().trim()== "") {
        $("#" + div).addClass("has-error");
           

    }else{
        $("#" + div).removeClass("has-error").addClass("has-success");
        
    }

}