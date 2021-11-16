<?php

namespace App\src\DataFixtures;

use App\src\Entity\Customer;
use App\src\Repository\CustomerRepository;

class CustomersFixtures
{
    public static function load()
    {
        for ($i = 0; $i < 10; $i++) {
            $customer = new Customer();
            $customer
                ->setEmail("customer$i@email.com")
                ->setAddress("address $i")
                ->setCompanyName("companyName$i");

            $repo = new CustomerRepository();
            $repo->addCustomer($customer);
        }
    }
}
