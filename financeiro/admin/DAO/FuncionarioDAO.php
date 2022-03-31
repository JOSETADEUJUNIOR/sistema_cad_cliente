<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class FuncionarioDAO extends Conexao{

    public function CadastrarFuncionario($nomeFuncionario, $dataAdmissao, $loginFuncionario, $senhaFuncionario, $cargo){

        if (trim($nomeFuncionario) == "" || trim($loginFuncionario) == "" || trim($senhaFuncionario) == "" ||
            trim($dataAdmissao) == "" || trim($cargo) == "") {
        
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = ('Insert into tb_funcionario (nome_funcionario, data_admissao,
                         funcionario_login, funcionario_senha, id_empresa, 
                         id_cargo) values (?,?,?,?,?,?)');

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1,$nomeFuncionario);
        $sql->bindValue(2,$dataAdmissao);
        $sql->bindValue(3,$loginFuncionario);
        $sql->bindValue(4,$senhaFuncionario);
        $sql->bindValue(5,UtilDAO::CodigoEmpresa());
        $sql->bindValue(6,$cargo);

        try {
            $sql->execute();
            return 1;

        } catch (Exception $ex) {
            echo $ex->getMessage();
            var_dump($sql);
            return -1;
        }

    }

    public function ConsultarFuncionario(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_funcionario, nome_funcionario, data_admissao, data_demissao, funcionario_login, funcionario_senha, 
                               tb_cargo.nome_cargo as nome_cargo
                                 from tb_funcionario
                                  inner join tb_cargo on
                                  tb_funcionario.id_cargo = tb_cargo.id_cargo where tb_funcionario.id_empresa = ?';
        $sql= $conexao->prepare($comando_sql);
        $sql->bindValue(1,UtilDAO::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function MeusDados(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_funcionario, nome_funcionario, funcionario_login, funcionario_senha from tb_funcionario where id_funcionario = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function DetalhaDados($id_func){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_funcionario, nome_funcionario, funcionario_login, funcionario_senha from tb_funcionario where id_funcionario = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_func);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function AlterarDados($id_func, $nome, $login, $senha){

        if ($id_func =='' || $nome=='' || $login=='' || $senha=='') {
           
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_funcionario set nome_funcionario = ?, funcionario_login = ?, funcionario_senha = ?
                                    where id_funcionario = ?';

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $login);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, $id_func);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }

    }
    public function DetalharFuncionario($id_func){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_funcionario, nome_funcionario, data_admissao, data_demissao, funcionario_login,
                                 funcionario_senha, tb_cargo.nome_cargo, tb_funcionario.id_cargo as id_cargo
                            from tb_funcionario
                               inner join tb_cargo on
                                 tb_funcionario.id_cargo = tb_cargo.id_cargo
                                    where id_funcionario = ? and tb_funcionario.id_empresa = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_func);
        $sql->bindValue(2, UtilDAO::CodigoEmpresa());
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarFuncionario($nomeFuncionario, $dataAdmissao, $loginFuncionario, $senhaFuncionario, $cargo, $cod){

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_funcionario set nome_funcionario = ?, data_admissao = ?, funcionario_login = ?, funcionario_senha = ?, id_cargo = ? 
                             where id_empresa = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nomeFuncionario);
        $sql->bindValue(2, $dataAdmissao);
        $sql->bindValue(3, $loginFuncionario);
        $sql->bindValue(4, $senhaFuncionario);
        $sql->bindValue(5, $cargo);
        $sql->bindValue(6, UtilDAO::CodigoEmpresa());
        $sql->bindValue(7, $cod);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }

    }

    public function ExcluirFuncionario($id_func){

        if ($id_func == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'Delete from tb_funcionario where id_funcionario = ? and id_empresa = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_func);
        $sql->bindValue(2, UtilDAO::CodigoEmpresa());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
           
            return -2;
        }



    }
    

}

