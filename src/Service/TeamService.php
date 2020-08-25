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
}