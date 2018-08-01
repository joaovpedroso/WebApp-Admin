<?php

namespace App\Models;
use App\Models\Model;
use App\Config\Conecta;
//require_once "Model.php";

class TipoEndereco extends Model{
    private $descricao;
    private $table = "tipoendereco";

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    public function getTable(){
        return $this->table;
    }
    
    public function getOne($dado){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE idtipoendereco = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $dado);
        $consulta   ->execute();
        return $consulta->fetch();    
    }
        
    public function Insert(){
        $pdo        = Conecta::getPdo();
        $sql        = "INSERT INTO $this->table (idtipoendereco, descricao) VALUES "
                    . " (NULL, ?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getDescricao() );
        return $consulta   ->execute();
    }
    
    public function Update($idtipoendereco){
        $pdo = Conecta::getPdo();
        $sql        = "UPDATE $this->table SET descricao = ? WHERE idtipoendereco = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getDescricao() );
        $consulta   ->bindValue(2, $idtipoendereco );
        return $consulta   ->execute();
    }

}