<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ProdutoDAO extends Conexao{

public function CadastrarProduto($codBarras, $nomeProduto, $descProd, $valor, $dataCad, $estoque, $fornecedor, $cat, $subcat){

    if (trim($codBarras)=='' || trim($nomeProduto)=='' || trim($dataCad)=='' 
    || trim($valor)=='' || trim($fornecedor)=='' || trim($estoque)=='' || trim($cat)=='' || trim($subcat)=='') {
        
        return 0;
    }
    //Passo 1 = Variavel de conexão.
    $conexao = parent::retornaConexao();
    //Passo 2 = Comando SQL
    $comando_sql = 'Insert into tb_produto (cod_produto, nome_produto, descricao_produto,
                       valor_produto, data_cadastro, estoque, id_funcionario, id_fornecedor, id_categoria, id_subCategoria) values (?,?,?,?,?,?,?,?,?,?)';
    // Passo 3 = sql recebe conexão preparando a conexçaão
    $sql = $conexao->prepare($comando_sql);
    // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações
    $sql->bindValue(1, $codBarras);
    $sql->bindValue(2, $nomeProduto);
    $sql->bindValue(3, $descProd);
    $sql->bindValue(4, $valor);
    $sql->bindValue(5, $dataCad);
    $sql->bindValue(6, $estoque);
    $sql->bindValue(7, UtilDAO::CodigoLogado());
    $sql->bindValue(8, $fornecedor);
    $sql->bindValue(9, $cat);
    $sql->bindValue(10, $subcat);
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
                        valor_produto, data_cadastro, estoque, tb_produto.id_categoria, 
                        nome_categoria, nome_subcategoria, nome_fornecedor
                    from tb_produto 
                    inner join tb_fornecedor on
                        tb_produto.id_fornecedor = tb_fornecedor.id_fornecedor
                    inner join tb_categoria on
                        tb_produto.id_categoria = tb_categoria.id_categoria
                    inner join tb_sub_categoria on
                        tb_produto.id_subCategoria = tb_sub_categoria.id_subCategoria';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function DetalharProduto($idProd){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select tb_produto.id_produto as id_produto, cod_produto, nome_produto, descricao_produto, tb_produto.id_categoria as id_categoria,
                                    tb_produto.id_subCategoria as id_subCategoria, nome_categoria, nome_subcategoria,
                                    valor_produto, data_cadastro, tb_produto.id_fornecedor as id_fornecedor, nome_fornecedor, estoque
                    from tb_produto 
                        inner join tb_fornecedor on
                            tb_produto.id_fornecedor = tb_fornecedor.id_fornecedor
                        inner join tb_categoria on
                            tb_produto.id_categoria = tb_categoria.id_categoria
                        inner join tb_sub_categoria on
                            tb_produto.id_subCategoria = tb_sub_categoria.id_subCategoria
                    where id_produto = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idProd);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
    
}

public function AlterarProduto($codBarras, $nomeProduto, $descProd, $valor, $dataCad, $estoque, $fornecedor, $cat, $subcat, $cod){

    $conexao = parent::retornaConexao();
    $comando_sql = 'update tb_produto set cod_produto = ?, nome_produto = ?, descricao_produto = ?, valor_produto = ?, 
                        data_cadastro = ?, estoque = ?, id_funcionario = ?, id_fornecedor = ?, id_categoria = ?, id_subCategoria = ? where id_produto = ? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $codBarras);
    $sql->bindValue(2, $nomeProduto);
    $sql->bindValue(3, $descProd);
    $sql->bindValue(4, $valor);
    $sql->bindValue(5, $dataCad);
    $sql->bindValue(6, $estoque);
    $sql->bindValue(7, UtilDAO::CodigoLogado());
    $sql->bindValue(8, $fornecedor);
    $sql->bindValue(9, $cat);
    $sql->bindValue(10, $subcat);
    $sql->bindValue(11, $cod);

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

public function TopProduto(){
  
    $conexao = parent::retornaConexao();
    $comando_sql = 'Select 
                        id_produto,
                        nome_produto, 
                        valor_produto,
                        descricao_produto, 
                        estoque 
                        from tb_produto 
                    order by id_produto desc
                    LIMIT 5';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}



}