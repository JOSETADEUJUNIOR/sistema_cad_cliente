<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class  MovimentoDAO extends Conexao{


    public function ConsultarMovimento($dtInicial, $dtFinal){

        if (trim($dtInicial)== '' || trim($dtFinal)== '') {
            
            return 0;
        }
        
        
        $conexao = parent::retornaConexao();
            $comando_sql = 'select data_venda, tb_item_venda.id_produto, nome_produto, qtd_produto, item_valor, tb_item_venda.id_venda
                                    from tb_venda
                                        left join tb_item_venda on
                                            tb_venda.id_venda = tb_item_venda.id_venda
                                        inner join tb_produto on
                                            tb_item_venda.id_produto = tb_produto.id_produto
                                            where data_venda between ? and ?';
                                                        $sql =  $conexao->prepare($comando_sql);
                                $sql->bindValue(1,$dtInicial);
                                $sql->bindValue(2,$dtFinal);
                                
                                 $sql->execute();
                         
                                 return $sql->fetchAll(PDO::FETCH_ASSOC);
          
           
        }
        

    }



?>