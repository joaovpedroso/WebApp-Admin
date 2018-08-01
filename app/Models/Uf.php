<?php

namespace App\Models;
use App\Models\Model;
//require_once "Model.php";

class Uf extends Model{
    private $uf;
    private $table = "uf";

    public function getUf() {
        return $this->uf;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }
    
    public function getTable(){
        return $this->table;
    }

    public function getOne($dado){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE uf = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $dado);
        $consulta   ->execute();
        return $consulta->fetch();
    }
        
    public function getAllUf($table){
        $pdo = Conecta::getPdo();
        $sql = "SELECT uf.iduf, uf.uf, e.estado FROM ".$table." uf "
             . "INNER JOIN estado e ON e.iduf = uf.iduf";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    public function Insert(){
            $pdo = Conecta::getPdo();
            $sql        = "INSERT INTO $this->table (iduf, uf) VALUES "
                        . " (NULL, ?)";
            $consulta   = $pdo->prepare($sql);
            $consulta   ->bindValue(1, $this->uf );
            return $consulta   ->execute();           
    }
    
    //Alterar um Registro
    public function Update($iduf){
        $pdo = Conecta::getPdo();
        $sql        = "UPDATE $this->table SET uf = ? WHERE iduf = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->uf );
        $consulta   ->bindValue(2, $iduf );
        return $consulta   ->execute();         
    }
}