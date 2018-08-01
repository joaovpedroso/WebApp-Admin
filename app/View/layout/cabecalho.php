<?php
use App\Helpers\Util;
use App\Helpers\Config;

    //Verificar se esta sendo informad novo titulo para a página
    if( isset( $this->tituloPagina ) ) {
        $tituloPagina = "WebApp | ".$this->tituloPagina;
    }else {
        $tituloPagina = "WebApp |";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?= $tituloPagina ;?></title>
        
        <link href="<?php echo Config::$PATH_ASSETS ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Config::$PATH_ASSETS ?>/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Config::$PATH_ASSETS ?>/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo Config::$PATH_ASSETS ?>/css/apprise.min.css" rel="stylesheet">
        <link href="<?php echo Config::$PATH_ASSETS ?>/css/style.css" rel="stylesheet">
        
        <script src="<?php echo Config::$PATH_ASSETS ?>/bootstrap/js/jquery.min.js"></script>
        <script src="<?php echo Config::$PATH_ASSETS ?>/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo Config::$PATH_ASSETS ?>/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo Config::$PATH_ASSETS ?>/js/jquery.maskedinput.js"></script>
        <script src="<?php echo Config::$PATH_ASSETS ?>/js/apprise.min.js"></script>
        <script src="<?php echo Config::$PATH_ASSETS ?>/js/jqBootstrapValidation.js"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-static-top navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="/">Painel</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="usuarios/adicionar"><i class="glyphicon glyphicon-floppy-saved"></i> - Cadastrar</a></li>
                                <li><a href="/usuarios"><i class="glyphicon glyphicon-search"></i> - Listar</a></li>
                            </ul>
                        </li>

                        <li><a href="/enderecos">Tipos de Endereço</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <b><i class="glyphicon glyphicon-user"></i></b> Logado Como: <b><?=$_SESSION["usuario"]["nome"];?></b>           
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="#">E-Mail: <b><?=$_SESSION["usuario"]["email"];?></b></a></li>
                              <li><a href="#">Data de Nascimento <b><?=$_SESSION["usuario"]["nascimento"];?></b></a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="/logout">
                                <i class="glyphicon glyphicon-off" style="color: darkred"></i>  Sair
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="mascara">
            <img src="<?php echo Config::$PATH_ASSETS ?>/img/load.gif" width="100em">
        </div>