<?php
namespace App\Controllers;

use App\Models\Telefone;
use App\Helpers\Util;

class TelefoneController {
    
    public function salvar( $dados ){
       
        //Realizar o For para salvar os 2 tipos de telefone ( CELULAR E FIXO )

            $telefone = new Telefone();
            $telefone->setRamal( Util::removerEspaco( $dados["ramal"] ) );
            $telefone->setDdd( Util::separarDdd( Util::removerEspaco( $dados["telefone"] ) )["ddd"] );
            $telefone->setTelefone( Util::separarDdd( Util::removerEspaco( $dados["telefone"] ) )["telefone"] );
            $telefone->setIdtipotelefone("1");
            $telefone->setIdcpf( Util::idCpf( Util::formatarCpf( $dados["cpf"] ) ) );
            
            $idtelefone = $telefone->getOneTelefone( $telefone->getIdcpf() )->idtelefone;

            if( empty( $idtelefone ) ){
                $telefone->Insert();    
            } else {
                $telefone->Update($idtelefone);
            }
            
            $telefone = new Telefone();
            $telefone->setRamal( Util::removerEspaco( $dados["ramal"] ) );
            $telefone->setDdd( Util::separarDdd( Util::removerEspaco( $dados["celular"] ) )["ddd"] );
            $telefone->setTelefone( Util::separarDdd( Util::removerEspaco( $dados["celular"] ) )["telefone"] );
            $telefone->setIdtipotelefone("2");
            $telefone->setIdcpf( Util::idCpf( Util::formatarCpf( $dados["cpf"] ) ) );
            $idtelefone = $telefone->getCelular( $telefone->getIdcpf() )->idtelefone;
            
            if( empty( $idtelefone ) ){
                $telefone->Insert();    
            } else {
                $telefone->Update($idtelefone);
            }
    }
    
    public function getOneTelefone($dado){
        $telefone = new Telefone();
        return $telefone->getOneTelefone($dado);
    }
    public function getCelular($dado){
        $telefone = new Telefone();
        return $telefone->getCelular($dado);
    }
}
