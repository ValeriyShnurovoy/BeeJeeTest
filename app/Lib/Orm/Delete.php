<?php

namespace App\Lib\Orm;

class Delete extends MySql
{
    /**
     * @var string $whereCondition Where condition
     */
    protected $whereCondition;

    /**
     * @param array $where
     */
    public function where(array $where):void
    {
        $whereObject = new Where();
        $whereObject->where($where);
        $this->whereCondition = $whereObject->getStringCondition();
    }

    /**
     * @return \PDOStatement
     */
    public function execute()
    {
        return $this->connect->query($this->getSqlString());

    }

    /**
     * @return string
     */
    public function getSqlString():string
    {
        $sql = 'DELETE FROM ' . $this->table;
        if (!empty($this->whereCondition)) {
            $sql .= 'WHERE ' . $this->whereCondition;
        }
        return $sql;
    }
}