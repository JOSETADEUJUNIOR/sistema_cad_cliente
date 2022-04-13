<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class  MovimentoDAO extends Conexao{

    public function CadastrarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta){


        if (trim($tipo)=='' || trim($data)=='' || trim($valor)=='' ||
            trim($categoria)=='' || trim($empresa)=='' || trim($conta)==''){
          
                return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'insert into tb_movimento (tipo_movimento, data_movimento, valor_movimento, observacao_movimento,
                                                    id_empresa, id_conta, id_categoria, id_usuario) values (?,?,?,?,?,?,?,?)';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $obs);
        $sql->bindValue(5, $empresa);
        $sql->bindValue(6, $conta);
        $sql->bindValue(7, $categoria);
        $sql->bindValue(8, UtilDAO::CodigoLogado());

        $conexao->beginTransaction();

        try {

            $sql->execute();

            if ($tipo == 1) {
            
                $comando_sql = 'update tb_conta set saldo_conta = saldo_conta + ? where id_conta = ? and id_usuario = ?';
            }else if ($tipo == 2) {
                $comando_sql = 'update tb_conta set saldo_conta = saldo_conta - ? where id_conta = ? and id_usuario = ?';
            }
            
            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $valor);
            $sql->bindValue(2, $conta);
            $sql->bindValue(3, UtilDAO::CodigoLogado());
            
            $sql->execute();
            $conexao->commit();
            return 1;

        } catch (Exception $ex) {
            
            $conexao->rollBack();
            return -1;
            
        }
        

    }

/*     public function ConsultarMovimento($dtInicial, $dtFinal, $tipo){

        if (trim($dtInicial)== '' || trim($dtFinal)== '') {
            
            return 0;
        }
        
        
        $conexao = parent::retornaConexao();
        if ($tipo == 1) {
            $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa,
                            banco_conta, tipo_movimento, observacao_movimento
                            from tb_movimento
                            inner join tb_categoria on
                                tb_movimento.id_categoria = tb_categoria.id_categoria
                            inner join tb_empresa on
                                tb_movimento.id_empresa = tb_empresa.id_empresa
                            inner join tb_conta on
                                tb_movimento.id_conta = tb_conta.id_conta
                            inner join tb_usuario on
                                tb_movimento.id_usuario = tb_usuario.id_usuario
                                where data_movimento between ? and ? and tb_usuario.id_usuario = ? and tipo_movimento = ?';
                                $sql =  $conexao->prepare($comando_sql);
                                $sql->bindValue(1,$dtInicial);
                                $sql->bindValue(2,$dtFinal);
                                $sql->bindValue(3,UtilDAO::CodigoLogado());
                                $sql->bindValue(4,$tipo);
           
        }else if ($tipo == 2) {
           
            $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa,
            banco_conta, tipo_movimento, observacao_movimento
            from tb_movimento
            inner join tb_categoria on
                tb_movimento.id_categoria = tb_categoria.id_categoria
            inner join tb_empresa on
                tb_movimento.id_empresa = tb_empresa.id_empresa
            inner join tb_conta on
                tb_movimento.id_conta = tb_conta.id_conta
            inner join tb_usuario on
                tb_movimento.id_usuario = tb_usuario.id_usuario
                where data_movimento between ? and ? and tb_usuario.id_usuario = ? and tipo_movimento = ?';
                $sql =  $conexao->prepare($comando_sql);
                $sql->bindValue(1,$dtInicial);
                $sql->bindValue(2,$dtFinal);
                $sql->bindValue(3,UtilDAO::CodigoLogado());
                $sql->bindValue(4,$tipo);
           
        }else if ($tipo == 3){
          
            $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa,
            banco_conta, tipo_movimento, observacao_movimento
            from tb_movimento
            inner join tb_categoria on
                tb_movimento.id_categoria = tb_categoria.id_categoria
            inner join tb_empresa on
                tb_movimento.id_empresa = tb_empresa.id_empresa
            inner join tb_conta on
                tb_movimento.id_conta = tb_conta.id_conta
            inner join tb_usuario on
                tb_movimento.id_usuario = tb_usuario.id_usuario
                where data_movimento between ? and ? and tb_usuario.id_usuario = ? ';
             
                $sql =  $conexao->prepare($comando_sql);
                $sql->bindValue(1,$dtInicial);
                $sql->bindValue(2,$dtFinal);
                $sql->bindValue(3,UtilDAO::CodigoLogado());
                
          
          
           
        }
        
       
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }
 */

public function ConsultarMovimento($dtInicial, $dtFinal, $tipo){

    if (trim($dtInicial)== '' || trim($dtFinal)== '') {
        
        return 0;
    }

    $conexao = parent::retornaConexao();

    $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa,
    banco_conta, agencia_conta,numero_conta, tipo_movimento, observacao_movimento
    from tb_movimento
    inner join tb_categoria on
        tb_movimento.id_categoria = tb_categoria.id_categoria
    inner join tb_empresa on
        tb_movimento.id_empresa = tb_empresa.id_empresa
    inner join tb_conta on
        tb_movimento.id_conta = tb_conta.id_conta
    inner join tb_usuario on
        tb_movimento.id_usuario = tb_usuario.id_usuario
        where data_movimento between ? and ? and tb_usuario.id_usuario = ? ';


        if ($tipo != 3) {
            
            $comando_sql = $comando_sql . ' and tipo_movimento = ?';

        }

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $dtInicial);
        $sql->bindValue(2, $dtFinal);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        if ($tipo != 3) {
            $sql->bindValue(4, $tipo);
        }

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);

}

public function DetalharMovimento($idMov){

    $conexao = parent::retornaConexao();
    $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_empresa,
    banco_conta, tipo_movimento, observacao_movimento, tb_movimento.id_conta as id_conta
    from tb_movimento
    inner join tb_categoria on
        tb_movimento.id_categoria = tb_categoria.id_categoria
    inner join tb_empresa on
        tb_movimento.id_empresa = tb_empresa.id_empresa
    inner join tb_conta on
        tb_movimento.id_conta = tb_conta.id_conta
    inner join tb_usuario on
        tb_movimento.id_usuario = tb_usuario.id_usuario
        where id_movimento = ? and tb_movimento.id_usuario = ? ';

    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idMov);
    $sql->bindValue(2, UtilDAO::CodigoLogado());

    $sql->execute();
     return $sql->fetchAll(PDO::FETCH_ASSOC);


}

public function ExcluirMovimento($idMov){

    if ($idMov== '') {
        return 0;
    }

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select valor_movimento, tipo_movimento, id_conta from tb_movimento where id_movimento = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idMov);
    $sql->execute();


    //traz a consulta do banco que será realizado a exclusão
    $movimento = $sql->fetchAll(PDO::FETCH_ASSOC);

    $conexao->beginTransaction();

    try {
        
        $comando_sql = 'delete from tb_movimento where id_movimento = ? and id_usuario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idMov);
        $sql->bindValue(2, UtilDAO::CodigoLogado());
        $sql->execute();

        if ($movimento[0]['tipo_movimento']==1) {
        
            $comando_sql = 'update tb_conta set saldo_conta = saldo_conta - ? where id_conta = ?';
        }else {
            $comando_sql = 'update tb_conta set saldo_conta = saldo_conta + ? where id_conta = ?';
        }

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $movimento[0]['valor_movimento']);
        $sql->bindValue(2, $movimento[0]['id_conta']);

        $sql->execute();

        $conexao->commit();

        return 1;

    } catch (Exception $ex) {
        
        $conexao->rollBack();
        return -1;
    }

}


}

?>