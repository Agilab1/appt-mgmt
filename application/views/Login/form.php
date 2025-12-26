<hr>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Office User Registration</h5>
                </div>

                <div class="card-body">

                    <!-- Flash Messages -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <!-- FORM (UI SAME) -->
                    <form id="userForm" method="post" action="<?= base_url('user/register'); ?>">

                        <!-- CSRF -->
                        <input type="hidden"
                            name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>">

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email ID</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                value="<?= set_value('email'); ?>"
                                required>
                        </div>

                        <!-- Username & Phone -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Name</label>
                                <input type="text"
                                    name="username"
                                    class="form-control"
                                    value="<?= set_value('username'); ?>"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone No</label>
                                <input type="tel"
                                    name="phone"
                                    class="form-control"
                                    maxlength="10"
                                    value="<?= set_value('phone'); ?>"
                                    required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password"
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password"
                                    name="confirm_password"
                                    class="form-control"
                                    id="confirmPassword"
                                    required>
                            </div>
                        </div>

                        <!-- Role & Status -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Role</label>
                                <select class="form-control"
                                    id="role"
                                    name="role"
                                    required>
                                    <option value="">Select Role</option>
                                    <option value="Admin" <?= set_select('role', 'Admin'); ?>>Admin</option>
                                    <option value="Host" <?= set_select('role', 'Host'); ?>>Host</option>
                                    <option value="Visitors" <?= set_select('role', 'Visitors'); ?>>Visitors</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Status</label>
                                <select class="form-control"
                                    name="status"
                                    required>
                                    <option value="">Select Status</option>
                                    <option value="Active" <?= set_select('status', 'Active'); ?>>Active</option>
                                    <option value="Inactive" <?= set_select('status', 'Inactive'); ?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Type & Admin -->
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">User Type</label>
                                <select class="form-control" name="user_type">
                                    <option value="">Select Type</option>
                                    <option value="Employee" <?= set_select('user_type', 'Employee'); ?>>Employee</option>
                                    <option value="Security" <?= set_select('user_type', 'Security'); ?>>Security</option>
                                    <option value="Visitors" <?= set_select('user_type', 'Visitors'); ?>>Visitors</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label d-block">Is Admin?</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        id="isAdmin"
                                        name="is_admin"
                                        value="1"
                                        <?= set_checkbox('is_admin', '1'); ?>>
                                    <label class="form-check-label">Yes</label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                Save
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <small>User already exists?
                                <a href="<?= base_url('login'); ?>">Sign In</a>
                            </small>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const role = document.getElementById('role');
    const isAdmin = document.getElementById('isAdmin');

    role.addEventListener('change', function() {
        if (this.value === 'Admin') {
            isAdmin.checked = true;
            isAdmin.disabled = true;
        } else {
            isAdmin.checked = false;
            isAdmin.disabled = false;
        }
    });
</script>