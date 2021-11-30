<?php

namespace App\src\Controller;

use App\src\DataFixtures\InvoicesFixtures;
use App\src\Entity\Invoice;
use App\src\Repository\CustomerRepository;
use App\src\Repository\InvoiceRepository;
use App\src\Controller\AbstractController;

class InvoiceController extends AbstractController
{
    private $invoiceRepository;
    private $customerRepository;

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
        $this->customerRepository = new CustomerRepository();
        // $this->checkIsLogin();
    }

    public function loadFixtures()
    {
        InvoicesFixtures::load();
    }

    public function showInvoices()
    {
        $invoices = $this->invoiceRepository->findAll();

        $this->render("dashboard.html.twig", [
            'invoices' => $invoices
        ]);
    }

    public function newInvoice($post)
    {
        if (isset($post['submit'])) {
            $invoice = new Invoice();
            $invoice
                ->setAmount($post["amount"])
                ->setSendingAt($post["sendingAt"])
                ->setPaidFor($post["paidFor"])
                ->setStatus($post["status"]);

            $this->invoiceRepository->addInvoice($invoice);
            header("Location: ?route=dashboard");
        }

        $customers = $this->customerRepository->findAll();

        $this->render("invoices/invoice_form.html.twig", [
            'customers' => $customers
        ]);
    }
}
