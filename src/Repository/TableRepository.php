<?php

namespace FinalProjectSrc\Repository;

use FinalProjectSrc\Repository\DatabaseRepository;

include_once __DIR__ . '/vendor/autoload.php';

class TableRepository
{
    public function tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("INSERT INTO tables (name, prize, pointstowin, description) VALUES (?, ?, ?, ?)");
        $sql->bindValue(1, $tableName);
        $sql->bindValue(2, $tablePrize);
        $sql->bindValue(3, $tablePointsToWin);
        $sql->bindValue(4, $tableDescription);
        $result = $sql->execute();
        return true;
    }

    public function vinculateTeamInTable($tableID, $teamID)
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("INSERT INTO table_teams (team_id, table_id, points) VALUES (?, ?, ?)");
        $sql->bindValue(1, $teamID);
        $sql->bindValue(2, $tableID);
        $sql->bindValue(3, 0);
        $result = $sql->execute();
    }

    public function hasLinkBetweenTeamAndTable($tableID, $teamID) 
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("SELECT * FROM table_teams WHERE table_id = (?) AND team_id = (?)");
        $sql->bindValue(1, $tableID);
        $sql->bindValue(2, $teamID);
        $result = $sql->execute();
        return ($sql->rowCount() > 0 ? true : false);
    }

    public function countTeamsInTable($tableID) 
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("SELECT * FROM table_teams WHERE table_id = ?");
        $sql->bindValue(1, $tableID);
        $result = $sql->execute();
        $sqlRowCount = $sql->rowCount();
        return $sqlRowCount;
    }

    public function getTables()
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("SELECT * FROM tables");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }

    public function addPointsInTable($tableID, $teamID, $pointsToAdd)
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("UPDATE table_teams SET points = points + (?) WHERE table_id = (?) AND team_id = (?)");
        $sql->bindValue(1, $pointsToAdd);
        $sql->bindValue(2, $tableID);
        $sql->bindValue(3, $teamID);
        $result = $sql->execute();
        return ($sql->rowCount() > 0 ? true : false);
    }

    public function getTableAndRespectiveTeams($tableID)
    {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $connection = DatabaseRepository::getConnection($_ENV['DB_DATABASE'], $_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        $sql = $connection->prepare("select te.name, tt.points, ta.description, ta.pointstowin from table_teams tt
        Inner Join teams te 
        ON tt.team_id = te.id 
        INNER JOIN tables ta 
        ON tt.table_id = ta.id 
        where ta.id =(?)
        order by tt.points desc");
        $sql->bindValue(1, $tableID);
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }
}
