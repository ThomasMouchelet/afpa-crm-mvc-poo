<?php

namespace App\src\Controller;

use App\src\DataFixtures\InvoicesFixtures;

class InvoiceController
{
    public function loadFixtures()
    {
        InvoicesFixtures::load();
    }

    public function showInvoices()
    {
        // repo->findAll()
        // dashboad
    }
}
