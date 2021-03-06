<?php 

namespace FinalProjectSrc\Service;

use FinalProjectSrc\Repository\TeamRepository;

class TeamService
{
    public function validateTeamName($teamName) 
    {
        if(!$teamName) {
            return false;
        }

        return true;
    }

    public function validatePlayerOne($playerOne) 
    {
        if(!$playerOne) {
            return false;
        }

        return true;
    }

    public function validatePlayerTwo($playerTwo) 
    {
        if(!$playerTwo) {
            return false;
        }

        return true;
    }

    public function createTeam($teamName, $playerOne, $playerTwo)
    {
        $teamRepository = new TeamRepository();

        $teamRepository->teamRegister($teamName, $playerOne, $playerTwo);

    }

    public function getTeams()
    {
        $teamRepository = new TeamRepository();

        $teamsReturn = $teamRepository->getTeams();

        return $teamsReturn;
    }

    public function getTeamsAndTable()
    {
        $teamRepository = new TeamRepository();

        $dataReturn = $teamRepository->getTeamsAndTable();

        return $dataReturn;
    }
}