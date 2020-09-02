<?php 

namespace FinalProjectApplication\Controller;
require('vendor/autoload.php');

use FinalProjectSrc\Service\TableService;
use FinalProjectSrc\Service\TeamService;
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

    public function vinculateTeamInTable($tableID, $teamID)
    {
        $tableService = new TableService();

        $verifyTeams = $tableService->verifyTeamsInTable($tableID, $teamID);
        if (!$verifyTeams) {
            return false;
        }
        $testDump = $tableService->vinculateTeamAndTable($tableID, $teamID);
        return true;
    }

    public function insertPointsInTable($tableID, $teamID, $pointsToAdd)
    {
        $tableService = new TableService();

        $tableService->addPointsInTable($tableID, $teamID, $pointsToAdd);
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

    public function addPointsInTable() {
        $templates = new \League\Plates\Engine('application/Templates');

        // usar service/repository para buscar dados
        $teamService = new TeamService();
        $teams = $teamService->getTeams();

        $tableService = new TableService();
        $tables = $tableService->getTables();

        echo $templates->render('Teams/insert-points', ['teams' => $teams, 'tables' => $tables]);
    }

    public function getTableAndTeams($tableID) {
        $templates = new \League\Plates\Engine('application/Templates');

        $tableService = new TableService();
        $tableAndTeams = $tableService->getTableAndTeams($tableID);

        echo $templates->render('Tables/team-table', ['tableAndTeams' => $tableAndTeams]);
    }
}