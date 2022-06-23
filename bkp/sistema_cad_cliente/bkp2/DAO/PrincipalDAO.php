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



}