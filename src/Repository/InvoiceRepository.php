<?php

namespace App\src\Repository;

use App\src\Entity\Invoice;
use App\src\Repository\ManagerRepository;

class InvoiceRepository extends ManagerRepository
{
    public function buildObject($row)
    {
        $invoice = new Invoice();
        $invoice
            ->setId($row->id)
            ->setAmount($row->amount)
            ->setSendingAt($row->sendingAt)
            ->setPaidFor($row->paidFor)
            ->setStatus($row->status)
            ->setCustomer_id($row->customer_id)
            ->setUser_id($row->user_id);

        return $invoice;
    }

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

    public function findAll()
    {
        // SELECT * FROM ....
    }

    public function removeAll()
    {
        $sql = 'DELETE FROM invoice';
        $this->createQuery($sql);
    }
}
