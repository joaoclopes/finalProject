<?php 

namespace FinalProjectSrc\Service;
use FinalProjectSrc\Repository\TableRepository;

class TableService
{
    public function validateTableName($tableName) 
    {
        if (!$tableName) {
            return false;
        }
    }

    public function validateTablePrize($tablePrize) 
    {
        if (!$tablePrize) {
            return false;
        }
    }

    public function validateTablePointsToWin($tablePointsToWin) 
    {
        if (!$tablePointsToWin) {
            return false;
        }
    }

    public function validateTableDescription($tableDescription) 
    {
        if (!$tableDescription) {
            return false;
        }
    }

    public function insertTeamInTable($teamName)
    {
        if (!$teamName) {
            return false;
        }
    }

    public function createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $tableRepository = new TableRepository();
        $tableRepository->tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription);
    }

    public function verifyTeamsInTable($tableName)
    {
        $tableRepository = new TableRepository();

        $tableRepository->tableShowTeamsInTable($tableName);
    }

    public function insertTeamAndTableInRepository($teamName, $tableName)
    {
        $tableRepository = new TableRepository();
        
        $tableRepository->tableInsertTeam($teamName, $tableName);
    }
}