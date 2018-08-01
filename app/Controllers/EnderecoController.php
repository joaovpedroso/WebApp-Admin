<?php
namespace App\Controllers;
use App\Models\Endereco;
use App\Models\Estado;
use App\Helpers\Util;

class EnderecoController {
    
    public function salvar($dados, $idcpf){

        $endereco = new Endereco();
        $estado   = new Estado();
        $endereco->setIdcpf( Util::idCpf( Util::formatarCpf( $dados["cpf"] ) ) );
        $endereco->setCep( Util::removerEspaco( $dados["cep"] ) );
        $endereco->setComplemento( Util::removerEspaco( $dados["complemento"] ) );
        $endereco->setEndereco( Util::removerEspaco( $dados["endereco"]) );
        $endereco->setNumero( Util::removerEspaco( $dados["numero"] ) );
        $endereco->setIdcidade( Util::removerEspaco( $dados["id_cidade"] ) );
        $endereco->setIdtipoendereco( Util::removerEspaco( $dados["id_tipoendereco"] ) );
        $endereco->setIdEstado( $estado->getOne( Util::removerEspaco( $dados["estado"] ) )->idestado );
        $endereco->setBairro( Util::removerEspaco( $dados["bairro"] ) );
        $idendereco = $endereco->getOne($idcpf)->idendereco;

        if( isset( $idendereco ) ) {
            $endereco->Update( $idendereco );
        } else {
            return $endereco->Insert();
        }
    }
    
    public function getOne($dado){
        $endereco = new Endereco();
        return $endereco->getOne($dado);
    }
}
