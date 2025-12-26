<!DOCTYPE html>
<html>

<head>
    <title>Host Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h4 class="mb-3">Visitor Requests</h4>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitors as $v): ?>
                    <tr>
                        <td><?= $v->name ?></td>
                        <td><?= $v->phone ?></td>
                        <td><?= $v->purpose ?></td>
                        <td>
                            <span class="badge bg-info"><?= $v->status ?></span>
                        </td>
                        <td>
                            <?php if ($v->status == 'Pending'): ?>
                                <a href="<?= base_url('host/update_status/' . $v->id . '/Approved') ?>"
                                    class="btn btn-success btn-sm">Approve</a>

                                <a href="<?= base_url('host/update_status/' . $v->id . '/Rejected') ?>"
                                    class="btn btn-danger btn-sm">Reject</a>

                            <?php else: ?>
                                ---
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>