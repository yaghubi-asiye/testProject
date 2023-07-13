<?php

namespace config;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host = 'localhost';
        $db = 'test';
        $user = 'root';
        $password = 'y';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $this->connection = new \PDO($dsn, $user, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance->connection;
    }
}

?>
