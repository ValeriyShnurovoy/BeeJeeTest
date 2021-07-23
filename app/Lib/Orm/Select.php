<?php

namespace App\Lib\Orm;

class Select extends MySql
{
    /**
     * @var string $columns Columns list
     */
    protected $columns;

    /**
     * @var string $orderValue Order condition
     */
    protected $orderValue;

    /**
     * @var string $groupValue Group condition
     */
    protected $groupValue;

    /**
     * @var int $limitValue Limit rows value
     */
    protected $limitValue;

    /**
     * @var int $offsetValue Offset rows value
     */
    protected $offsetValue;

    /**
     * @var string $whereCondition Where condition
     */
    protected $whereCondition;

    /**
     * @param string|array $columns
     */
    public function column($columns = '*'):void
    {
        $columnString = null;
        if (is_array($columns)) {
            foreach ($columns as $key => $value) {
                if (is_numeric($key)) {
                    $currentColumn = $value;
                } else {
                    $currentColumn = $value . ' AS ' . $key;
                }
                if (null === $columns) {
                    $columnString = $currentColumn;
                } else {
                    $columnString .= ', ' . $currentColumn;
                }
            }
        } else {
            $columnString = $columns;
        }
        $this->columns = $columnString;
    }

    /**
     * @param string $condition Condition in sql syntax field_name desc or field_name desc, field_name
     */
    public function order(string $condition):void
    {
        $this->orderValue = $condition;
    }

    /**
     * @param string $condition Condition in sql syntax field_name or field_name, field_name
     */
    public function group(string $condition):void
    {
        $this->groupValue = $condition;
    }

    /**
     * @param int $limit
     */
    public function limit(int $limit):void
    {
        $this->limitValue = $limit;
    }

    /**
     * @param int $offset
     */
    public function offset(int $offset):void
    {
        $this->offsetValue = $offset;
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
        $sql = 'SELECT ' . $this->columns . ' FROM ' . $this->table;
        if (!empty($this->whereCondition)) {
            $sql .= ' WHERE ' . $this->whereCondition;
        }
        if (!empty($this->orderValue)) {
            $sql .= ' ORDER BY ' . $this->orderValue;
        }
        if (!empty($this->groupValue)) {
            $sql .= ' GROUP BY ' . $this->groupValue;
        }
        if (!empty($this->limitValue)) {
            $sql .= ' LIMIT ' . $this->limitValue;
        }
        if (!empty($this->offsetValue)) {
            $sql .= ' OFFSET ' . $this->offsetValue;
        }

        return $sql;
    }

}