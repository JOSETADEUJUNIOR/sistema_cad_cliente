<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ProdutoDAO extends Conexao{

public function CadastrarProduto($codBarras, $nomeProduto, $dataCad, $descProd, $valor, $fornecedor ){

    if (trim($codBarras)=='' || trim($nomeProduto)=='' || trim($dataCad)=='' || trim($descProd)==''
    || trim($valor)=='' || trim($fornecedor)=='') {
        
        return 0;
    }

    //Passo 1 = Variavel de conexão.
  
    $conexao = parent::retornaConexao();
    //Passo 2 = Comando SQL
    $comando_sql = 'Insert into tb_produto (cod_produto, nome_produto, descricao_produto,
                       valor_produto, data_cadastro, id_funcionario, id_fornecedor) values (?,?,?,?,?,?,?)';
    // Passo 3 = sql recebe conexão preparando a conexçaão
    $sql = $conexao->prepare($comando_sql);

    // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações

    $sql->bindValue(1, $codBarras);
    $sql->bindValue(2, $nomeProduto);
    $sql->bindValue(3, $dataCad);
    $sql->bindValue(4, $descProd);
    $sql->bindValue(5, $valor);
    $sql->bindValue(6, UtilDAO::CodigoLogado());
    $sql->bindValue(7, $fornecedor);
    // passo 5 Tentar executar
    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -1;
    }


}

public function ConsultarProduto(){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select id_produto, cod_produto, nome_produto, descricao_produto,
                     valor_produto, data_cadastro, tb_produto.id_fornecedor as id_fornecedor, nome_fornecedor from tb_produto 
                            inner join tb_fornecedor on
                                tb_produto.id_fornecedor = tb_fornecedor.id_fornecedor';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function DetalharProduto($idProd){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select tb_produto.id_produto as id_produto, cod_produto, nome_produto, descricao_produto,
                          valor_produto, data_cadastro, tb_produto.id_fornecedor as id_fornecedor, nome_fornecedor from tb_produto 
                                inner join tb_fornecedor on
                                tb_produto.id_fornecedor = tb_fornecedor.id_fornecedor
                                    where id_produto = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idProd);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
    
}

public function AlterarProduto($codBarras, $nomeProduto, $dataCad, $descProd, $valor, $fornecedor,$cod){

    $conexao = parent::retornaConexao();
    $comando_sql = 'update tb_produto set cod_produto = ?, nome_produto = ?, descricao_produto = ?, valor_produto = ?, 
                        data_cadastro = ?, id_funcionario = ?, id_fornecedor = ? where id_produto = ? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $codBarras);
    $sql->bindValue(2, $nomeProduto);
    $sql->bindValue(3, $descProd);
    $sql->bindValue(4, $valor);
    $sql->bindValue(5, $dataCad);
    $sql->bindValue(6, UtilDAO::CodigoLogado());
    $sql->bindValue(7, $fornecedor);
    $sql->bindValue(8, $cod);

    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -1;
    }
}

public function ExcluirProduto($idProd){

    if ($idProd =='') {
        
        return 0;
    }

    $conexao = parent::retornaConexao();
    $comando_sql = 'delete from tb_produto where id_produto = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idProd);

    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -2;
    }



}




}