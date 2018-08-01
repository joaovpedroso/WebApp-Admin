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
        
        <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
    </head>
    
    <body class="text-center">
        <div class="container text-center well">

            <form class="form-signin" action="/login" method="POST">

                <h1 class="h3 mb-3 font-weight-normal">Login</h1>

                    <div class="form-label-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Informe o Email" required autofocus>
                        <label for="email">Email</label>
                    </div>

                <div class="form-label-group">
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                    <label for="senha">Senha</label>
                </div>

               <button class="btn btn-primary">Entrar</button>
            </form>

            
        </div>
    </body>