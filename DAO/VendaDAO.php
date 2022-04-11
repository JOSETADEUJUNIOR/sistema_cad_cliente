<?php
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class VendaDAO extends Conexao{

    public function CadastrarVenda($dtVenda, $clienteVenda, $idProduto, $qtdVenda, $valor)
    {

        if ($dtVenda == '' || $clienteVenda == '' || $idProduto=='' || $qtdVenda=='' || $valor=='') {

            return 0;
        }

        $conexao = parent::retornaConexao();

        //INICIA A TRANSAÇÂO AQUI
        $conexao->beginTransaction();

        try {

            #cadastrar a venda
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

            #retira o item do produto conforme a quantidade de venda.
            $comando_sql = 'update tb_produto set estoque = estoque - ? where id_produto = ? ';
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $qtdVenda);
            $sql->bindValue(2, $idProduto);
            $sql->execute();
            
            //COMMIT TRASACTION

            $conexao->commit();
            return $idVenda;
        } catch (Exception $ex) {
            //ROLLBACK
            $conexao->rollBack();
            
            return -1;
        }
    }


    public function AbrirCaixa($valorCaixa)
    {

        if ($valorCaixa == ''){
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'insert into tb_caixa (valor_caixa, data_caixa) values (?,?)';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $valorCaixa);
        $sql->bindValue(2, UtilDAO::DataAtual());
        
        try {
            
            $sql->execute();
                     

            return 1;
        } catch (Exception $ex) {
         
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

    
    # Inicia a Transação
    $conexao->beginTransaction();

    $comando_sql = 'select id_venda, id_produto
                        from tb_item_venda
                           where id_venda = ? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idVenda);
    $sql->execute();
    $itemExiste =  $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($itemExiste[0]['id_produto']==$itemVenda) {
        
        $comando_sql = 'update tb_item_venda set qtd_produto = qtd_produto + ?, item_valor = item_valor + ?  where id_produto = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $qtdVenda);
        $sql->bindValue(2, $valor);
        $sql->bindValue(3, $itemVenda);
        try {
            $sql->execute();
    
    
                #retira o item do produto conforme a quantidade de venda.
                $comando_sql = 'update tb_produto set estoque = estoque - ? where id_produto = ? ';
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1, $qtdVenda);
                $sql->bindValue(2, $itemVenda);
                $sql->execute();
    
            $conexao->commit();
            return $idVenda;
        } catch (Exception $ex) {
          
            $conexao->rollBack();
            return -1;
        }





    }else{

        $comando_sql = 'insert into tb_item_venda (id_venda, id_produto, qtd_produto, item_valor) values (?,?,?,?)';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idVenda);
        $sql->bindValue(2, $itemVenda);
        $sql->bindValue(3, $qtdVenda);
        $sql->bindValue(4, $valor);
    
        try {
            $sql->execute();
    
    
                #retira o item do produto conforme a quantidade de venda.
                $comando_sql = 'update tb_produto set estoque = estoque - ? where id_produto = ? ';
                $sql = $conexao->prepare($comando_sql);
                $sql->bindValue(1, $qtdVenda);
                $sql->bindValue(2, $itemVenda);
                $sql->execute();
    
            $conexao->commit();
            return $idVenda;
        } catch (Exception $ex) {
          
            $conexao->rollBack();
            return -1;
        }
    
    
    }


    
    
    


   }

   public function DetalhesVenda($idvenda){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select id_venda, data_venda, tb_venda.id_cliente as id_cliente, nome_cliente, rua_cliente, bairro_cliente
                        from tb_venda 
                            inner join tb_cliente on
                                tb_venda.id_cliente = tb_cliente.id_cliente
                                        where id_venda = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idvenda);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);


   }
   public function ValorTotVenda($idvenda){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select Sum(item_valor) as valorTotal
                        from tb_item_venda 
                            inner join tb_venda on
                                tb_item_venda.id_venda = tb_venda.id_venda
                                where tb_item_venda.id_venda = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idvenda);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);


   }
   public function ConsultarVenda(){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select distinct tb_venda.id_venda as codVenda, data_venda, nome_cliente, nome_produto, item_valor
                                from tb_venda 
                                    inner join tb_cliente on
                                        tb_venda.id_cliente = tb_cliente.id_cliente
                                    inner join tb_item_venda on
                                        tb_venda.id_venda = tb_item_venda.id_venda
                                    inner join tb_produto on 
                                        tb_item_venda.id_produto = tb_produto.id_produto 
                                                limit 5        ';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);


   }
                                //68     //62
   public function RetiraItem($idItem, $idVenda){
    if ($idItem==''|| $idVenda== '' ) {
        return 0;
    }
    $conexao = parent::retornaConexao();
    # Inicia a transação
    $conexao->beginTransaction();
    
    $comando_sql = 'select id_produto, qtd_produto from tb_item_venda where id_item_venda = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$idItem);
        $sql->execute();

        $idProdExcluir = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    $comando_sql = 'delete from tb_item_venda where id_item_venda = ? and id_venda =?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idItem);//id do item de venda
    $sql->bindValue(2, $idVenda); // id da venda na tb item venda
    
    $sql->execute();
    
    try {


        



        #retira o item do produto conforme a quantidade de venda.
            $comando_sql = 'update tb_produto set estoque = estoque + ? where id_produto = ?';
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $idProdExcluir[0]['qtd_produto']);
            $sql->bindValue(2, $idProdExcluir[0]['id_produto']);
            $sql->execute();
            $conexao->commit();
        return $idVenda;
    } catch (Exception $ex) {
      
        $conexao->rollBack();
        return -1;
    }
    

   }


   public function ResultadoVenda($idVenda){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select  tb_venda.id_venda as id_venda, data_venda, nome_cliente, Cpf_cliente, nome_produto, item_valor, cod_produto, qtd_produto
                                from tb_venda 
                                    inner join tb_cliente on
                                        tb_venda.id_cliente = tb_cliente.id_cliente
                                    inner join tb_item_venda on
                                        tb_venda.id_venda = tb_item_venda.id_venda
                                    inner join tb_produto on 
                                        tb_item_venda.id_produto = tb_produto.id_produto 
                                               where tb_venda.id_venda = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idVenda);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

   
}

