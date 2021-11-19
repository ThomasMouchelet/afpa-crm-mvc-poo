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

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
        $this->customerRepository = new CustomerRepository();
    }

    public function loadFixtures()
    {
        InvoicesFixtures::load();
    }

    public function showInvoices()
    {
        $invoices = $this->invoiceRepository->findAll();

        $this->render("dashboard", [
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

        $this->render("invoice_form");
    }
}