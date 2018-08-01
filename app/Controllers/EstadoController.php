<?php
namespace App\Controllers;

use App\Models\Estado;
use App\Helpers\Util;

class EstadoController {
        
    public function salvar( $dados ) {
        $estado = new Estado();
        $estado->setEstado( Util::removerEspaco( $dados["estado"] ) );
        
        if( empty( $estado->getOne( Util::removerEspaco( $dados["estado"] ) ) ) ){
            return $estado->Insert();
        }
        
    }
    
    public function getOneById($dado){
        $estado = new Estado();
        return $estado->getOneById($dado);
    }
    
}
