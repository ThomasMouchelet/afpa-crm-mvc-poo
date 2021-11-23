<?php $this->title =  $editMode ? "Edit" : "Add new" . " customer"; ?>

<h1><?= $editMode ? "Edit" : "Add new" ?> Customer</h1>

<form class="mt-5" method="post">
    <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="email" value="<?= htmlspecialchars($customer->getEmail()); ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="address" value="<?= htmlspecialchars($customer->getAddress()); ?>">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" name="companyName" placeholder="companyName" value="<?= htmlspecialchars($customer->getCompanyName()); ?>">
    </div>
    <?php if ($editMode) : ?>
        <input type="submit" class="btn btn-primary" name="edit" value="edit">
    <?php else : ?>
        <input type="submit" class="btn btn-primary" name="submit" value="add">
    <?php endif ?>
</form>