public function ResultadoVendaGeral(){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select  tb_venda.id_venda as id_venda, data_venda, nome_cliente, Cpf_cliente, nome_produto, item_valor, cod_produto, qtd_produto
                                from tb_venda 
                                    inner join tb_cliente on
                                        tb_venda.id_cliente = tb_cliente.id_cliente
                                    inner join tb_item_venda on
                                        tb_venda.id_venda = tb_item_venda.id_venda
                                    inner join tb_produto on 
                                        tb_item_venda.id_produto = tb_produto.id_produto';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);



}

public function ResultadoVendaDt($dtInicial, $dtFinal, $cliente){

    $conexao = parent::retornaConexao();
    


    
        $comando_sql = 'Select  tb_venda.id_venda as id_venda, data_venda, nome_cliente, Cpf_cliente, nome_produto, item_valor, cod_produto, qtd_produto
        from tb_venda 
            inner join tb_cliente on
                tb_venda.id_cliente = tb_cliente.id_cliente
            inner join tb_item_venda on
                tb_venda.id_venda = tb_item_venda.id_venda
            inner join tb_produto on 
                tb_item_venda.id_produto = tb_produto.id_produto 
                ';

  


    if ($dtInicial!='' || $dtFinal!= '') {
        
        $comando_sql = $comando_sql . ' where data_venda between ? and ?';
    }
    
   
   if ($cliente >0 && $dtInicial=='' && $dtFinal=='') {
       
    $comando_sql = $comando_sql . ' where tb_venda.id_cliente = ?';
   }
   
   if ($cliente>0 && $dtInicial!='' && $dtFinal!='' ) {
    $comando_sql = $comando_sql . ' and tb_venda.id_cliente = ?';
   }
   
   $comando_sql = $comando_sql . ' Order by id_venda';
   
   $sql = $conexao->prepare($comando_sql);
   
   if ($dtInicial!='' && $dtFinal!='') {
       
       $sql->bindValue(1, $dtInicial);
       $sql->bindValue(2, $dtFinal);
       
   }
   
   
    if ($cliente >0 && $dtInicial=='' && $dtFinal=='' ) {
        $sql->bindValue(1, $cliente);
    }

    if ($cliente >0 && $dtInicial!='' && $dtFinal!='' ) {
        $sql->bindValue(3, $cliente);
    }


    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function ResultadoVendaDia(){

    $conexao = parent::retornaConexao();
    
        $comando_sql = 'Select  tb_venda.id_venda as id_venda, data_venda, nome_cliente, Cpf_cliente, nome_produto, item_valor, cod_produto, qtd_produto
        from tb_venda 
            inner join tb_cliente on
                tb_venda.id_cliente = tb_cliente.id_cliente
            inner join tb_item_venda on
                tb_venda.id_venda = tb_item_venda.id_venda
            inner join tb_produto on 
                tb_item_venda.id_produto = tb_produto.id_produto 
                    Where data_venda = ?
                        Order by id_venda';
 
   $sql = $conexao->prepare($comando_sql);
   $sql->bindValue(1, Date('Y-m-d'));
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function ResultadoVendaCliente($idCliente){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select  tb_venda.id_venda as id_venda, tb_venda.id_cliente as id_cliente, data_venda, nome_cliente, Cpf_cliente, nome_produto, item_valor, cod_produto, qtd_produto
                            from tb_venda 
                                inner join tb_cliente on
                                    tb_venda.id_cliente = tb_cliente.id_cliente
                                inner join tb_item_venda on
                                    tb_venda.id_venda = tb_item_venda.id_venda
                                inner join tb_produto on 
                                    tb_item_venda.id_produto = tb_produto.id_produto
                                    where tb_venda.id_cliente = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idCliente);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

}

}