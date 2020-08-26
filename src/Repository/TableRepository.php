<?php

namespace FinalProjectSrc\Repository;

use FinalProjectSrc\Repository\DatabaseRepository;

class TableRepository
{
    public function tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("INSERT INTO tables (name, prize, pointstowin, description) VALUES (?, ?, ?, ?)");
        $sql->bindValue(1, $tableName);
        $sql->bindValue(2, $tablePrize);
        $sql->bindValue(3, $tablePointsToWin);
        $sql->bindValue(4, $tableDescription);
        $result = $sql->execute();
        return true;
    }

    public function vinculateTeamInTable($teamName, $tableName)
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("INSERT INTO table_teams (team_id, table_id) VALUES (?, ?)");
        $sql->bindValue(1, $teamName);
        $sql->bindValue(2, $tableName);
        $result = $sql->execute();
    }

    public function tableShowTeamsInTable($tableName) 
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT teamName FROM tableTeams WHERE tableName = (tableName) VALUES (?)");
        $sql->bindValue(1,$tableName);
        $result = $sql->execute();
        return true;
    }

    public function getTables()
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM tables");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }
}
