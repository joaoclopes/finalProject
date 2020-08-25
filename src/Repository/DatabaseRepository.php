<?php

namespace FinalProjectSrc\Repository;

Class DatabaseConnection 
{
    
    private function __construct() 
    {

    }

    private static $connection;

    public static function getConnection($nome, $host, $usuario, $senha) 
    {
        if(!self::$connection) {
            try {
                self::$connection = new PDO("mysql: dbname=" .$nome. "; host=" . $host . "; user=" . $usuario . "; password=" . $senha . ";);
            } catch (PDOException $e) {
                $msgError = $e->getMessage();
            }
        } return self::$connection;
    }
}