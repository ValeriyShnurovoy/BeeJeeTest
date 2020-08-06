<?php

namespace App\Lib\Orm;

use PDO;

abstract class MySql
{
    /**
     * @var PDO $connect
     */
    protected $connect;
    /**
     * @var string $table Table name in DB
     */
    protected $table;

    public function __construct()
    {
        $connector = new Connector();
        $this->connect = $connector->getConnect();
    }

    /**
     * @param string|array $tableName
     */
    public function from($tableName):void
    {
        if (is_array($tableName)) {
            foreach ($tableName as $key => $value)
            {
                $this->table = $value . ' AS ' . $key;
                break;
            }
        } else {
            $this->table = $tableName;
        }
    }

    abstract public function execute();

    abstract public function getSqlString();

}