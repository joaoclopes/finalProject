<?php

require __DIR__ . '/../vendor/autoload.php';

use FinalProjectApplication\Controller\TableController;

class CreateTableTest extends PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider parameterProvider
     */
    public function testCreateTableValidations ($tableParameterName, $tableParameterPrize, $tableParameterPoints, $tableParameterDescription)
    {
        $tableController = new TableController();

        $this->assertTrue($tableController->createTable($tableParameterName, $tableParameterPrize, $tableParameterPoints, $tableParameterDescription));
    }

    public function parameterProvider()
    {
        return [
            ['Tabela 1', 7, 6, 'Testando a Criação de Tabelas 1'],
            ['Tabela 2', 3, 11, 'Testando a Criação de Tabelas 2'],
            ['Tabela 3', 9, 16, 'Testando a Criação de Tabelas 3'],
            ['Tabela 4', 1, 24, 'Testando a Criação de Tabelas 4']
        ];
    }
}