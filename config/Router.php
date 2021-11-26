<?php

namespace App\config;

use App\src\Controller\AuthController;
use App\src\Controller\CustomerController;
use App\src\Controller\InvoiceController;

class Router
{
    private $customerController;
    private $invoiceController;
    private $authController;

    public function __construct()
    {
        $this->customerController = new CustomerController();
        $this->invoiceController = new InvoiceController();
        $this->authController = new AuthController();
    }

    public function run()
    {
        session_start();

        if (!isset($_SESSION['id']) && $_GET['route'] !== "auth/register") {
            $this->authController->login($_POST);
        }

        if (isset($_GET['route'])) {
            if ($_GET['route'] === "fixtures") {
                $this->customerController->loadFixtures();
                $this->invoiceController->loadFixtures();
            } elseif ($_GET['route'] === "dashboard") {
                $this->invoiceController->showInvoices();
            } elseif ($_GET['route'] === "customers") {
                $this->customerController->showCustomers();
            } elseif ($_GET['route'] === "invoices/add") {
                $this->invoiceController->newInvoice($_POST);
            } elseif ($_GET['route'] === "customers/add") {
                $this->customerController->formCustomer($_POST);
            } elseif ($_GET['route'] === "customers/edit") {
                $this->customerController->formCustomer($_POST, $_GET);
            } elseif ($_GET['route'] === "customers/delete") {
                $this->customerController->deleteCustomer($_GET);
            } elseif ($_GET['route'] === "auth/register") {
                $this->authController->register($_POST);
            } elseif ($_GET['route'] === "auth/login") {
                $this->authController->login($_POST);
            } elseif ($_GET['route'] === "auth/logout") {
                $this->authController->logout();
            } else {
                // 404
            }
        } else {
            $this->invoiceController->showInvoices();
        }
    }
}
