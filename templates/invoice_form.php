<?php $this->title = "Add new invoice"; ?>

<form class="mt-5" method="post" action="?route=invoices/add">
    <div class="mb-3">
        <input type="number" class="form-control" name="amount">
    </div>
    <div class="mb-3">
        <input type="date" class="form-control" name="sendingAt">
    </div>
    <div class="mb-3">
        <input type="date" class="form-control" name="paidFor">
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Open this select menu</option>
            <option value="SEND">SEND</option>
            <option value="PAID">PAID</option>
            <option value="CANCEL">CANCEL</option>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
</form>