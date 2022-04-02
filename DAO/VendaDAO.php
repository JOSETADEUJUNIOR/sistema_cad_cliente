<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class VendaDAO extends Conexao{

    public function CadastrarVenda($dtVenda, $clienteVenda, $idProduto, $qtdVenda, $valor)
    {

        if ($dtVenda == '' || $clienteVenda == '' || $idProduto=='' || $qtdVenda=='' || $valor=='') {

            return 0;
        }


        //INICIA A TRANSAÇÂO AQUI

        try {

            #cadastrar a venda
            $conexao = parent::retornaConexao();
            $comando_sql = 'insert into tb_venda (data_venda, id_cliente) values (?,?)';
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $dtVenda);
            $sql->bindValue(2, $clienteVenda);
            $sql->execute();
            #recuperar o id da venda
            $idVenda = $conexao->lastInsertId();



            $comando_sql = 'insert into tb_item_venda (id_venda, id_produto, qtd_produto, item_valor) values (?,?,?,?)';
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $idVenda);
            $sql->bindValue(2, $idProduto);
            $sql->bindValue(3, $qtdVenda);
            $sql->bindValue(4, $valor);

            $sql->execute();

            //COMMIT TRASACTION

            return $idVenda;
        } catch (Exception $ex) {
            //ROLLBACK
            echo $ex->getMessage();
            return -1;
        }
    }



    public function ItensVenda($idVendaRet){

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_item_venda, id_venda, tb_item_venda.id_produto as id_produto, qtd_produto, 
                                item_valor, nome_produto
                            from tb_item_venda
                                inner join tb_produto on
                                  tb_item_venda.id_produto = tb_produto.id_produto
                                  where id_venda = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idVendaRet);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }


   public function AddItem($idVenda, $itemVenda, $qtdVenda, $valor){

    if ($idVenda==''|| $itemVenda== '' || $qtdVenda==''|| $valor=='') {
        return 0;
    }
    $conexao = parent::retornaConexao();
    $comando_sql = 'insert into tb_item_venda (id_venda, id_produto, qtd_produto, item_valor) values (?,?,?,?)';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idVenda);
    $sql->bindValue(2, $itemVenda);
    $sql->bindValue(3, $qtdVenda);
    $sql->bindValue(4, $valor);

    try {
        $sql->execute();
        return $idVenda;
    } catch (Exception $ex) {
      
        return -1;
    }
    


   }

}
?>