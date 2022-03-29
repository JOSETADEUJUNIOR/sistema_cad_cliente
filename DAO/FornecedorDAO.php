<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';


class FornecedorDAO extends Conexao
{
    public function CadastrarFornecedor($nomeFornecedor, $telefoneFonecedor, $emailFornecedor, $ruaFornecedor,
                                             $bairro, $cidade, $estado, $dataNascimento, $obs){

        if (trim($nomeCliente)=='' || trim($rua)=='' || trim($bairro)=='' || trim($cep)=='' || trim($cidade)=='' ||
            trim($estado)=='' || trim($dataNascimento)=='') {
           
                return 0;
        }

        //Passo 1 = Variavel de conexão
        $conexao = parent::retornaConexao();

        //Passo 2 = Comando SQL
        $comando_sql = ('Insert into tb_cliente (nome_cliente, rua_cliente, bairro_cliente, 
                         cep_cliente, cidade_cliente, estado_cliente, data_nascimento, obs_cliente,
                          id_funcionario) values (?,?,?,?,?,?,?,?,?)');

        
        //Passo 3 = sql recebe preparando a conexao
        $sql = $conexao->prepare($comando_sql);
        
        //Passo 4 = Verifica se no comando sql tem ?. caso tiver configura as informações
       
        $sql->bindValue(1,$nomeCliente);
        $sql->bindValue(2,$rua);
        $sql->bindValue(3,$bairro);
        $sql->bindValue(4,$cep);
        $sql->bindValue(5,$cidade);
        $sql->bindValue(6,$estado);
        $sql->bindValue(7,$dataNascimento);
        $sql->bindValue(8,$obs);
        $sql->bindValue(9,UtilDao::CodigoLogado());

        //Passo 5 Tentar executar
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }

    }


    public function ConsultarCliente(){

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select 
                          id_cliente
                          ,nome_cliente
                          ,rua_cliente
                          ,bairro_cliente
                          ,cep_cliente
                          ,cidade_cliente
                          ,estado_cliente
                          ,data_nascimento      
                          ,obs_cliente  
                             from tb_cliente where id_funcionario = ? ';
    
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharCliente($id_cliente){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_cliente, nome_cliente, rua_cliente, bairro_cliente,
                               cep_cliente, cidade_cliente, estado_cliente, data_nascimento,
                               obs_cliente from tb_cliente where id_cliente = ? and id_funcionario = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_cliente);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function AlterarCliente($nomeCliente, $clienteRua, $clienteBairro, $clienteCep, $clienteCidade, $clienteEstado, $clienteNascimento, $clienteObs, $cod){

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_cliente set nome_cliente = ?, rua_cliente = ?,  bairro_cliente = ?, cep_cliente = ?, cidade_cliente = ?,
                                                estado_cliente = ?, data_nascimento = ?, obs_cliente = ? where id_funcionario = ? and id_cliente = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nomeCliente);
        $sql->bindValue(2, $clienteRua);
        $sql->bindValue(3, $clienteBairro);
        $sql->bindValue(4, $clienteCep);
        $sql->bindValue(5, $clienteCidade);
        $sql->bindValue(6, $clienteEstado);
        $sql->bindValue(7, $clienteNascimento);
        $sql->bindValue(8, $clienteObs);
        $sql->bindValue(9, UtilDAO::CodigoLogado());
        $sql->bindValue(10, $cod);

        try {
            $sql->execute();
            echo 'passou';
            return 1;
        } catch (Exception $ex) {
            return -1;
        }

    }

    public function ExcluirCliente($id_client){

        if ($id_client=='') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'delete from tb_cliente where id_cliente = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_client);
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
