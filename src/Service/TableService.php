<?php 

namespace FinalProjectSrc\Service;

class TableService
{
    public function validateTableName($tableName) 
    {
        if (!$tableName) {
            return false;
        }
    }

    public function validateTablePrize($tablePrize) 
    {
        if (!$tablePrize) {
            return false;
        }
    }

    public function validateTablePointsToWin($tablePointsToWin) 
    {
        if (!$tablePointsToWin) {
            return false;
        }
    }

    public function validateTableDescription($tableDescription) 
    {
        if (!$tableDescription) {
            return false;
        }
    }

    public function insertTeamInTable($teamName)
    {
        if (!$teamName) {
            return false;
        }
    }

    public function verifyTeamsInTable()
    {
        //CONSULTAR OS TIMES INSERIDOS NA REPOSITORY
    }
}