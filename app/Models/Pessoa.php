<?php

namespace App\Models;

use App\Models\Model;
use App\Config\Conecta;
use App\Helpers\Util;

class Pessoa extends Model{
   private $idcpf;
   private $cpf; 
   private $rg;
   private $nome;
   private $datadenascimento;
   private $idtiposexo;
   private $idsituacao;
   private $table = "pessoa";
       
    public function getTable(){
        return $this->table;
    }
   
   public function getIdCpf(){
       return $this->idcpf;
   }
   
   public function setIdCpf($cpf){
       $this->idcpf = $cpf;
   }
   
   public function getCpf() {
       return $this->cpf;
   }

   public function getRg() {
       return $this->rg;
   }

   public function getNome() {
       return $this->nome;
   }

   public function getDatadenascimento() {
       return $this->datadenascimento;
   }

   public function getIdtiposexo() {
       return $this->idtiposexo;
   }

   public function getIdsituacao() {
       return $this->idsituacao;
   }

   public function setCpf($cpf) {
       $util = new Util();
       $cpf = $util->retirarHifen($cpf);
       $cpf = $util->retirarPonto($cpf);
       $this->cpf = $cpf;
   }

   public function setRg($rg) {
       $this->rg = $rg;
   }

   public function setNome($nome) {
       $this->nome = $nome;
   }

   public function setDatadenascimento($datadenascimento) {
       $this->datadenascimento = $datadenascimento;
   }

   public function setIdtiposexo($idtiposexo) {
       $this->idtiposexo = $idtiposexo;
   }

   public function setIdsituacao($idsituacao) {
       $this->idsituacao = $idsituacao;
   }
   
    //Selecionar dados de determinado registro
    public function getOne($dado){
        //Instancia conexao com o PDO
        $pdo        = Conecta::getPdo();
        //Cria o SQL
        $sql        = "SELECT *, date_format(datadenascimento, '%d/%m/%Y') as datadenascimento, date_format( date( created ), '%d/%m/%Y' )as cadastro FROM $this->table WHERE idcpf = ? LIMIT 1";
        //Prepara o SQL
        $consulta   = $pdo->prepare($sql);
        //Atribui valor aos parametros descritos no SQL
        $consulta   ->bindValue(1, $dado);
        //Executa a consulta
        $consulta   ->execute();
        //Armazena na variavel quantos registros foram retornados do banco
        $count      = $consulta->rowCount();  
        //Se foram retornados 0 ou menos registros retorna na chamada da funcao ""
        if( $count <= 0 ){
            return "";
        } else {
            //Cao retorno > 0 Retorna o resultado da consulta
            return $consulta->fetch();
        }       
    }
    
    public function getLast(){
        $pdo        = Conecta::getPdo();
        $sql        = "SELECT *, date_format(created, '%d/%m/%Y') as created FROM $this->table ORDER BY rand()";
        $consulta   = $pdo->prepare( $sql );
        $consulta   ->execute();
        return      $consulta->fetch();
    }
    
    public function Insert(){
        $pdo = Conecta::getPdo();
        $sql        = "INSERT INTO $this->table (idcpf, cpf, rg, nome, datadenascimento, idtiposexo, idsituacao) VALUES "
                . " (?, ?, ?, ?, ?, ?, ?)";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getIdcpf() );
        $consulta   ->bindValue(2, $this->getCpf() );
        $consulta   ->bindValue(3, $this->getRg() );
        $consulta   ->bindValue(4, $this->getNome() );
        $consulta   ->bindValue(5, $this->getDatadenascimento() );
        $consulta   ->bindValue(6, $this->getIdtiposexo() );
        $consulta   ->bindValue(7, $this->getIdsituacao() );
        return $consulta   ->execute();
    }
    
    public function Update($idcpf){
        $pdo = Conecta::getPdo();
        $sql        = "UPDATE $this->table SET cpf = ? , rg = ? , nome = ? , datadenascimento = ? , idtiposexo = ?, idsituacao = ?, updated = now() WHERE idcpf = ? LIMIT 1";
        $consulta   = $pdo->prepare($sql);
        $consulta   ->bindValue(1, $this->getCpf() );
        $consulta   ->bindValue(2, $this->getRg() );
        $consulta   ->bindValue(3, $this->getNome() );
        $consulta   ->bindValue(4, $this->getDatadenascimento() );
        $consulta   ->bindValue(5, $this->getIdtiposexo() );
        $consulta   ->bindValue(6, $this->getIdsituacao() );
        $consulta   ->bindValue(7, $idcpf );
        return $consulta   ->execute();
    }
    
    public function Delete(){
        $pdo        = Conecta::getPdo();
        $sql        = "UPDATE $this->table SET idsituacao = ? WHERE idcpf = ? LIMIT 1";
        $consulta   = $pdo->prepare( $sql );
        $consulta   ->bindValue(1, "2" );
        $consulta   ->bindValue(2, $this->getIdCpf() );
        return $consulta   ->execute();
    }
   
}