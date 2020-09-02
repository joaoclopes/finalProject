<?php

namespace FinalProjectSrc\Repository;

class TeamRepository
{
    public function teamRegister($teamName, $playerOne, $playerTwo) 
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("INSERT INTO teams (name, playerone, playertwo) VALUES (?, ?, ?)");
        $sql->bindValue(1, $teamName);
        $sql->bindValue(2, $playerOne);
        $sql->bindValue(3, $playerTwo);
        $result = $sql->execute();
        return true;
    }

    public function getTeams()
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM teams");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }

    public function getTeamsAndTable()
    {
        $connection = DatabaseRepository::getConnection("teste", "localhost", "joao", "senha");
        $sql = $connection->prepare("SELECT * FROM table_teams order by points desc");
        $result = $sql->execute();
        $dataReturn = $sql->fetchAll(\PDO::FETCH_OBJ);
        return $dataReturn;
    }
}