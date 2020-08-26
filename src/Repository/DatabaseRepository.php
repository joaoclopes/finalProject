<?php

namespace FinalProjectSrc\Repository;

use PDO;

Class DatabaseRepository
{
    
    private function __construct() 
    {

    }

    private static $connection;

    public static function getConnection($nome, $host, $usuario, $senha) 
    {
        if(!self::$connection) {
            try {
                self::$connection = new PDO("mysql:dbname=" .$nome. ";host=" . $host, $usuario, $senha);
            } catch (PDOException $e) {
                $msgError = $e->getMessage();
            }
        } return self::$connection;
    }
}