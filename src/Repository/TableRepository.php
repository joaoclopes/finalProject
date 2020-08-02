<?php

namespace FinalProject\Src\Repository;

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
        $sql = $connection->prepare("UPDATE tables SET teams = (tamName) WHERE tableName = (tableName) VALUES (:tn, :tan)");
        $sql->bindValue(":tn",$teamName);
        $sql->bindValue(":tan",$tableName);
        $sql->execute();
        return true;
    }

    public function tableVerifyTeamsInTable() 
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("SELECT teams FROM tables WHERE tableName = (tableName) VALUES (:tn)");
        $sql->bindValue(":tn",$tableName);
        $sql->execute();
        return true;
    }
}
