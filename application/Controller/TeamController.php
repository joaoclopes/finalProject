<?php 

namespace FinalProjectApplication\Application\Controller;

class TeamController
{
    public function createTeam() 
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


    }
}