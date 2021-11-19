<?php $this->title = "Dashboard"; ?>

<a href="?route=invoices/add" class="btn btn-primary">Add new invoices</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Sending At</th>
            <th scope="col">Paid For</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <th scope="row">xxxx</th>
                <td><?= htmlspecialchars($invoice->getAmount()) ?></td>
                <td><?= htmlspecialchars($invoice->getSendingAt()) ?></td>
                <td><?= htmlspecialchars($invoice->getPaidFor()) ?></td>
                <td><?= htmlspecialchars($invoice->getStatus()) ?></td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>