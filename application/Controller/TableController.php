<?php 

namespace FinalProjectApplication\Controller;

use FinalProjectSrc\Service\TableService;
use FinalProjectSrc\Models\Table;

class TableController
{
    public function createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
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

        $tableService->createTable(
            $newTable->getTableName(), 
            $newTable->getTablePrize(), 
            $newTable->getTablePointsToWin(), 
            $newTable->getTableDescription());
    }

    public function insertTeamInTable($teamName, $tableName)
    {
        $tableService = new TableService();

        if ($tableService->verifyTeamsInTable($teamName) > 10) {
            return false;
        }

        $tableService->insertTeamAndTableInRepository($teamName, $tableName);
    }
}