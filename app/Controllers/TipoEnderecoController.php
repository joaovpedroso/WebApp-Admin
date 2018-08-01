<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use App\Models\TipoEndereco;
use App\Config\Conecta;
use App\Helpers\Util;
use PDOException;

class TipoEnderecoController extends Controller{
               
    public function __construct() {
        //Verificar se o Usuário está logado
        if( !isset( $_SESSION ) ){
            session_start();
        }
        
        if( !isset( $_SESSION["usuario"]["id"] ) ){
            header("Location: /login");
            //Encerrar a aplicação
            die();
        }
    }
    
    public function index(ServerRequestInterface $request, ResponseInterface $response){
        $tipoendereco = new TipoEnderecoController();
        $dados = $tipoendereco->getAll("tipoendereco");
       
        $this->dados = $dados;
        
        return $this->view('tipoendereco/Index', $response);
    }
    
    public function adicionar(ServerRequestInterface $request, ResponseInterface $response){
        
        return $this->view('tipoendereco/Cadastrar', $response);
    }
    
    public function salvar(ServerRequestInterface $request, ResponseInterface $response){
        $pdo = Conecta::getPdo();
        
        try {
            $pdo->beginTransaction();
            //Receber os dados do formulario
            $dados = $request->getParsedBody();
            
            $tipoendereco = new TipoEndereco();
            $tipoendereco->setDescricao( Util::removerEspaco( $dados["descricao"] ) );
            $idtipoendereco = Util::removerEspaco( $dados["idtipoendereco"] );
            
            if( empty( $idtipoendereco ) ) {
                $tipoendereco->Insert();
            } else {
                $tipoendereco->Update($idtipoendereco);
            }
            
            
            $pdo->commit();
            return $response->withRedirect('/enderecos');
        } catch (PDOException $ex) {
            print 'ERRO ao salvar Dados '.$ex->getMessage();
            $pdo->rollBack();
        }
    }
    
     public function editar(ServerRequestInterface $request, ResponseInterface $response){
        
        //Receber na variavel o atributo passado por URL
        $idtipoendereco = $request->getAttribute('idtipoendereco');
        $tipoendereco = new TipoEnderecoController();
        $tipoendereco = $tipoendereco->getOne($idtipoendereco);
        $dados = array (
            "tipoendereco"=>$tipoendereco
        );
        
        $this->dados = $dados;
        
        return $this->view('tipoendereco/Update', $response);
     }
    
    public function getAll(){
        $pdo = Conecta::getPdo();
        $sql = "SELECT * FROM tipoendereco";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    public function getOne($idtipoendereco){
        //Instancia conexao com o PDO
        $pdo        = Conecta::getPdo();
        //Cria o SQL
        $sql        = "SELECT * FROM tipoendereco WHERE idtipoendereco = ? LIMIT 1";
        //Prepara o SQL
        $consulta   = $pdo->prepare($sql);
        //Atribui valor aos parametros descritos no SQL
        $consulta   ->bindValue(1, $idtipoendereco);
        //Executa a consulta
        $consulta   ->execute();
        //Retorna o resultado da consulta
        return $consulta->fetch();
    }

    
}