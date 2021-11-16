<?php

namespace App\src\DataFixtures;

use App\src\Entity\Invoice;
use App\src\Repository\InvoiceRepository;

const STATUS = ["PAID", "SEND", "CANCEL"];

class InvoicesFixtures
{
    public static function load()
    {
        $invoiceRepository = new InvoiceRepository();
        $invoiceRepository->removeAll();

        for ($i = 0; $i < 10; $i++) {
            $invoice = new Invoice();
            $invoice
                ->setAmount(rand(100, 10000))
                ->setSendingAt(date("Y-m-d"))
                ->setPaidFor(date("Y-m-d", strtotime("+" . rand(1, 365) . " days")))
                ->setStatus(STATUS[rand(0, 2)]);

            $invoiceRepository->addInvoice($invoice);
        }
    }
}
