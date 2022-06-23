<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao{



    public function ValidarEmailCadastro($email)
    {
        if (trim($email)=='') {
            
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'select email_empresa from tb_empresa where email_usuario = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->execute();

        $emp_email = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($emp_email) > 0) {
            return true;

        }else {
            return false;
        }


    }

    public function ValidarEmailAlterar($email)
    {
        if (trim($email) == '') {
            return 0;

        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'select email_empresa from tb_empresa where email_empresa = ? and id_empresa != ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, UtilDAO::CodigoEmpresa());
        $sql->execute();

        $emp_email = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($emp_email) > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function ValidarLogin($email, $senha)
    {
        if (trim($senha) == '' || trim($email) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_empresa, nome_empresa 
                        from tb_empresa where email_empresa = ? and senha_empresa = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->execute();

        $emp = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($emp) == 0) {
            return -5;
        } else {

            $id = $emp[0]['id_empresa'];
            $nome = $emp[0]['nome_empresa'];

            //Inicio da sessão
            UtilDAO::CriarSessao($nome, $id);


            header('location: index.php');
            exit;
        }

    }
    public function ValidarLoginUsuario($email, $senha)
    {
        if (trim($senha) == '' || trim($email) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_funcionario, nome_funcionario 
                        from tb_funcionario where funcionario_email = ? and funcionario_senha = ? ';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);
        $sql->execute();

        $func = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($func) == 0) {
            return -5;
        } else {

            $id = $func[0]['id_funcionario'];
            $nome = $func[0]['nome_funcionario'];

            //Inicio da sessão
            UtilDAO::CriarSessao($nome, $id);


            header('location: index.php');
            exit;
        }

    }


   

    



}