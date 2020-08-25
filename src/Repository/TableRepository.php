<?php

namespace FinalProjectSrc\Repository;

use FinalProjectSrc\Repository\DatabaseConnection;

class TableRepository
{
    public function tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $connection = DatabaseConnection::getConnection("database", "localhost", "root", "");
        $sql = $connection->prepare("INSERT INTO tables (tableName, tablePrize, tablePointsToWin, tableDescription) VALUES (:tn, :tp, :tpw, :td)");
        $sql->bindValue(":tn",$tableName);
        $sql->bindValue(":tp",$tablePrize);
        $sql->bindValue(":tpw",$tablePointsToWin);
        $sql->bindValue(":td",$tableDescription);
        $sql->execute();
        return true;
    }

    public function tableInsertTeam($teamName, $tableName)
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT tableTeams SET (tableName, teamName) VALUES (:tan, :ten)");
        $sql->bindValue(":tan",$teamName);
        $sql->bindValue(":ten",$tableName);
        $sql->execute();
        return true;
    }

    public function tableShowTeamsInTable($tableName) 
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT teamName FROM tableTeams WHERE tableName = (tableName) VALUES (:tn)");
        $sql->bindValue(":tn",$tableName);
        $sql->execute();
        return true;
    }
}
