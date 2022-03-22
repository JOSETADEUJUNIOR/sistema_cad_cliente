

function ValidarLogin(){

    if ($("#emailLogin").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: true,
            

            
          })
        return false;
    
    }else if ($("#senhaLogin").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return true;
    
    
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


function ValidarMeusDados(){

    if ($("#dadosNome").val().trim() == ""){
       
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




function SinalizaCampo(div,nome){
    console.log(nome);//dadosNome

    if ($("#"+nome).val().trim()== "") {
        $("#" + div).addClass("has-error");
           

    }else{
        $("#" + div).removeClass("has-error").addClass("has-success");
        
    }

}