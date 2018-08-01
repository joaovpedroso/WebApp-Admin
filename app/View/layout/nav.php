<?php use App\Helpers\Util;?>
<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <span class="logo-mini"><b>A</b>DM</span>
        <span class="logo-lg"><b>Painel</b>ADM</span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
              <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo Util::asset('assets/dist/img/avatar04.png');?>" class="user-image" alt="Foto do Perfil" title="Foto do Perfil">
                        <span class="hidden-xs"><?= $_SESSION["usuario"]["nome"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo Util::asset('assets/dist/img/avatar04.png');?>" class="img-circle" alt="Foto do Perfil" title="Foto do Perfil">

                            <p>
                                <?= $_SESSION["usuario"]["nome"]; ?>
                                <small>Email: <?= $_SESSION["usuario"]["email"]; ?></small>
                            </p>
                        </li>

                        <li class="user-body">
                          <div class="row">
                              <div class="col-xs-6 text-center">
                                  <a href="#">Nascimento</a>
                                  <?= $_SESSION["usuario"]["nascimento"]; ?>
                              </div>
                              <div class="col-xs-6 text-center">
                                  <a href="#">Data de Cadastro</a>
                                  <?= $_SESSION["usuario"]["cadastro"]; ?>
                              </div>
                          </div>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/usuarios/editar/ <?= $_SESSION["usuario"]["id"]; ?>" class="btn btn-default btn-flat">Dados</a>
                            </div>
                            <div class="pull-right">
                                <a href="/logout" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- MENU LATERAL -->
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Util::asset('assets/dist/img/avatar04.png');?>" class="img-circle" alt="Foto do Usuário" title="Foto do Usuário">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION["usuario"]["nome"]; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu de Navegação</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle"></i>
                    <span>Usuários</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/usuarios/adicionar"><i class="fa fa-save"></i> Cadastrar</a></li>
                    <li><a href="/usuarios"><i class="fa fa-list-alt"></i> Listar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-marker"></i>
                    <span>Tipos de Endereço</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/enderecos/adicionar"><i class="fa fa-save"></i> Cadastrar</a></li>
                    <li><a href="/enderecos"><i class="fa fa-list-alt"></i> Listar</a></li>
                </ul>
            </li>
            <li><a href="/logout"><i class="fa fa-window-close"></i> <span>Sair</span></a></li>
        </ul>
    </section>
</aside>