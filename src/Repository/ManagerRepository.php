<?php

namespace App\src\Repository;

use PDO;
use Exception;
use App\src\Entity\Customer;

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

    // public function findAll()
    // {

    //     $entity = $this->getEntityName();

    //     $class = "Customer";

    //     $entityObject = new $class;
    //     var_dump($entityObject);
    //     die();

    //     $result = $this->createQuery("SELECT * FROM $entity");
    //     $arrayEntity = [];

    //     foreach ($result as $row) {
    //         $ucfirst = ucfirst($entity);
    //         $entity = new App\src\Entity\Customer;
    //         $entity = $this->buildObject($row);
    //         array_push($arrayEntity, $entity);
    //     }

    //     return $arrayEntity;
    // }

    public function getEntityName()
    {
        $explode = explode('\\', static::class);
        $classnameRepo = $explode[count($explode) - 1];
        $entityName = str_replace('Repository', '', $classnameRepo);
        // $entityName = strtolower($entityName);
        return $entityName;
    }
}
