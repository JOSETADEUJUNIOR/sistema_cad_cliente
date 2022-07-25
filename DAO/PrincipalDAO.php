<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class PrincipalDAO extends Conexao
{


    public function GetCargos()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = ("Select Count(*) as total from tb_cargo");

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret;
    }

    public function GetProduto()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = ("Select 
                        count(id_produto) as id_produto from tb_produto");

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret;
    }
    public function GetFornecedor()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = ("Select 
                        count(id_fornecedor) as id_fornecedor from tb_fornecedor");

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret;
    }

    public function GetEmpresa()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = ("Select 
                        count(id_empresa) as id_empresa, nome_empresa, cnpj_empresa, descricao_empresa, data_abertura                    
                    from tb_empresa");

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret;
    }
    public function GetClientes()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = ("Select Count(*) as total from tb_cliente");

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret;
    }
    public function GetFuncionario()
    {

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

    public function GetMovimento()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = 'SELECT sum(valor_movimento) as Total, data_movimento
                              FROM cad_cliente.tb_movimento WHERE tipo_movimento = 1';

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetMovimentoDebito()
    {

        $conexao = parent::retornaConexao();

        $comando_sql = 'SELECT sum(valor_movimento) as Total, data_movimento
                              FROM cad_cliente.tb_movimento WHERE tipo_movimento = 2';

        $sql = $conexao->prepare($comando_sql);

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
