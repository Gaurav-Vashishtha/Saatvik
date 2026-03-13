<div class="container-fluid mt-4">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                </div>

                <div class="card-body">

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

                    <?= form_open('admin/change_password'); ?>

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control">
                            <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                            <?= form_error('new_password', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                            <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            Change Password
                        </button>

                        <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-success w-100 mt-2">
                            Back
                        </a>

                    <?= form_close(); ?>

                </div>
            </div>

        </div>
    </div>

</div>