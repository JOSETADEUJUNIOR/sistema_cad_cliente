<?php

require_once '../DAO/UsuarioDAO.php';
if (isset($_GET['close']) && $_GET['close'] == 1) 
{
    UtilDAO::Deslogar();
    
}
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img style="width: 500px; height:120px;" src="assets/img/rondon.jpeg" class="user-image img-responsive" />
            </li>


            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Painel Administrativo</a>
            </li>
            <li>
                <a href="meus_dados.php"><i class="fa fa-user fa-2x"></i> Meus Dados</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-archive fa-2x"></i> Produto<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="consultar_categoria.php">Consultar Categorias</a>
                    </li>
                    <li>
                        <a href="consultar_sub_categoria.php">Consultar Sub Categoria</a>
                    </li>
                    <li>
                        <a href="consultar_produto.php">Consultar Produto</a>
                    </li>
                    <li>
                        <a href="novo_estoque.php">Ajustar Estoque</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-list fa-2x"></i> Clientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_cliente.php">Cadastrar Clientes</a>
                    </li>
                    <li>
                        <a href="consultar_cliente.php">Consultar Clientes</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-group fa-2x"></i> Fornecedor<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_fornecedor.php">Cadastrar Fornecedor</a>
                    </li>
                    <li>
                        <a href="consultar_fornecedor.php">Consultar Fornecedor</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-group fa-2x"></i> Vendas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="pdv2.php">Realizar Venda</a>
                    </li>
                    <li>
                        <a href="consultar_vendas.php">Consultar Vendas</a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="_menu.php?close=1"><i class="fa fa-sign-out fa-2x"></i>Sair</a>
            </li>
        </ul>
        
    </div>

</nav>