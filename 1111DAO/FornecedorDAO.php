<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';


class FornecedorDAO extends Conexao
{                                      
    public function CadastrarFornecedor($nome, $telefone, $email, $rua, $cep, $bairro, $cidade, $estado, $cnpj){

        if (trim($nome)=='' || trim($telefone)=='' || trim($email)=='' || trim($rua)=='' ||
            trim($cep)=='' || trim($bairro)=='' || trim($cidade)=='' || trim($estado)=='' || trim($cnpj)=='') {
           
                return 0;
        }

        //Passo 1 = Variavel de conexão
        $conexao = parent::retornaConexao();
        //Passo 2 = Comando SQL
        $comando_sql = 'Insert into tb_fornecedor (nome_fornecedor, telefone_fornecedor, email_fornecedor, 
                          rua_fornecedor, cep_fornecedor, bairro_fornecedor, cidade_fornecedor, estado_fornecedor,
                          cnpj_fornecedor, id_funcionario) values (?,?,?,?,?,?,?,?,?,?)';

        
        //Passo 3 = sql recebe preparando a conexao
        $sql = $conexao->prepare($comando_sql);
        
        //Passo 4 = Verifica se no comando sql tem ?. caso tiver configura as informações
       
        $sql->bindValue(1,$nome);
        $sql->bindValue(2,$telefone);
        $sql->bindValue(3,$email);
        $sql->bindValue(4,$rua);
        $sql->bindValue(5,$cep);
        $sql->bindValue(6,$bairro);
        $sql->bindValue(7,$cidade);
        $sql->bindValue(8,$estado);
        $sql->bindValue(9,$cnpj);
        $sql->bindValue(10,UtilDao::CodigoLogado());

        //Passo 5 Tentar executar
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }

    }


    public function ConsultarFornecedor(){

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select 
                            id_fornecedor, nome_fornecedor, telefone_fornecedor, email_fornecedor, 
                            rua_fornecedor, cep_fornecedor, bairro_fornecedor, cidade_fornecedor, estado_fornecedor,
                            cnpj_fornecedor
                        from tb_fornecedor ';
    
        $sql = $conexao->prepare($comando_sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function ResultadoFornecedor($idForn){

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select 
                            id_fornecedor, nome_fornecedor, telefone_fornecedor, email_fornecedor, 
                            rua_fornecedor, cep_fornecedor, bairro_fornecedor, cidade_fornecedor, estado_fornecedor,
                            cnpj_fornecedor
                        from tb_fornecedor ';

        if ($idForn > 0) {
            $comando_sql = $comando_sql . ' where id_fornecedor = ?';
        }
    

        $sql = $conexao->prepare($comando_sql);
        if ($idForn >0) {
            $sql->bindValue(1, $idForn);
        }
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ResultadoFornecedorCnpj($cnpj){

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select 
                            id_fornecedor, nome_fornecedor, telefone_fornecedor, email_fornecedor, 
                            rua_fornecedor, cep_fornecedor, bairro_fornecedor, cidade_fornecedor, estado_fornecedor,
                            cnpj_fornecedor
                        from tb_fornecedor 
                            where cnpj_fornecedor = ?';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $cnpj);
        $sql->execute();
        $result =  $sql->fetchAll(PDO::FETCH_ASSOC);

        if (is_array($result)) {
            return $result;
        }else {
            return -8;
        }
      
    }





    public function DetalharFornecedor($idForn){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_fornecedor, nome_fornecedor, telefone_fornecedor, email_fornecedor, 
                                rua_fornecedor, cep_fornecedor, bairro_fornecedor, cidade_fornecedor, estado_fornecedor,
                                cnpj_fornecedor from tb_fornecedor where id_fornecedor = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idForn);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }
                                    
    public function AlterarFornecedor($nome, $telefone, $email, $rua, $cep, $bairro, $cidade, $estado, $cnpj, $cod){

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_fornecedor set nome_fornecedor = ?, telefone_fornecedor = ?, email_fornecedor = ?, rua_fornecedor = ?, cep_fornecedor = ?,
                        bairro_fornecedor = ?, cidade_fornecedor = ?, estado_fornecedor = ?, cnpj_fornecedor = ? where id_fornecedor = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $email);
        $sql->bindValue(4, $rua);
        $sql->bindValue(5, $cep);
        $sql->bindValue(6, $bairro);
        $sql->bindValue(7, $cidade);
        $sql->bindValue(8, $estado);
        $sql->bindValue(9, $cnpj);
        $sql->bindValue(10, $cod);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }

    }

    public function ExcluirFornecedor($idForn){

        if ($idForn=='') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'delete from tb_fornecedor where id_fornecedor = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idForn);
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
           return -2;
        }

    }

    
}
?>
