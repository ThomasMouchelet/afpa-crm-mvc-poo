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
        // $this->checkIsLogin();
    }

    public function loadFixtures()
    {
        CustomersFixtures::load();
    }

    public function showCustomers()
    {
        $customers = $this->customerRepository->findAll();

        $this->render("customers/customers.html.twig", [
            "customers" => $customers
        ]);
    }

    public function formCustomer($post, $get = null)
    {
        if (isset($get['id'])) {
            $customer = $this->customerRepository->findOne($get['id']);
        } else {
            $customer = new Customer();
        }

        if (isset($post['submit'])) {
            $customer
                ->setEmail($post["email"])
                ->setAddress($post["address"])
                ->setCompanyName($post["companyName"]);

            $this->customerRepository->addCustomer($customer);
            header("Location: ?route=customers");
        }

        if (isset($post['edit'])) {
            $customer
                ->setId($get["id"])
                ->setEmail($post["email"])
                ->setAddress($post["address"])
                ->setCompanyName($post["companyName"]);

            $this->customerRepository->editCustomer($customer);
            header("Location: ?route=customers");
        }

        $this->render("customers/customer_form.html.twig", [
            'customer' => $customer,
            'editMode' => $customer->getId() !== NULL
        ]);
    }

    public function deleteCustomer($get)
    {
        if (isset($get['id'])) {
            $this->customerRepository->delete($get['id']);

            header("Location: ?route=customers");
        }
    }
}
