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

        $comando_sql = ('Insert into tb_categoria (nome_categoria, id_funcionario) values (?,?)');

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
            echo $ex->getMessage();
            return -1;
        }


    }

    public function DetalharCategoria($id_cat){

        if ($id_cat =='') {
            
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_categoria = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_cat);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function EditarCategoria($nome_cat, $id_cat){

        if (trim($nome_cat) == '') {
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_categoria set nome_categoria = ? where id_categoria = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome_cat);
        $sql->bindValue(2, $id_cat);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }


    }

   public function ConsultarCategoria(){

    $conexao = parent::retornaConexao();
    $comando_sql = 'Select nome_categoria, id_categoria from tb_categoria';
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
   }

   public function ExcluirCategoria($idCat){

    if ($idCat=='') {
        return 0;
    }

    $conexao = parent::retornaConexao();
    $comando_sql = 'delete from tb_categoria where id_categoria =? ';
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idCat);
    
    try {
        $sql->execute();
        return 1;
    } catch (Exception $ex) {
        return -2;
    }
    
   


   }


}

?>