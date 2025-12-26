<!DOCTYPE html>
<html>

<head>
    <title>Visitor Appointment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Visitor Appointment Form</h5>
                    </div>

                    <div class="card-body">

                        <!-- Flash Message -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <form method="post" action="<?= base_url('visitor/save'); ?>">

                            <!-- Visitor Name -->
                            <div class="mb-3">
                                <label class="form-label">Visitor Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label class="form-label">Phone No</label>
                                <input type="text" name="phone" maxlength="10" class="form-control" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email ID</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <!-- Purpose -->
                            <div class="mb-3">
                                <label class="form-label">Purpose of Visit</label>
                                <textarea name="purpose" class="form-control" required></textarea>
                            </div>

                            <!-- Host -->
                            <div class="mb-3">
                                <label class="form-label">Whom to Meet</label>
                                <select name="host_id" class="form-control" required>
                                    <option value="">Select Host</option>
                                    <?php foreach ($hosts as $host): ?>
                                        <option value="<?= $host->id ?>">
                                            <?= $host->name ?> (<?= $host->email ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>


                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary px-5">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>