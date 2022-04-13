<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaContaDAO extends Conexao{


    public function CadastrarEmpresa($nome,$telefone,$endereco,$email){

       
        if (trim($nome) == '' || trim($telefone) == '' || trim($endereco) == '' || trim($email) == ''){
            return 0;
        }

       //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

       //Passo 2 = Comando SQL

        $comando_sql = ('Insert into tb_empresa_conta (nome_empresa, endereco_empresa, telefone_empresa, email_empresa, id_funcionario) values (?,?,?,?,?)');
     
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

    public function ConsultarEmpresa(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_empresa, nome_empresa, endereco_empresa, telefone_empresa, email_empresa from tb_empresa_conta where id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
       }

       public function DetalharEmpresa($id_Emp){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_empresa, nome_empresa, endereco_empresa, telefone_empresa, email_empresa from tb_empresa_conta where id_empresa = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_Emp);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function AlterarEmpresa($nome,$endereco,$telefone,$email, $cod){

        if (trim($nome) == '' || trim($telefone) == '' || trim($endereco) == '' || trim($email) == ''){
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_empresa_conta set nome_empresa = ?, endereco_empresa = ?, telefone_empresa = ?, email_empresa = ? where id_empresa = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $endereco);
        $sql->bindValue(3, $telefone);
        $sql->bindValue(4, $email);
        $sql->bindValue(5, $cod);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }

    }

    public function ExcluirEmpresa($idEmpresa){

        if ($idEmpresa =='') {
            
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'delete from tb_empresa_conta where id_empresa = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -2;
        }



    }


}