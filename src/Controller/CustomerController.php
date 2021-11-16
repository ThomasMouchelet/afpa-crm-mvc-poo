<?php

namespace App\src\Controller;

use App\src\DataFixtures\CustomersFixtures;
use App\src\Entity\Customer;
use App\src\Repository\CustomerRepository;

class CustomerController
{
    private $customerRepository;

    public function __construct()
    {
        $this->customerRepository = new CustomerRepository();
    }

    public function loadFixtures()
    {
        CustomersFixtures::load();
    }

    public function getAll()
    {
        // var_dump($this->customerRepository->findAll());
    }

    // public function newCustomer($post)
    // {
    //     $customer = new Customer();
    //     $customer
    //         ->setEmail($post['email'])
    //         ->setAddress($post['address'])
    //         ->setCompanyName($post['companyName']);

    //     $this->customerRepository->addCustomer($customer);
    // }
}
