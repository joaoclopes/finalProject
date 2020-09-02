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

    $tableController = new TableController();

    $tableController->vinculateTeamInTable($tableID, $teamID);
});

$router->get('/add-points', function() 
{
    $tableController = new TableController();

    $tableController->addPointsInTable();
});

$router->post('/add-points', function()
{
    $teamID = $_POST['teams'];
    $tableID = $_POST['tables'];
    $pointsToAdd = $_POST['points'];

    $tableController = new TableController();

    $tableController->insertPointsInTable($tableID, $teamID, $pointsToAdd);
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

$router->get('/team-view', function() 
{
    $teamController = new TeamController();

    $teamController->showAllTeamsAndTable();
});

$router->get('/tables/{tableID}', function($tableID) 
{
    $tableController = new TableController();
    
    $tableController->getTableAndTeams($tableID);

});

$router->run();