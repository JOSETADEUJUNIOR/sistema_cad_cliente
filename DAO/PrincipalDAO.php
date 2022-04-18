<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class PrincipalDAO extends Conexao{


public function GetCargos(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select Count(*) as total from tb_cargo");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}

public function GetProduto(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select 
                        count(id_produto) as id_produto from tb_produto");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}
public function GetFornecedor(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select 
                        count(id_fornecedor) as id_fornecedor from tb_fornecedor");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}

public function GetEmpresa(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select 
                        count(id_empresa) as id_empresa, nome_empresa, cnpj_empresa, descricao_empresa, data_abertura                    
                    from tb_empresa");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}
public function GetClientes(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select Count(*) as total from tb_cliente");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}
public function GetFuncionario(){

    $conexao = parent::retornaConexao();

    $comando_sql = ("Select Count(*) as total from tb_funcionario");

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();

    $ret = $sql->fetchAll();

    return $ret;

}
public function GetVendaDia()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = 'Select format(Sum(item_valor),2,\'de_DE\') as item_valor
        from tb_item_venda 
            inner join tb_venda on
                tb_item_venda.id_venda = tb_venda.id_venda
                    Where data_venda = ?
                        ';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, Date('Y-m-d'));
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function GetMovimento(){

    $conexao = parent::retornaConexao();

    $comando_sql = 'select id_movimento, data_movimento, valor_movimento, nome_categoria, nome_fornecedor,
    banco_conta, agencia_conta,numero_conta, tipo_movimento, observacao_movimento
    from tb_movimento
    inner join tb_categoria_conta on
        tb_movimento.id_cat_conta = tb_categoria_conta.id_cat_conta
    inner join tb_fornecedor on
        tb_movimento.id_fornecedor = tb_fornecedor.id_fornecedor
    inner join tb_conta on
        tb_movimento.id_conta = tb_conta.id_conta
    inner join tb_funcionario on
        tb_movimento.id_funcionario = tb_funcionario.id_funcionario
        where tipo_movimento = 2';

    $sql = $conexao->prepare($comando_sql);

    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);

}








}