<?php

namespace FinalProjectSrc\Src\Models;

class Table
{
    private $tableName;
    private $tablePrize;
    private $tablePointsToWin;
    private $tableDescription;

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function getTablePrize()
    {
        return $this->tablePrize;
    }

    public function setTablePrize($tablePrize)
    {
        $this->tablePrize = $tablePrize;

        return $this;
    }

    public function getTablePointsToWin()
    {
        return $this->tablePointsToWin;
    }

    public function setTablePointsToWin($tablePointsToWin)
    {
        $this->tablePointsToWin = $tablePointsToWin;

        return $this;
    }

    public function getTableDescription()
    {
        return $this->tableDescription;
    }

    public function setTableDescription($tableDescription)
    {
        $this->tableDescription = $tableDescription;

        return $this;
    }
}