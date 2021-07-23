<?php

namespace App\Lib\Orm;

use PDO;
use PDOException;

class Connector
{

    /** @var string $driver */
    protected $driver;
    /** @var string $dbHost */
    protected $dbHost;

    /** @var string $dbName */
    protected $dbName;

    /** @var string $dbUser */
    protected $dbUser;

    /** @var string $dbPass */
    protected $dbPass;

    /** @var PDO   */
    protected $conn;

    /**
     * Connector constructor.
     */
    public function __construct()
    {
        $this->init();
        $this->connect();
    }

    /**
     * @return PDO
     */
    public function getConnect():PDO
    {
        return $this->conn;
    }

    protected function init():void
    {
        $config = include APP_ABSOLUTE_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'route.php';
        if (!empty($config['driver'])) {
            $this->driver = $config['driver'];
        }
        if (!empty($config['host'])) {
            $this->dbHost = $config['host'];
        }
        if (!empty($config['bdName'])) {
            $this->dbName = $config['bdName'];
        }
        if (!empty($config['driver'])) {
            $this->dbUser = $config['UserSeeder'];
        }
        if (!empty($config['password'])) {
            $this->dbPass = $config['password'];
        }
    }

    protected function connect():void
    {
        $dsn = $this->driver . ':dbname=' . $this->dbName . ';host=' . $this->dbHost;
        try {
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPass);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

}