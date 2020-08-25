<?php 

namespace FinalProjectSrc\Service;
use FinalProjectSrc\Repository\TableRepository;

class TableService
{
    public function verifyIfTableNameIsEmpty($tableName) 
    {
        if(!$tableName) {
            return false;
        }

        return true;
    }

    public function verifyIfTablePrizeIsEmpty($tablePrize) 
    {
        if(!$tablePrize) {
            return false;
        }

        return true;
    }

    public function verifyIfTablePointsToWinIsEmpty($tablePointsToWin) 
    {
        if(!$tablePointsToWin) {
            return false;
        }

        return true;
    }

    public function verifyIfTableDescriptionIsEmpty($tableDescription) 
    {
        if(!$tableDescription) {
            return false;
        }

        return true;
    }

    public function verifyIfTeamNameIsEmpty($teamName)
    {
        if(!$teamName) {
            return false;
        }

        return true;
    }

    public function createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $tableRepository = new TableRepository();
        $tableRepository->tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription);

        return true;
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

        return true;
    }
}