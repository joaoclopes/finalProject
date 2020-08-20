<?php 

namespace FinalProjectApplication\Controller;
require('vendor/autoload.php');

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

        if (!$tableService->verifyIfTableNameIsEmpty($newTable->getTableName())) {
            return false;
        }

        if (!$tableService->verifyIfTablePrizeIsEmpty($newTable->getTablePrize())) {
            return false;
        }

        if (!$tableService->verifyIfTablePointsToWinIsEmpty($newTable->getTablePointsToWin())) {
            return false;
        }

        if (!$tableService->verifyIfTableDescriptionIsEmpty($newTable->getTableDescription())) {
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

        if ($tableService->verifyTeamsInTable($teamName)) {
            return false;
        }

        $tableService->vinculateTeamAndTable($teamName, $tableName);
    }

    public function createTableForm()
    {
        $templates = new \League\Plates\Engine('src/templates');
        echo $templates->render('tables/create-form');
    }

    public function createTableAndTeamForm()
    {
        $templates = new \League\Plates\Engine('src/templates');
        echo $templates->render('tables/create-team-table-form');
    }

    public function showTablesAndTeams()
    {
        $templates = new \League\Plates\Engine('src/templates');
        echo $templates->render('tables/show-tables');
    }
}