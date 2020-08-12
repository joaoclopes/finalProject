<?php 

namespace FinalProjectSrc\Service;

class TeamService
{
    public function validateTeamName($teamName) 
    {
        if(!$teamName) {
            return false;
        }
    }

    public function validatePlayerOne($playerOne) 
    {
        if(!$playerOne) {
            return false;
        }
    }

    public function validatePlayerTwo($playerTwo) 
    {
        if(!$playerTwo) {
            return false;
        }
    }
}