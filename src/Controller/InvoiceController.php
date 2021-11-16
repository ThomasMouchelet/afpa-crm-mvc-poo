<?php

namespace App\src\Controller;

use App\src\DataFixtures\InvoicesFixtures;
use App\src\Repository\InvoiceRepository;

class InvoiceController
{
    private $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository();
    }

    public function loadFixtures()
    {
        InvoicesFixtures::load();
    }

    public function showInvoices()
    {
        $invoices = $this->invoiceRepository->findAll();

        require_once "../templates/dashboard.php";
    }
}
