<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Admin User</h5>
    </div>

    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>

        <form method="post" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Salutation*</label>
                    <select name="salutation" class="form-select" required>
                        <option value="">Select</option>
                        <option value="Mr" <?= ($hr->salutation=='Mr')?'selected':''; ?>>Mr</option>
                        <option value="Ms" <?= ($hr->salutation=='Ms')?'selected':''; ?>>Ms</option>
                        <option value="Mrs" <?= ($hr->salutation=='Mrs')?'selected':''; ?>>Mrs</option>
                        <option value="Dr" <?= ($hr->salutation=='Dr')?'selected':''; ?>>Dr</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control"
                        value="<?= set_value('full_name', $hr->full_name); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control"
                        value="<?= htmlspecialchars($hr->role_name); ?>" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Password (Leave blank if not changing)
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>

                 <div class="form-group col-md-6">
                        <label>Employee ID</label>
                        <input type="text" 
                            name="employee_code" 
                            class="form-control" 
                            value="<?= isset($hr->employee_code) ? $hr->employee_code : '' ?>" 
                            readonly>
                    </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control"
                        value="<?= set_value('company_name', $hr->company_name); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date Of Joining</label>
                    <input type="date" name="date_of_joining" class="form-control"
                        value="<?= set_value('date_of_joining', $hr->date_of_joining); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control"
                        value="<?= set_value('date_of_birth', $hr->date_of_birth); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-control"
                        value="<?= set_value('age', $hr->age); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Marital Status</label>
                    <select name="marital_status" id="marital_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Single" <?= ($hr->marital_status=='Single')?'selected':''; ?>>Single</option>
                        <option value="Married" <?= ($hr->marital_status=='Married')?'selected':''; ?>>Married</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3" id="anniversary_section">
                    <label class="form-label">Anniversary Date</label>
                    <input type="date" name="anniversary_date" class="form-control"
                        value="<?= set_value('anniversary_date', $hr->anniversary_date); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= ($hr->gender=='Male')?'selected':''; ?>>Male</option>
                        <option value="Female" <?= ($hr->gender=='Female')?'selected':''; ?>>Female</option>
                        <option value="Other" <?= ($hr->gender=='Other')?'selected':''; ?>>Other</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control"
                        value="<?= set_value('email', $hr->email); ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone *</label>
                    <input type="text" name="phone" maxlength="10" pattern="[0-9]{10}"
                        class="form-control"
                        value="<?= set_value('phone', $hr->phone); ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control"
                        value="<?= set_value('designation', $hr->designation); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" class="form-control"
                        value="<?= set_value('department', $hr->department); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Location Name</label>
                    <input type="text" name="location_name" class="form-control"
                        value="<?= set_value('location_name', $hr->location_name); ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Remark</label>
                    <textarea name="remark" class="form-control"><?= set_value('remark', $hr->remark); ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Image <small>(Max size: 2MB | 200×200)</small>
                    </label>
                    <input type="file" name="image" class="form-control">
                    <?php if ($hr->image): ?>
                        <img src="<?= base_url('uploads/hr/'.$hr->image); ?>" width="120" class="mt-2">
                    <?php endif; ?>
                </div>

                    <div class="col-md-6">
                        <label class="form-label ">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" <?php echo ($hr->is_active == 1) ? 'selected' : ''; ?>>
                                Active
                            </option>
                            <option value="0" <?php echo ($hr->is_active == 0) ? 'selected' : ''; ?>>
                                Inactive
                            </option>
                        </select>
                    </div>

            </div>

            <div class="text-end">
                <a href="<?php echo base_url('admin/manage-hr'); ?>" class="btn btn-secondary me-2">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const maritalStatus = document.getElementById("marital_status");
    const anniversarySection = document.getElementById("anniversary_section");

    function toggleAnniversary() {
        anniversarySection.style.display =
            maritalStatus.value === "Married" ? "block" : "none";
    }

    toggleAnniversary();
    maritalStatus.addEventListener("change", toggleAnniversary);
});
</script>