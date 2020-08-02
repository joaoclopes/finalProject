<?php 

namespace FinalProjectApplication\Application\Controller;

class TableController
{
    public function createTable() 
    {
        $newTable = new Table();
        $newTable->setTableName($tableName);
        $newTable->setTablePrize($tablePrize);
        $newTable->setTablePointsToWin($tablePointsToWin);
        $newTable->setTableDescription($tableDescription);

        $tableService = new TableService();

        if (!$tableService->validateTableName($newTable->getTableName())) {
            return false;
        }

        if (!$tableService->validateTablePrize($newTable->getTablePrize())) {
            return false;
        }

        if (!$tableService->validateTablePointsToWin($newTable->getTablePointsToWin())) {
            return false;
        }

        if (!$tableService->validateTableDescription($newTable->getTableDescription())) {
            return false;
        }
    }

    public function insertTeamInTable()
    {
        $tableService = new TableService();

        if ($tableService->verifyTeamsInTable($teamName) > 10) {
            return false;
        }

        $tableService->tableInsertTeam($teamName);
    }
}