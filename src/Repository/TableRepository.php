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

    public function vinculateTeamInTable($tableID, $teamID)
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("INSERT INTO table_teams (team_id, table_id, points) VALUES (?, ?, ?)");
        $sql->bindValue(1, $teamID);
        $sql->bindValue(2, $tableID);
        $sql->bindValue(3, 0);
        $result = $sql->execute();
    }

    public function hasLinkBetweenTeamAndTable($tableID, $teamID) 
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM table_teams WHERE table_id = (?) AND team_id = (?)");
        $sql->bindValue(1, $tableID);
        $sql->bindValue(2, $teamID);
        $result = $sql->execute();
        return ($sql->rowCount() > 0 ? true : false);
    }

    public function countTeamsInTable($tableID) 
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM table_teams WHERE table_id = ?");
        $sql->bindValue(1, $tableID);
        $result = $sql->execute();
        $sqlRowCount = $sql->rowCount();
        return $sqlRowCount;
    }

    public function getTables()
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM tables");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }

    public function addPointsInTable($tableID, $teamID, $pointsToAdd)
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("UPDATE table_teams SET points = points + (?) WHERE table_id = (?) AND team_id = (?)");
        $sql->bindValue(1, $pointsToAdd);
        $sql->bindValue(2, $tableID);
        $sql->bindValue(3, $teamID);
        $result = $sql->execute();
        return ($sql->rowCount() > 0 ? true : false);
    }

    public function getTableAndRespectiveTeams($tableID)
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
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
