<?php

namespace App\Lib\Orm;

class Insert extends MySql
{
    /**
     * @var string $columns Column list
     */
    protected $columns = '';

    /**
     * @var string $values Value list
     */
    protected $values = '';

    /**
     * @param array $condition ['field_name' => 'value']
     */
    public function setCondition(array $condition)
    {
        foreach ($condition as $key => $value) {
            if (empty($this->columns)) {
                $this->columns = $key;
                $this->values = $value;
            } else {
                $this->columns .= ', ' . $key;
                $this->values .= ', ' . $value;
            }
        }
    }

    /**
     * @return \PDOStatement
     */
    public function execute()
    {
        return $this->connect->query($this->getSqlString());

    }


    public function getSqlString():string
    {
        $sql = 'INSERT INTO ' . $this->table;
        if (!empty($this->columns) && !empty($this->values)) {
            $sql .= ' (' . $this->columns . ') VALUES (' . $this->values . ')';
        }
        return $sql;
    }

}