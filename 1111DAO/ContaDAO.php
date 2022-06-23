<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao{

    public function CadastrarConta($nome,$agencia,$numConta,$saldo){

        if (trim($nome)=='' || trim($agencia)=='' || trim($numConta)=='' || trim($saldo)=='') {
            return 0;
        }

         //Passo 1 = Variavel de conexão.
         $conexao = parent::retornaConexao();

         //Passo 2 = Comando SQL
 
         $comando_sql = ('Insert into tb_conta (banco_conta, agencia_conta, numero_conta, saldo_conta, id_funcionario) values (?,?,?,?,?)');
 
         // Passo 3 = sql recebe conexão preparando a conexçaão
 
         $sql = $conexao->prepare($comando_sql);
 
         // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações
 
         $sql->bindValue(1, $nome);
         $sql->bindValue(2, $agencia);
         $sql->bindValue(3, $numConta);
         $sql->bindValue(4, $saldo);
         $sql->bindValue(5, UtilDAO::CodigoLogado());
 
         // passo 5 Tentar executar
 
         try {
             $sql->execute();
             return 1;
 
         } catch (Exception $ex) {
             return -1;
         }


    }


    public function ConsultarConta(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta from tb_conta where id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharConta($id_cont){
        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_conta, banco_conta, agencia_conta, numero_conta, saldo_conta from tb_conta where id_conta = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_cont);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function AlterarConta($nome,$agencia,$numConta,$saldo,$cod){

        if (trim($nome)=='' || trim($agencia)=='' || trim($numConta)=='' || trim($saldo)=='') {
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_conta set banco_conta = ?, agencia_conta = ?, numero_conta = ?, 
                            saldo_conta = ? where id_conta = ? and id_funcionario = ?';

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $numConta);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $cod);
        $sql->bindValue(6, UtilDAO::CodigoLogado());
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
        
    }
    public function ExcluirConta($idConta){

        if ($idConta == '') {
            
            return 0;

        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'delete from tb_conta where id_conta = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -2;
        }
    }
}


?>