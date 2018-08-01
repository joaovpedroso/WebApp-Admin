<?php             
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Controllers\PessoaController;
use App\Controllers\EnderecoController;
use App\Controllers\EstadoController;
use App\Controllers\CidadeController;
use App\Controllers\TelefoneController;
use App\Models\Usuario;
use App\Models\Model;
use App\Helpers\Util;

class UsuarioController extends Controller{
    
    public function getAll(){
        $model = new Model();
        return $model->selectAllDados();
    }
    
    public function getOne($dado){
        $usuario = new Usuario();
        return $usuario->getOne($dado);
    }
    
    public function index(ServerRequestInterface $request, ResponseInterface $response){
        $usuario = new UsuarioController();
        $dados = $usuario->getAll();
       
        $this->users = $dados;
        
        return $this->view('usuario/Index', $response);
    }
    
    public function editar(ServerRequestInterface $request, ResponseInterface $response){
        
        //Receber na variavel o atributo passado por URL
        $idcpf = $request->getAttribute('idcpf');
        
        
        $pessoa = new PessoaController();
        $pessoa = $pessoa->getOne($idcpf);       
        $usuario = $this->getOne( $idcpf );
        $endereco = new EnderecoController();
        $endereco = $endereco->getOne($idcpf);
        $estado = new EstadoController();
        $estado = $estado->getOneById( $endereco->idestado );
        $cidade = new CidadeController();
        $cidade = $cidade->getOne( $endereco->idcidade );
        $telefone = new TelefoneController();
        $celular = $telefone->getCelular( $idcpf );
        $telefone = $telefone->getOneTelefone($idcpf);
        
        $dados = array (
            "pessoa" =>$pessoa,
            "usuario"=>$usuario,
            "endereco"=>$endereco,
            "estado"=>$estado,
            "cidade"=>$cidade,
            "telefone"=>$telefone,
            "celular"=>$celular
        );
        
        //print '<br> ID CPF - '.$dados["pessoa"]->idcpf;

        $this->dados = $dados;
        
        return $this->view('usuario/UpdateUsuario', $response);
    }
    
    //Função para renderizar a View de Cadastro
    public function adicionar(ServerRequestInterface $request, ResponseInterface $response){
        
        return $this->view('usuario/CadastrarUsuario', $response);
    }
    
    public function salvar($dados){
        $usuario = new Usuario();
        
        $usuario->setEmail( Util::removerEspaco( $dados["email"] ) );
        $usuario->setSenha( Util::md5Senha( Util::removerEspaco( $dados["senha"] ) ) );
        $usuario->setIdsituacao( Util::removerEspaco( $dados["status"] ) );
        $usuario->setIdCpf( Util::idCpf( Util::removerEspaco( $dados["cpf"] ) ) );
        
       return $usuario->Insert();
    }
    
    public function update($dados, $idcpf){
       
        $usuario = new Usuario();
        $usuario->setEmail( Util::removerEspaco( $dados["email"] ) );
        if( empty( Util::removerEspaco( $dados["senha"] ) ) ){
            $usuario->setSenha( Util::removerEspaco( $dados["senha_a"] ) );
        }else {
           $usuario->setSenha( Util::md5Senha( Util::removerEspaco( $dados["senha"] ) ) );
        }
        $usuario->setIdsituacao( Util::removerEspaco( $dados["status"] ) );
        $usuario->setIdCpf( $idcpf );
        return $usuario->Update( $idcpf );
        
        
    }
}