<?php

namespace App\src\Repository;

use App\src\Entity\Invoice;
use App\src\Repository\ManagerRepository;

class InvoiceRepository extends ManagerRepository
{
    public function addInvoice(object $invoice)
    {
        $sql = 'INSERT INTO invoice (amount, sendingAt, paidFor, status, customer_id, user_id) VALUES (?, ?, ?, ?, ?, ?)';
        $this->createQuery($sql, [
            $invoice->getAmount(),
            $invoice->getSendingAt(),
            $invoice->getPaidFor(),
            $invoice->getStatus(),
            $invoice->getCustomer_id(),
            $invoice->getUser_id()
        ]);
    }
}
