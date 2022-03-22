<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao{

    public function CadastrarCategoria($nome_categoria){

        if (trim($nome_categoria)== '') {
            
            return 0;
        }

        //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

        //Passo 2 = Comando SQL

        $comando_sql = ('Insert into tb_categoria (nome_categoria, id_usuario) values (?,?)');

        // Passo 3 = sql recebe conexão preparando a conexçaão

        $sql = $conexao->prepare($comando_sql);

        // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações

        $sql->bindValue(1,$nome_categoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        // passo 5 Tentar executar

        try {
            $sql->execute();
            return 1;

        } catch (Exception $ex) {
            return -1;
        }


    }


    public function EditarCategoria($nome){

        if (trim($nome) == '') {
            return 0;
        }
    }

    public function AbnerFeio(){

        return 1;
    }



}

?>