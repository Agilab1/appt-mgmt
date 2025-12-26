<div class="container mt-5">
    <h4>Visitor Status</h4>

    <p><strong>Name:</strong> <?= $visitor->name ?></p>
    <p><strong>Purpose:</strong> <?= $visitor->purpose ?></p>

    <?php if ($visitor->status == 'Pending'): ?>
        <div class="alert alert-warning">
            ⏳ Your request is Pending. Please wait.
        </div>

    <?php elseif ($visitor->status == 'Approved'): ?>
        <div class="alert alert-success">
            Your request is Approved. You may enter.
        </div>

    <?php elseif ($visitor->status == 'Rejected'): ?>
        <div class="alert alert-danger">
             Your request is Rejected. Please contact host.
        </div>
    <?php endif; ?>
</div>
