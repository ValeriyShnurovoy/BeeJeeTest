<?php

namespace App\Lib\Orm;

class Where
{
    protected $condition = '';


    /**
     * Where constructor.
     * @param array $condition [[[columnName => value], '=', 'AND'],]
     */
    public function where(array $condition)
    {
        foreach ($condition as $where) {
            if ('AND' === $where[2]) {
                $this->andWhere(key($where[0]), $where[1], current($where[0]));
            } else {
                $this->orWhere(key($where[0]), $where[1], current($where[0]));
            }
        }
    }

    /**
     * @return string
     */
    public function getStringCondition():string
    {
        return $this->condition;
    }

    /**
     * @param string $columnName
     * @param string $condition
     * @param string $value
     */
    protected function andWhere(string $columnName, string $condition, string $value)
    {
        if (empty($this->condition)) {
            $this->condition = '(' . $columnName . ' ' . $condition . ' ' . $value . ')';
        } else {
            $this->condition = ' AND (' . $columnName . ' ' . $condition . ' ' . $value . ')';
        }
    }

    /**
     * @param string $columnName
     * @param string $condition
     * @param string $value
     */
    protected function orWhere(string $columnName, string $condition, string $value)
    {
        if (empty($this->condition)) {
            $this->condition = '(' . $columnName . ' ' . $condition . ' ' . $value . ')';
        } else {
            $this->condition = ' OR (' . $columnName . ' ' . $condition . ' ' . $value . ')';
        }
    }}