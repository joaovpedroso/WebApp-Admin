<?php

namespace App\Models;
use App\Models\Model;
use App\Config\Conecta;
//require_once "Model.php";

class Estado extends Model{
    private $estado;
    private $idestado;
    private $table = "estado";

    public function getTable(){
        return $this->table;
    }
    
    public function getEstado() {
        return $this->estado;
    }

    public function getIdestado() {
        return $this->idestado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setIdestado($idestado) {
        $this->idestado = $idestado;
    }
    
    //Selecionar dados de determinado registro
    public function getOne($dado){
        //Instancia conexao com o PDO
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE estado = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        //Atribui valor aos parametros descritos no SQL
        $consulta   ->bindValue(1, $dado);
        //Executa a consulta
        $consulta   ->execute();
        //Retorna o resultado da consulta
        return $consulta->fetch();
        
    }
    
    public function getOneById($dado){
        $pdo        = Conecta::getPdo();
        //Cria o SQL
        $sql        = "SELECT * FROM $this->table WHERE idestado = ? LIMIT 1";
        //Prepara o SQL
        $consulta   = $pdo->prepare($sql);
        //Atribui valor aos parametros descritos no SQL
        $consulta   ->bindValue(1, $dado);
        //Executa a consulta
        $consulta   ->execute();
        //Retorna o resultado da consulta
        return $consulta->fetch();
        
    }
        
    //Inserir novo registro no banco de dados
    public function Insert(){
        $pdo        = Conecta::getPdo();
        $sql        = "INSERT INTO $this->table (idestado, estado ) VALUES "   
                    . "(NULL, ?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getEstado() );
        $consulta   ->execute();
        $last       = $pdo->lastInsertId();
    }
    
    //Alterar um Registro
    public function Update($idestado){
        $pdo = Conecta::getPdo();

        //Cria o sql passa os parametros e etc
        $sql        = "UPDATE $this->table SET estado = ? WHERE idestado = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getEstado() );
        $consulta   ->bindValue(2, $idestado );
        $consulta   ->execute();
    }
}
