<?php 
$this->tituloPagina = "Login";
use App\Helpers\Config;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?= "WebApp | ".$this->tituloPagina ;?></title>
        
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
    
    <div class="container text-center well">

        <form class="form-inline" action="/login" method="POST">

            <legend>Login</legend>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="exemplo@exemplo.com" name="email" required
                    data-validation-required-message="Preencha o Email" 
                    data-validation-email-message="Informe um Email válido" >
            </div>

            <div class="form-group">
                <label for="pwd">Senha:</label>
                <input type="password" class="form-control" name="senha" required
                    data-validation-required-message="Informe a senha" >
            </div>

           <button class="btn btn-primary">Entrar</button>
        </form>

    </div>
<?php $this->layout('layout.rodape'); ?>