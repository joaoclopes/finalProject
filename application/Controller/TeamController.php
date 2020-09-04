<?php 
namespace FinalProjectApplication\Controller;
require('vendor/autoload.php');

use FinalProjectSrc\Models\Team;
use FinalProjectSrc\Service\TeamService;
use FinalProjectSrc\Service\TableService;

class TeamController
{
    public function createTeam($teamName, $playerOne, $playerTwo) 
    {

        $teamService = new TeamService();

        if (!$teamService->validateTeamName($teamName)) {
            return false;
        }

        if (!$teamService->validatePlayerOne($playerOne)) {
            return false;
        }

        if (!$teamService->validatePlayerTwo($playerTwo)) {
            return false;
        }
        
        $teamService->createTeam($teamName, $playerOne, $playerTwo);

        return true;
    }

    public function createTeamForm()
    {
        $templates = new \League\Plates\Engine('application/Templates');
        echo $templates->render('Teams/create-form');
    }

    public function getAllTeams() {
        $templates = new \League\Plates\Engine('application/Templates');

        // usar service/repository para buscar dados
        $teamService = new TeamService();
        $teams = $teamService->getTeams();

        $tableService = new TableService();
        $tables = $tableService->getTables();

        echo $templates->render('Teams/team-data', ['teams' => $teams, 'tables' => $tables]);
    }

    public function showAllTeamsAndTable() {
        $templates = new \League\Plates\Engine('application/Templates');

        $tableService = new TableService();
        $teams = $tableService->getTables();

        echo $templates->render('Teams/view-teams', ['teams' => $teams]);
    }
}