<?php

require __DIR__ . '/../vendor/autoload.php';

use FinalProjectApplication\Controller\TeamController;

class CreateTeamTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider parameterProvider
     */
    public function testCreateTeamValidations ($teamParameterName, $teamParameterPlayerOne, $teamParameterPlayerTwo)
    {
        $teamController = new TeamController();

        $this->assertTrue($teamController->createTeam($teamParameterName, $teamParameterPlayerOne, $teamParameterPlayerTwo));
    }

    public function parameterProvider()
    {
        return [
            ['Time 1', 'Marcos', 'Jansens'],
            ['Time 2', 'Baiano', 'Zé'],
            ['Time 3', 'Tedesco', 'Paraiba'],
            ['Time 4', 'Marcelo', 'Tocaia']
        ];
    }
}

