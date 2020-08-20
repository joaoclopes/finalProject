<?php 

namespace FinalProjectSrc\Service;
use FinalProjectSrc\Repository\TableRepository;

class TableService
{
    public function verifyIfTableNameIsEmpty($tableName) 
    {
        var_dump($tableName);
    }

    public function verifyIfTablePrizeIsEmpty($tablePrize) 
    {
        var_dump($tablePrize);
    }

    public function verifyIfTablePointsToWinIsEmpty($tablePointsToWin) 
    {
        var_dump($tablePointsToWin);
    }

    public function verifyIfTableDescriptionIsEmpty($tableDescription) 
    {
        var_dump($tableDescription);
    }

    public function verifyIfTeamNameIsEmpty($teamName)
    {
        var_dump($teamName);
    }

    public function createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $tableRepository = new TableRepository();
        $tableRepository->tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription);
    }

    public function verifyTeamsInTable($tableName)
    {
        $tableRepository = new TableRepository();

        if ($tableRepository->tableShowTeamsInTable($tableName) >= 10) {
            return false;
        }
        return true;
    }

    public function vinculateTeamAndTable($teamName, $tableName)
    {
        $tableRepository = new TableRepository();
        
        $tableRepository->tableInsertTeam($teamName, $tableName);
    }
}