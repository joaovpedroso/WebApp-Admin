<?php
require_once '../Bootstrap.php';

use Slim\App;
use App\Controllers\UsuarioController;
use App\Controllers\PessoaController;
use App\Controllers\HomeController;
use App\Controllers\TipoEnderecoController;
use App\Controllers\AuthController;
use App\Helpers\Session;
use App\Helpers\Call;

//Habilitar erros
//$app = new App;
$app = new App([
    'settings' =>[
        'displayErrorDetails' => true,
        'debug'=>true,
        'whoops.editor'=>'netbeans',
    ]
]);

$session = Session::getInstance();

//Rota Inicial
$app->get('/', HomeController::class.":index");

//Rota para cadastro listagem e edição de usuários
$app->get('/usuarios', UsuarioController::class.":index");
$app->get('/usuarios/adicionar', UsuarioController::class.":adicionar");
$app->post('/usuarios', PessoaController::class.":salvar");
$app->get('/usuarios/editar/{idcpf}', UsuarioController::class.":editar");
$app->get('/usuarios/deletar/{idcpf}', PessoaController::class.":deletar");

//Rota de Tipo de Endereço 
$app->get('/enderecos', TipoEnderecoController::class.":index");
$app->get('/enderecos/adicionar', TipoEnderecoController::class.":adicionar");
$app->post('/enderecos', TipoEnderecoController::class.":salvar");
$app->get('/enderecos/editar/{idtipoendereco}', TipoEnderecoController::class.":editar");
$app->get('/enderecos/deletar/{idtipoendereco}', TipoEnderecoController::class.":deletar");

//Rota para a classe Call que faz a chamada das funçoes em AJAX
$app->post('/call', Call::class . ":index");

//Rota de Login
$app->get('/login', AuthController::class .':index');
$app->post('/login', AuthController::class .':entrar');
$app->get('/logout', AuthController::class .':sair');

$app->run();