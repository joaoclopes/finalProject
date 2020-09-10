<?php

namespace FinalProjectSrc\Repository;

include_once __DIR__ . '/vendor/autoload.php';

class TeamRepository
{
    public function teamRegister($teamName, $playerOne, $playerTwo) 
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("INSERT INTO teams (name, playerone, playertwo) VALUES (?, ?, ?)");
        $sql->bindValue(1, $teamName);
        $sql->bindValue(2, $playerOne);
        $sql->bindValue(3, $playerTwo);
        $result = $sql->execute();
        return true;
    }

    public function getTeams()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("SELECT * FROM teams");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }

    public function getTeamsAndTable()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("SELECT * FROM table_teams order by points desc");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }
}