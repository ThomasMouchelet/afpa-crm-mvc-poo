<?php

namespace App\config;

use App\src\Controller\CustomerController;

class Router
{
    private $customerController;

    public function __construct()
    {
        $this->customerController = new CustomerController();
    }

    public function run()
    {
        if (isset($_GET['route'])) {
            if ($_GET['route'] === "customers_fixtures") {
                $this->customerController->loadFixtures();
            } else {
                var_dump('Errorr');
            }
        }
    }
}
