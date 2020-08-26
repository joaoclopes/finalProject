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

        return true;
    }

    public function vinculateTeamInTable($teamID, $tableID)
    {
        $tableService = new TableService();

        /**if ($tableService->verifyTeamsInTable($teamID)) {
            return false;
        }*/

        $tableService->vinculateTeamAndTable($teamID, $tableID);

        return true;
    }

    public function createTableForm()
    {
        $templates = new \League\Plates\Engine('application/Templates');
        echo $templates->render('Tables/create-form');
    }

    public function createTableAndTeamForm()
    {
        $templates = new \League\Plates\Engine('application/Templates');
        echo $templates->render('Tables/create-team-table-form');
    }

    public function showTablesAndTeams()
    {
        $templates = new \League\Plates\Engine('application/Templates');
        echo $templates->render('Tables/show-tables');
    }
}