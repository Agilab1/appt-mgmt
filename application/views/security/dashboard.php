<!DOCTYPE html>
<html>

<head>
    <title>Security Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h4 class="mb-3">Visitor Status</h4>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Gate Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($visitors as $v): ?>
                    <tr>
                        <td><?= $v->name ?></td>
                        <td><?= $v->phone ?></td>
                        <td><?= $v->purpose ?></td>
                        <td><?= $v->status ?></td>
                        <td>
                            <?php if ($v->status == 'Approved'): ?>
                                <span class="badge bg-success">ALLOW</span>
                            <?php elseif ($v->status == 'Rejected'): ?>
                                <span class="badge bg-danger">DENY</span>
                            <?php else: ?>
                                <span class="badge bg-warning">WAIT</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>