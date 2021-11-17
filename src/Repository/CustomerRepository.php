<?php

namespace App\src\Repository;

use App\src\Entity\Customer;
use App\src\Repository\ManagerRepository;

class CustomerRepository extends ManagerRepository
{
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
}
