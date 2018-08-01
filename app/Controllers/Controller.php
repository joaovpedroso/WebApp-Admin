<?php
namespace App\Controllers;
use Psr\Http\Message\ResponseInterface;

class Controller {
    
    public function view(String $view, ResponseInterface $response){
        $pagina = require_once '../app/View/'.$view.'.php';
        
        //Chama o metodo getBody -> Write que irá escrever na tela a string passada dentre ()
        //Chama o metodo getBody -> getContents() = Vai mostrar na tela o conteudo da variavel $pagina
        $response->getBody()->getContents($pagina);
        return $response;
    }
    
    //Função para incluir o cabeçalho e o rodapé nas paginas
    public function layout(String $caminho){
        $caminho = str_replace(".", "/", $caminho);
        require_once dirname(__FILE__,2)."/View/$caminho.php";
    }
    
}
