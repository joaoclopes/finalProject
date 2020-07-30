<?php

namespace FinalProject\Src\Models;

class Team
{
    private $teamName;
    private $playerOne;
    private $playerTwo;

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getPlayerOne()
    {
        return $this->playerOne;
    }

    public function setPlayerOne($playerOne)
    {
        $this->playerOne = $playerOne;

        return $this;
    }

    public function getPlayerTwo()
    {
        return $this->playerTwo;
    }

    public function setPlayerTwo($playerTwo)
    {
        $this->playerTwo = $playerTwo;

        return $this;
    }
}