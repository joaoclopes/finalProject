<?php

require __DIR__ . '/../vendor/autoload.php';

use FinalProjectApplication\Controller\TableController;

class InsertTeamInTableTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider parameterProvider
     */
    public function testInsertTeamInTable ($tableParameterName, $teamParameterName)
    {
        $tableController = new TableController();

        $this->assertTrue($tableController->vinculateTeamInTable($tableParameterName, $teamParameterName));
    }

    public function parameterProvider()
    {
        return [
            ['Time 1', 'Tabela 1'],
            ['Time 2', 'Tabela 2'],
            ['Time 3', 'Tabela 3'],
            ['Time 4', 'Tabela 4']
        ];
    }
}
