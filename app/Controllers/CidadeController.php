<?php

namespace App\Controllers;
use App\Models\Cidade;
use App\Helpers\Util;

class CidadeController {

    public function salvar($dados){
        $cidade = new Cidade();
        $cidade->setCidade( Util::removerEspaco( $dados["cidade"] )  );
        $cidade->setIdCidade( Util::removerEspaco( $dados["id_cidade"] ) );
        
        if( empty( $cidade->getOne( $cidade->getIdCidade() )->idcidade ) ) {
            $cidade->Insert();
            return $idcidade = $cidade->getIdCidade();
        } else {
            return $idcidade = $cidade->getIdCidade();
        }
    }
    
    
    public function getOne($dado){
        $cidade = new Cidade();
        return $cidade->getOne($dado);
    }
}
