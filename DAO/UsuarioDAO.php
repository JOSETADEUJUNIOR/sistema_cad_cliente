<?php

require_once 'DAO/UsuarioDAO.php';

class UsuarioDAO extends Conexao{

    public function Logar($email,$senha){

        if (trim($email) == '' || trim($senha) == '') {
            
            return 0;
        }

    }
    public function Cadastrar($nome,$email,$senha,$resenha){
        
        if (trim($nome) == '' || trim($email)== '' || trim($senha)== '' || trim($resenha)== '') {
            
            return 0;
        }

    }
    public function Meus_Dados($nome){


        if (trim($nome) == '') {
            
            return 0;
        }
    }

    



}