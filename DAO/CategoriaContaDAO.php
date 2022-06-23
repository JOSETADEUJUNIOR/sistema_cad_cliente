<?php
@session_start();
require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaContaDAO extends Conexao{

    public function CadastrarCategoria($nome_categoria){

        if (trim($nome_categoria)== '') {
            
            return 0;
        }

           
        //Passo 1 = Variavel de conexão.
        $conexao = parent::retornaConexao();

        //Passo 2 = Comando SQL

        $comando_sql = ('Insert into tb_categoria_conta (nome_categoria, id_funcionario) values (?,?)');

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


    public function ConsultarCategoria(){#método para consultar no banco todas as categorias e mostrar 
                                        #na tela os registro

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select nome_categoria, id_cat_conta from tb_categoria_conta where id_funcionario = ? ';

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function DetalharCategoria($id_cat){

        $conexao = parent::retornaConexao();
        $comando_sql = 'Select nome_categoria, id_cat_conta from tb_categoria_conta where id_cat_conta = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id_cat);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function AlterarCategoria($nome, $cod){

        if (trim($nome) == '') {
            return 0;
        }
    

        $conexao = parent::retornaConexao();
        $comando_sql = 'update tb_categoria_conta set nome_categoria = ? where id_cat_conta = ? and id_funcionario = ?';

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $cod);
        $sql->bindValue(3, UtilDAO::CodigoLogado());
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
           
            return -1;
        }
     
    }

    public function ExcluirCartegoria($idCategoria){

        if ($idCategoria =='') {
            
            return 0;
        }

        $conexao = parent::retornaConexao();
        $comando_sql = 'delete from tb_categoria_conta where id_cat_conta = ? and id_funcionario = ?';
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -2;
        }



    }


}

?>