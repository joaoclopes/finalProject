<?php

require __DIR__ . '/vendor/autoload.php';

use FinalProjectApplication\Controller\TeamController;
use FinalProjectApplication\Controller\TableController;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

// Create Router instance
$router = new \Bramus\Router\Router();

$router->get('/team-register', function() 
{
    $teamController = new TeamController();

    $teamController->createTeamForm();
});

$router->post('/team-register', function() 
{
    $teamName = $_POST['teamName'];
    $playerOne = $_POST['playerOne'];
    $playerTwo = $_POST['playerTwo'];

    $teamController = new TeamController();

    $teamController->createTeam($teamName, $playerOne, $playerTwo);
});

$router->get('/table-register', function() 
{
    $tableController = new TableController();

    $tableController->createTableForm();
});

$router->post('/table-register', function() 
{
    $tableName = $_POST['tableName'];
    $tablePrize = $_POST['tablePrize'];
    $tablePointsToWin = $_POST['tablePointsToWin'];
    $tableDescription = $_POST['tableDescription'];

    $tableController = new TableController();

    if(!$tableController->createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription)) {
        echo 'preenche ae';
    }
});

$router->get('/team', function() 
{
    $teamController = new TeamController();

    $teamController->getAllTeams();
});

$router->post('/vinculate-team-table', function()
{
    $teamID = $_POST['teams'];
    $tableID = $_POST['tables'];

    var_dump($teamID);
    var_dump($tableID);

    $tableController = new TableController();

    $tableController->vinculateTeamInTable($teamID, $tableID);
});

$router->get('/show-tables', function() 
{
    $tableController = new TableController();

    $tableController->createTableAndTeamForm();
});

$router->post('/show-tables', function()
{
    $teamName = $_POST['teamName'];
    $tableName = $_POST['tableName'];

    $tableController = new TableController();

    $tableController->insertTeamInTable($teamName, $tableName);
});

$router->run();