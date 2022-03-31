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
                <a data-toggle="modal" data-target="#Sair"><i class="fa fa-sign-out fa-2x"></i>Sair</a>
            </li>
        </ul>
        <div class="modal fade" id="Sair" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Excluir Cargo</h4>
                    </div>
                    <div class="modal-body">
                        <h4> Deseja Realmente <b>Sair ?</b>.<h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="login.php" name="btn_excluir" class="btn btn-primary">Sim</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>