<?php
namespace App\Controllers;

use App\Config\Conecta;

class TipoSexoController {
    
    public function getAll(){
        $pdo = Conecta::getPdo();
        $sql = "SELECT * FROM tiposexo";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
    
}