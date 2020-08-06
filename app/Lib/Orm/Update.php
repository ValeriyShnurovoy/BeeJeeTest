<?php

namespace App\Lib\Orm;

class Update extends MySql
{
    /**
     * @var string $values Value list
     */
    protected $condition = '';
    /**
     * @var string $whereCondition Where condition
     */
    protected $whereCondition;

    /**
     * @param array $condition ['field_name' => 'value']
     */
    public function setCondition(array $condition)
    {
        foreach ($condition as $key => $value) {
            if (empty($this->condition)) {
                $this->condition = $key . '=' . $value;
            } else {
                $this->condition .= ', ' . $key . '=' . $value;
            }
        }
    }

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
        $sql = 'UPDATE ' . $this->table;
        if (!empty($this->columns) && !empty($this->values)) {
            $sql .= ' SET ' . $this->condition;
        }
        if (!empty($this->whereCondition)) {
            $sql .= 'WHERE ' . $this->whereCondition;
        }
        return $sql;
    }
}