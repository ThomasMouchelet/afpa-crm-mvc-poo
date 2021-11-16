<?php

namespace App\src\DataFixtures;

use App\src\Entity\Customer;
use App\src\Repository\CustomerRepository;

class CustomersFixtures
{
    public static function load()
    {
        $customerRepository = new CustomerRepository();
        $customerRepository->removeAll();

        for ($i = 1; $i <= 10; $i++) {
            $customer = new Customer();
            $customer
                ->setEmail("customer$i@email.com")
                ->setAddress("address $i")
                ->setCompanyName("companyName$i");

            $customerRepository->addCustomer($customer);
        }
    }
}
