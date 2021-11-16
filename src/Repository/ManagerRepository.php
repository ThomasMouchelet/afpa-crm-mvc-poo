<?php

namespace App\src\Repository;

use PDO;
use Exception;

class ManagerRepository
{
    public $connection;

    public function getConnection()
    {
        try {
            $database = new PDO(DB_FULL_HOST, DB_USER, DB_PASSWORD);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $database;

            return $this->connection;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    public function createQuery($sql, array $parameters = null)
    {
        $result = $this->checkConnection()->prepare($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);

        $result->execute($parameters);

        return $result;
    }
}
