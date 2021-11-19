<?php $this->title = "Add new customer"; ?>

<h1>Add new Customer</h1>

<form class="mt-5" method="post" action="?route=customers/add">
    <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="email">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="address">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="companyName" placeholder="companyName">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
</form>