<?php
namespace App\Controllers;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Models\Pessoa;

class HomeController extends Controller {
    
    public function __construct() {

    }
    
    public function index(ServerRequestInterface $request, ResponseInterface $response){
        $pessoa = new Pessoa();
        $registros  = $pessoa->countRegisters('pessoa');
        $ultimos    = $pessoa->getLast();
        $consulta = array(
            "totalregistros" => $registros,
            "cadastradoshoje" => $ultimos
        );
        
        $this->dados = $consulta;
        
        return $this->view('Home', $response);
    }
    
}