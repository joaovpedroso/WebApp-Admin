<?php

namespace App\Models;
use App\Models\Model;
//require_once "Model.php";

class TipoTelefone extends Model{
    public $descricao;
    private $table = "tipotelefone";

    public function getTable(){
        return $this->table;
    }
    
    public function getOne($dado){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT * FROM $this->table WHERE idtipotelefone = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $dado);
        $consulta   ->execute();
        return $consulta->fetch();    
    }
        
    //Inserir novo registro no banco de dados
    public function Insert(){
        //Instancia conexao com o PDO
        $pdo        = Conecta::getPdo();
        //Cria o sql passa os parametros e etc
        $sql        = "INSERT INTO $this->table (idtipotelefone, descricao) VALUES "
                . " (NULL, ?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->descricao );
        return $consulta   ->execute();
    }
    
    //Alterar um Registro
    public function Update($idtipotelefone){
        $pdo = Conecta::getPdo();
        
        try{
            //Inicia uma nova transação
            $pdo->beginTransaction();
            //Cria o sql passa os parametros e etc
            $sql        = "UPDATE $this->table SET descricao = ? WHERE idtipotelefone = ? LIMIT 1";
            $consulta   = $pdo->prepare($sql);
            $consulta   ->bindValue(1, $this->descricao );
            $consulta   ->bindValue(2, $idtipotelefone );
            $consulta   ->execute();
            
            //Conclui a transação
            return $pdo->commit();
        } catch (PDOException $ex) {
            print "Falha ao Cadastrar ".$ex->getMessage();
            //Interrompe a transação e dezfaz as alterações
            $pdo->rollBack();
        }
    }
}