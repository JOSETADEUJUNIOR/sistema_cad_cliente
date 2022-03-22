<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CargoDAO extends Conexao{

public function CadastrarCargo($nomeCargo, $cargoDescricao){

    if (trim($nomeCargo)=='' || trim($cargoDescricao)=='') {
        
        return 0;
    }

    //Passo 1 = Variavel de conexão.
  
    $conexao = parent::retornaConexao();
    //Passo 2 = Comando SQL
    $comando_sql = ('Insert into tb_cargo (nome_cargo, descricao_cargo, id_empresa) values (?,?,?)');
    // Passo 3 = sql recebe conexão preparando a conexçaão
    $sql = $conexao->prepare($comando_sql);

    // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações

    $sql->bindValue(1, $nomeCargo);
    $sql->bindValue(2, $cargoDescricao);
    $sql->bindValue(3, UtilDAO::CodigoEmpresa());
    // passo 5 Tentar executar
    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -1;
    }


}

public function ConsultarCargo(){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select id_cargo, nome_cargo, descricao_cargo from tb_cargo where id_empresa = ? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, UtilDAO::CodigoEmpresa());
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function DetalharCargo($id_cargo){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select id_cargo, nome_cargo, descricao_cargo from tb_cargo where id_cargo = ? and id_empresa = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $id_cargo);
    $sql->bindValue(2, UtilDAO::CodigoEmpresa());
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
    
}

public function AlterarCargo($nome_cargo, $cargo_descricao, $cod){

    $conexao = parent::retornaConexao();
    $comando_sql = 'update tb_cargo set nome_cargo = ?, descricao_cargo = ? where id_cargo = ? and id_empresa = ? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $nome_cargo);
    $sql->bindValue(2, $cargo_descricao);
    $sql->bindValue(3, $cod);
    $sql->bindValue(4, UtilDAO::CodigoEmpresa());

    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        echo $ex->getMessage();
        return -1;
    }
}

public function ExcluirCargo($idCargo){

    if ($idCargo =='') {
        
        return 0;
    }

    $conexao = parent::retornaConexao();
    $comando_sql = 'delete from tb_cargo where id_cargo = ? and id_empresa = ?';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idCargo);
    $sql->bindValue(2, UtilDAO::CodigoEmpresa());

    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -2;
    }



}




}