<?php $this->title = "Customers"; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Email</th>
            <th scope="col">Invoices</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= htmlspecialchars($customer->getCompanyName()) ?></td>
                <td><?= htmlspecialchars($customer->getEmail()) ?></td>
                <td>xxxx</td>
                <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>