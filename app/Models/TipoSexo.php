<?php

namespace App\Models;
use App\Models\Model;
//require_once "Model.php";

class TipoSexo extends Model{
    public $descricao;
    private $table = "tiposexo";

    public function getTable(){
        return $this->table;
    }
    
    public function getOne($dado){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE idtiposexo = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $dado);
        $consulta   ->execute();
        return $consulta->fetch();        
    }
        
    public function Insert(){
        $pdo        = Conecta::getPdo();
        $sql        = "INSERT INTO $this->table (idtiposexo, descricao) VALUES "
                    . " (NULL, ?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->descricao );
        return $consulta   ->execute();
    }
    
    public function Update($idtiposexo){
        $pdo = Conecta::getPdo();
        try{
            $pdo->beginTransaction();
            $sql        = "UPDATE $this->table SET descricao = ? WHERE idtiposexo = ? LIMIT 1";
            $consulta   = $pdo->prepare($sql);
            $consulta   ->bindValue(1, $this->descricao );
            $consulta   ->bindValue(2, $idtiposexo );
            $consulta   ->execute();
            return $pdo->commit();
        } catch (PDOException $ex) {
            print "Falha ao Cadastrar ".$ex->getMessage();
            $pdo->rollBack();
        }
    }
}