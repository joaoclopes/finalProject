<?php 

namespace FinalProjectSrc\Service;
use FinalProjectSrc\Repository\TableRepository;

class TableService
{
    public function verifyIfTableNameIsEmpty($tableName) 
    {
        if(!$tableName) {
            return false;
        }

        return true;
    }

    public function verifyIfTablePrizeIsEmpty($tablePrize) 
    {
        if(!$tablePrize) {
            return false;
        }

        return true;
    }

    public function verifyIfTablePointsToWinIsEmpty($tablePointsToWin) 
    {
        if(!$tablePointsToWin) {
            return false;
        }

        return true;
    }

    public function verifyIfTableDescriptionIsEmpty($tableDescription) 
    {
        if(!$tableDescription) {
            return false;
        }

        return true;
    }

    public function verifyIfTeamNameIsEmpty($teamName)
    {
        if(!$teamName) {
            return false;
        }

        return true;
    }

    public function createTable($tableName, $tablePrize, $tablePointsToWin, $tableDescription) 
    {
        $tableRepository = new TableRepository();
        $tableRepository->tableRegister($tableName, $tablePrize, $tablePointsToWin, $tableDescription);

        return true;
    }

    public function verifyTeamsInTable($tableID, $teamID)
    {
        $tableRepository = new TableRepository();
        
        if ($tableRepository->hasLinkBetweenTeamAndTable($tableID, $teamID)) {
            echo "times eguais";
            return false;
        }
        
        if ($tableRepository->countTeamsInTable($tableID) > 10) {
            echo "Tabela cheia de times";
            return false;
        }

        return true;
    }

    public function vinculateTeamAndTable($tableID, $teamID)
    {
        $tableRepository = new TableRepository();
        
        $tableRepository->vinculateTeamInTable($tableID, $teamID);

        return true;
    }

    public function getTables ()
    {
        $tableRepository = new TableRepository();

        $tablesReturn = $tableRepository->getTables();

        return $tablesReturn;
    }

    public function addPointsInTable($tableID, $teamID, $pointsToAdd)
    {
        $tableRepository = new TableRepository();
        
        if(!$tableRepository->addPointsInTable($tableID, $teamID, $pointsToAdd)) {
            echo "Este time não está inserido na tabela selecionada";
            return false;
        }

        return true;
    }

    public function getTableAndTeams($tableID)
    {
        $tableRepository = new TableRepository();
        
        $dataTableReturn = $tableRepository->getTableAndRespectiveTeams($tableID);

        return $dataTableReturn;
    }
}