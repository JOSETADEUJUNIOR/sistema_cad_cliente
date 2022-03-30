<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class SubCategoriaDAO extends Conexao{

    public function CadastrarSubCat($nome_sub_cat, $idCat){

        if (trim($nome_sub_cat)== '' || trim($idCat)=='')  {
            
            return 0;
        }

        //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

        //Passo 2 = Comando SQL

        $comando_sql = ('Insert into tb_sub_categoria (nome_subcategoria, id_categoria) values (?,?)');

        // Passo 3 = sql recebe conexão preparando a conexçaão

        $sql = $conexao->prepare($comando_sql);

        // Passo 4 = Verifica se no comando sql tem ?. Caso tiver, configura as informações

        $sql->bindValue(1,$nome_sub_cat);
        $sql->bindValue(2, $idCat);

        // passo 5 Tentar executar

        try {
            $sql->execute();
            return 1;

        } catch (Exception $ex) {
            return -1;
        }


    }


    public function ConsultarSubCategoria(){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select id_subCategoria, nome_subcategoria, nome_categoria, tb_sub_categoria.id_categoria as id_categoria
                                from tb_sub_categoria
                                    inner join tb_categoria on
                                      tb_sub_categoria.id_categoria = tb_categoria.id_categoria';
        $sql = $conexao->prepare($comando_sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalharSubCat($idSub){

        if ($idSub =='') {
            
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'select id_subCategoria, nome_subcategoria, tb_sub_categoria.id_categoria as subCatId,
                                 nome_categoria, tb_categoria.id_categoria as idCat
                            from tb_sub_categoria
                                inner join tb_categoria on
                                    tb_sub_categoria.id_categoria = tb_categoria.id_categoria
                                         where id_subCategoria = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idSub);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AlterarSubCat($nome_sub_cat, $cod, $idCat){

        if ($nome_sub_cat =='' || $cod=='' || $idCat=='') {
            
            return 0;
        }
        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_sub_categoria set nome_subcategoria = ?, id_categoria =? where id_subCategoria = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $nome_sub_cat);
        $sql->bindValue(2, $idCat);
        $sql->bindValue(3, $cod);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }

    }

    public function ExcluirSubCat($idSub){

            if ($idSub=='') {
                return 0;
            }
        
            $conexao = parent::retornaConexao();
            $comando_sql = 'delete from tb_sub_categoria where id_subCategoria =? ';
            $sql = $conexao->prepare($comando_sql);
            $sql->bindValue(1, $idSub);
            
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                return -2;
            }
         
    }

}

?>