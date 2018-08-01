<?php

namespace App\Models;

use App\Models\Pessoa;
use App\Config\Conecta;
use App\Helpers\Util;
//require_once 'Pessoa.php';

class Usuario extends Pessoa{
    private $email;
    private $senha;
    private $idcpf;
    public  $updated;
    private $table = "usuario";

    public function getTable(){
        return $this->table;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha    = $senha;
    }

    public function getIdCpf(){
       return $this->idcpf;
    }

    public function setIdCpf($cpf){
        $util = new Util();
        $cpf = $util->retirarHifen($cpf);
        $cpf = $util->retirarPonto($cpf);
        $this->idcpf = $cpf;
    }
    
    public function login(String $email,String $senha){
        $pdo        = Conecta::getPdo();
        $senha = md5( $senha );
        
        $sql        = "SELECT * FROM $this->table u "
                    . "INNER JOIN pessoa p ON p.idcpf = u.idcpf "
                    . "WHERE u.email = ? AND u.senha = ? and p.idsituacao = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue( 1, $email );
        $consulta   ->bindValue( 2, $senha );
        $consulta   ->bindValue( 3, 1 );
        $consulta   ->execute();
        $resultado = $consulta->fetch()->idcpf;
        $idcpf = $resultado;
        
        if( $resultado ){

            $pessoa = new Pessoa();
            $pess   = $pessoa->getOne( $idcpf );

            $_SESSION["usuario"] = array(
                'id'=>$idcpf,
                'nome'=>$pess->nome,
                'nascimento'=> $pess->datadenascimento,
                'cadastro'=>$pess->cadastro,
                'email'=>$pess->email,
                'email'=>$email
            );
            
            return true;
        }else {
            return false;
        }
    }
    
    public function getOne($dado){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE idcpf = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $dado);
        $consulta   ->execute();
        return $consulta->fetch();        
    }

    public function Insert(){
        $pdo = Conecta::getPdo();
        $sql        = "INSERT INTO $this->table (idcpf, email, senha) VALUES "
                    . " (?,?,?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getIdCpf() );
        $consulta   ->bindValue(2, $this->getEmail() );
        $consulta   ->bindValue(3, $this->getSenha() );
        return $consulta   ->execute();
    }
    
    public function Update($idcpf){
        $pdo = Conecta::getPdo();
        $sql        = "UPDATE $this->table SET email = ?, senha = ?, updated = now() WHERE idcpf = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getEmail() );
        $consulta   ->bindValue(2, $this->getSenha() );
        $consulta   ->bindValue(3, $idcpf);
        $consulta   ->execute();
    }
}