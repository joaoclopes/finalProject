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

        $tableService = new TableService();

        if (!$tableService->verifyIfTableNameIsEmpty($tableName)) {
            return false;
        }

        if (!$tableService->verifyIfTablePrizeIsEmpty($tablePrize)) {
            return false;
        }

        if (!$tableService->verifyIfTablePointsToWinIsEmpty($tablePointsToWin)) {
            return false;
        }

        if (!$tableService->verifyIfTableDescriptionIsEmpty($tableDescription)) {
            return false;
        }

        $tableService->createTable(
            $tableName, 
            $tablePrize, 
            $tablePointsToWin, 
            $tableDescription);

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
