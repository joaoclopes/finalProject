<?php

namespace FinalProjectSrc\Repository;

use FinalProjectSrc\Repository\DatabaseConnection;

class TableRepository
{
    public function tableRegister() 
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO tables (tableName, tablePrize, tablePointsToWin, tableDescription) VALUES (:tn, :tp, :tpw, :td)");
        $sql->bindValue(":tn",$tableName);
        $sql->bindValue(":tp",$tablePrize);
        $sql->bindValue(":tpw",$tablePointsToWin);
        $sql->bindValue(":td",$tableDescription);
        $sql->execute();
        return true;
    }

    public function tableInsertTeam()
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("UPDATE tableTeams SET (tableName, teamName) VALUES (:tan, :ten)");
        $sql->bindValue(":tan",$teamName);
        $sql->bindValue(":ten",$tableName);
        $sql->execute();
        return true;
    }

    public function tableShowTeamsInTable() 
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT teamName FROM tableTeams WHERE tableName = (tableName) VALUES (:tn)");
        $sql->bindValue(":tn",$tableName);
        $sql->execute();
        return true;
    }
}
