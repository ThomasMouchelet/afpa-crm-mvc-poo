<?php

namespace App\src\Repository;

use App\src\Entity\Customer;
use App\src\Repository\ManagerRepository;

class CustomerRepository extends ManagerRepository
{

    public function buildObject($row)
    {
        $customer = new Customer();
        $customer
            ->setId($row->id)
            ->setEmail($row->email)
            ->setAddress($row->address)
            ->setCompanyName($row->companyName)
            ->setUser_id($row->user_id);

        return $customer;
    }

    public function addCustomer(object $customer)
    {
        $sql = 'INSERT INTO customer (email, address, companyName, user_id) VALUES (?, ?, ?, ?)';
        $this->createQuery($sql, [
            $customer->getEmail(),
            $customer->getAddress(),
            $customer->getCompanyName(),
            $customer->getUser_id()
        ]);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->createQuery($sql);
        $customers = [];

        foreach ($result as $row) {
            $customer = $this->buildObject($row);
            array_push($customers, $customer);
        }

        return $customers;
    }

    public function removeAll()
    {
        $sql = 'DELETE FROM customer';
        $this->createQuery($sql);
    }
}
