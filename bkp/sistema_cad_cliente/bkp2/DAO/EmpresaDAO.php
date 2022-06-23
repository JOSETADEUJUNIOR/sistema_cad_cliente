<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao{


    public function CadastrarEmpresa($nome,$telefone,$endereco,$email){

       
        if (trim($nome) == '' || trim($telefone) == '' || trim($endereco) == '' || trim($email) == ''){
            return 0;
        }

       //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

       //Passo 2 = Comando SQL

        $comando_sql = ('Insert into tb_empresa (nome_empresa, endereco_empresa, telefone_empresa, email_empresa, id_usuario) values (?,?,?,?,?)');
     
       // Passo 3 = sql recebe conexão preparando a conexçaão
        $sql = $conexao->prepare($comando_sql);
       
       // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações
        $sql->bindValue(1,$nome);
        $sql->bindValue(2,$telefone);
        $sql->bindValue(3,$endereco);
        $sql->bindValue(4,$email);
        $sql->bindValue(5,UtilDAO::CodigoLogado());
      

       // passo 5 Tentar executar
       try {
            $sql->execute();
            
            return 1;
       } catch (Exception $ex) {
          
        return -1;
       } 
       



    }
    public function AlterarEmpresa($nome,$telefone,$endereco,$email){

        if (trim($nome) == '' || trim($telefone) == '' || trim($endereco) == '' || trim($email) == ''){
            return 0;
        }
    }



}