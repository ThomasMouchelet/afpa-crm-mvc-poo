<?php

namespace App\src\Repository;

use PDO;
use Exception;

class ManagerRepository
{
    public $connection;

    public function buildObject($row)
    {
        $entityNameSpace = $this->getEntityNameSpace();
        $entity = new $entityNameSpace;

        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);

            if ($key !== "connection") {
                $entity->$method($value);
            }
        }

        return $entity;
    }

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

    public function getRepositoryClassName()
    {
        $staticClass = static::class;
        $explode = explode('\\', $staticClass);
        $className = end($explode);

        return $className;
    }

    public function getTableName()
    {
        $repositoryClassName = $this->getRepositoryClassName();
        $tableName = strToLower(str_replace("Repository", "", $repositoryClassName));
        return $tableName;
    }

    public function getEntityNameSpace()
    {
        $repositoryClassName = $this->getRepositoryClassName();
        $entityName = str_replace("Repository", "", $repositoryClassName);
        $entityNameSpace = "App\\src\\Entity\\$entityName";

        return $entityNameSpace;
    }



    public function findAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM $tableName";
        $result = $this->createQuery($sql);
        $entities = [];

        foreach ($result as $row) {
            $entity = $this->buildObject($row);
            array_push($entities, $entity);
        }

        return $entities;
    }

    public function removeAll()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM $tableName";
        $this->createQuery($sql);
    }
}
