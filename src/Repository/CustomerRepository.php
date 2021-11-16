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

    public function removeAll()
    {
        $sql = 'DELETE FROM customer';
        $this->createQuery($sql);
    }
}
