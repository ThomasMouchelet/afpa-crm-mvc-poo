<?php

namespace App\config;

use App\src\Controller\CustomerController;
use App\src\Controller\InvoiceController;

class Router
{
    private $customerController;
    private $invoiceController;

    public function __construct()
    {
        $this->customerController = new CustomerController();
        $this->invoiceController = new InvoiceController();
    }

    public function run()
    {
        if (isset($_GET['route'])) {
            if ($_GET['route'] === "fixtures") {
                $this->customerController->loadFixtures();
                $this->invoiceController->loadFixtures();
            } elseif ($_GET['route'] === "dashboard") {
                $this->invoiceController->showInvoices();
            } elseif ($_GET['route'] === "customers") {
                $this->customerController->showCustomers();
            } elseif ($_GET['route'] === "newInvoice") {
                $this->invoiceController->newInvoice();
            }
        }
    }
}
