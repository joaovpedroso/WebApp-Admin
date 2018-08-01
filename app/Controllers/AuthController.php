<?php
namespace App\Controllers;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Models\Usuario;
   
class AuthController extends Controller {
   
    public function index(ServerRequestInterface $request, ResponseInterface $response){
        return $this->view('auth/login', $response);
    } 
    
    public function entrar(ServerRequestInterface $request, ResponseInterface $response){
        //receber dados do formulario de Login
        $dados = $request->getParsedBody();
        
        $usuario = new Usuario();
        $login = $usuario->login( $dados["email"] , $dados["senha"] );

        if( $login ){
            //Logado
            return $response->withRedirect('/');
        }else {
            //Não Está Logado Direciona para o form
            return $response->withRedirect('/login');
        }
        
    }  
    
    public function sair(ServerRequestInterface $request, ResponseInterface $response){
        
        unset( $_SESSION["usuario"] );
        return $response->withRedirect('/login');
    }  
     
}
