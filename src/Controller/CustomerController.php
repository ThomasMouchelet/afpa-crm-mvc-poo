<?php

namespace App\src\Controller;

use App\src\DataFixtures\CustomersFixtures;

class CustomerController
{
    public function loadFixtures()
    {
        $customersFixtures = new CustomersFixtures();
        $customersFixtures->load();
    }
}
