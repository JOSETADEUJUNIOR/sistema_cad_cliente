<?php

require_once './DAO/UsuarioDAO.php';
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
                <a href="#"><i class="fa fa-users fa-2x"></i> Funcionários<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_funcionario.php">Cadastrar Funcionário</a>
                    </li>
                    <li>
                        <a href="consultar_funcionario.php">Consultar Funcionário</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-briefcase fa-2x"></i> Cargo<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="novo_cargo.php">Cadastrar Cargo</a>
                    </li>
                    <li>
                        <a href="consultar_cargo.php">Consultar Cargo</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="_menu.php?close=1"><i class="fa fa-sign-out fa-2x"></i>Sair</a>
            </li>
        </ul>
        
    </div>

</nav>