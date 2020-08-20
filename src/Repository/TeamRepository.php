<?php

namespace FinalProjectSrc\Repository;

class TeamRepository
{
    public function teamRegister($teamName, $playerOne, $playerTwo) 
    {
        $connection = DatabaseConnection::getConnection();
        $sql = $connection->prepare("INSERT INTO teams (teamName, playerOne, playerTwo) VALUES (:tn, :po, :pt)");
        $sql->bindValue(":tn",$teamName);
        $sql->bindValue(":po",$playerOne);
        $sql->bindValue(":pt",$playerTwo);
        $sql->execute();
        return true;
    }
}