<?php

require __DIR__ . '/vendor/autoload.php';

use FinalProjectApplication\Controller\TeamController;
use FinalProjectApplication\Controller\TableController;

// Create Router instance
$router = new \Bramus\Router\Router();

$router->post('/team-register', function() 
{
    $teamName = $_POST['teamName'];
    $playerOne = $_POST['playerOne'];
    $playerTwo = $_POST['playerTwo'];

    $teamController = new TeamController();

    $teamController->createTeam($teamName, $playerOne, $playerTwo);
});

$router->post('/table-register', function() 
{
    $tableName = $_POST['tableName'];
    $tablePrize = $_POST['tablePrize'];
    $tablePointsToWin = $_POST['tablePointsToWin'];
    $tableDescription = $_POST['tableDescription'];

    $tableController = new TableController();

    $tableController->createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription);
});

$router->post('/insert-team-in-table', function()
{
    $teamName = $_POST['teamName'];
    $tableName = $_POST['tableName'];

    $tableController = new TableController();

    $tableController->insertTeamInTable($teamName, $tableName);
});

$router->run();