<?php
namespace App\Controllers;

use App\Config\Conecta;

class SituacaoController {
    
    public function getAll(){
        $pdo = Conecta::getPdo();
        $sql = "SELECT * FROM situacao";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
}
