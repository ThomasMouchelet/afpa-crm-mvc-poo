<?php

namespace App\src\Controller;

use App\src\DataFixtures\CustomersFixtures;
use App\src\Entity\Customer;
use App\src\Repository\CustomerRepository;
use App\src\Controller\AbstractController;

class CustomerController extends AbstractController
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

    public function showCustomers()
    {
        $customers = $this->customerRepository->findAll();

        $this->render("customers", [
            "customers" => $customers
        ]);
    }
}
