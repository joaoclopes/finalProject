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
        $newTeam = new Team();
        $newTeam->setTeamName($teamName);
        $newTeam->setPlayerOne($playerOne);
        $newTeam->setPlayerTwo($playerTwo);

        $teamService = new TeamService();

        if (!$teamService->validateTeamName($newTeam->getTeamName())) {
            return false;
        }

        if (!$teamService->validatePlayerOne($newTeam->getPlayerOne())) {
            return false;
        }

        if (!$teamService->validatePlayerTwo($newTeam->getPlayerTwo())) {
            return false;
        }
        
        $teamService->createTeam($newTeam->getTeamName(), $newTeam->getPlayerOne(), $newTeam->getPlayerTwo());

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