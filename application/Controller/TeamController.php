<?php 
namespace FinalProjectApplication\Controller;
require('vendor/autoload.php');

use FinalProjectSrc\Models\Team;
use FinalProjectSrc\Service\TeamService;

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
        $templates = new \League\Plates\Engine('application/templates');
        echo $templates->render('teams/create-form');
    }
}