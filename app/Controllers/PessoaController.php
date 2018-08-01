<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Controllers\CidadeController;
use App\Controllers\EstadoController;
use App\Controllers\UsuarioController;
use App\Controllers\EnderecoController;
use App\Controllers\TelefoneController;
use App\Models\Pessoa;
use App\Config\Conecta;
use App\Helpers\Util;
use PDOException;

class PessoaController extends Controller {
    
    public function deletar(ServerRequestInterface $request, ResponseInterface $response ){
        $idcpf = $request->getAttribute('idcpf');
        $pessoa = new Pessoa();
        $pdo = Conecta::getPdo();
        
        try{
            $pdo->beginTransaction();
            $pessoa->setIdCpf($idcpf);
            $pessoa->Delete();
            $pdo->commit();
            return $response->withRedirect('/usuarios');
        } catch (PDOException $ex) {
            die( "ERRO ao salvar dados". $e->getMessage() );
            $pdo->rollBack();
        }
    }
    
    public function getOne($idcpf){
        $pessoa = new Pessoa();
        return $pessoa->getOne($idcpf);
    }
    
    public function salvar(ServerRequestInterface $request, ResponseInterface $response){
        $pdo = Conecta::getPdo();

        try{
            $pdo->beginTransaction();
            //Receber os dados vindos do formulario
            $dados = $request->getParsedBody();

            $pessoa = new Pessoa();
            
            $pessoa->setNome( Util::removerEspaco( $dados["nome"] ) );
            $pessoa->setCpf( Util::formatarCpf( $dados["cpf"] ) );
            $pessoa->setRg( Util::removerEspaco( $dados["rg"] ) ) ;
            $pessoa->setDatadenascimento( Util::removerEspaco( $dados["datadenascimento"] ) );
            $pessoa->setIdtiposexo( Util::removerEspaco( $dados["sexo"] ) );
            $pessoa->setIdsituacao( Util::removerEspaco( $dados["status"] ) );
//            print 'ID SITUACAO'.$pessoa->getIdsituacao();
//            exit;
            $pessoa->setIdCpf( Util::idCpf( Util::formatarCpf( $dados["cpf"] ) ) );
            
            
            if( !isset( $dados["idcpf"] ) ){
                $pessoa->Insert();
                $usuario = new UsuarioController();
                $usuario->salvar($dados);
            }else {
                $pessoa->Update( Util::removerEspaco( $dados["idcpf"] ) );
                $usuario = new UsuarioController();
                $usuario->update($dados, $dados["idcpf"]);
            }
            
            $estado = new EstadoController();
            $estado->salvar($dados);
            $cidade = new CidadeController();
            $cidade->salvar($dados);
            $endereco = new EnderecoController();
            $endereco->salvar($dados, $pessoa->getIdCpf() );
            $telefone = new TelefoneController();
            $telefone->salvar($dados);
            
            $pdo->commit();
            //Método de redirecionamento
            print('<script>apprise("Dados Salvos");</script>');
            return $response->withRedirect('/usuarios');
        } catch (PDOException $ex) {
            print 'ERRO ao salvar Dados '.$ex->getMessage();
            $pdo->rollBack();
        }
    }
}