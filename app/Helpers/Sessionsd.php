<?php
namespace App\Helpers;

class Session {
    public static function start(){
       
        //Verificar se a sessão está startada
        if( !isset( $_SESSION ) ){
            session_start();
        }
    }
    
    public static function verifica(){
        if( !isset( $_SESSION["usuario"]["id"] ) ){
            header("Location: /login");
            //Encerrar a aplicação
            die();
        }
    }
}
