<?php

namespace App\Models;
use App\Helpers\Util;
use App\Config\Conecta;
//require_once '../helpers/Util.php';

class Model {
    
    public function getAll($table){     
        //Selecionar todos os registros da tabela do banco
        $pdo = Conecta::getPdo();
        $sql = "SELECT * FROM ".$table;
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
    public function selectAllDados(){
        $pdo = Conecta::getPdo();
        $sql = "SELECT p.idcpf, p.nome, p.cpf, date_format(p.datadenascimento, '%d/%m/%Y') as datadenascimento,u.email, s.descricao FROM pessoa p"
             . " INNER JOIN usuario u ON u.idcpf = p.idcpf"
             . " INNER JOIN situacao s ON p.idsituacao = s.idsituacao"
             . " order by p.nome";
        $consulta = $pdo->prepare($sql);
        $consulta ->execute();
        return $consulta->fetchAll();
    }
    
    public function countRegisters($table){
        $pdo = Conecta::getPdo();
        $sql = "SELECT count(*) as registers FROM ".$table;
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        $dados = $consulta->fetch();
        return $dados->registers;
        //return $consulta->rowCount();
    }
    
}
