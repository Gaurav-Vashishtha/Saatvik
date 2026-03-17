<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Employee</h5>
    </div>

    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>

        <form method="post" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label ">First Name *</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           value="<?php echo set_value('first_name', $employee->first_name); ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Last Name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           value="<?php echo set_value('last_name', $employee->last_name); ?>">
                </div>

                <div class="form-group col-md-6">
                        <label>Employee ID</label>
                        <input type="text" 
                            name="employee_code" 
                            class="form-control" 
                            value="<?= isset($employee->employee_code) ? $employee->employee_code : '' ?>" 
                            readonly>
                    </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label ">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo ($employee->gender=='Male')?'selected':''; ?>>Male</option>
                        <option value="Female" <?php echo ($employee->gender=='Female')?'selected':''; ?>>Female</option>
                        <option value="Other" <?php echo ($employee->gender=='Other')?'selected':''; ?>>Other</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           class="form-control"
                           value="<?php echo set_value('date_of_birth', $employee->date_of_birth); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Marital Status</label>
                    <select name="marital_status" id="marital_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Single" <?php echo ($employee->marital_status=='Single')?'selected':''; ?>>Single</option>
                        <option value="Married" <?php echo ($employee->marital_status=='Married')?'selected':''; ?>>Married</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3" id="anniversary_section">
                    <label class="form-label ">Anniversary Date</label>
                    <input type="date"
                           name="anniversary_date"
                           class="form-control"
                           value="<?php echo set_value('anniversary_date', $employee->anniversary_date); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Email *</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?php echo set_value('email', $employee->email); ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Phone *</label>
                    <input type="text"
                           name="phone"
                           maxlength="10"
                           pattern="[0-9]{10}"
                           class="form-control"
                           value="<?php echo set_value('phone', $employee->phone); ?>"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Designation</label>
                    <input type="text"
                           name="designation"
                           class="form-control"
                           value="<?php echo set_value('designation', $employee->designation); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Department</label>
                    <input type="text"
                           name="department"
                           class="form-control"
                           value="<?php echo set_value('department', $employee->department); ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label ">Address</label>
                    <textarea name="address" class="form-control"><?php echo set_value('address', $employee->address); ?></textarea>
                </div>

                <!-- <div class="col-md-4 mb-3">
                    <label class="form-label ">City</label>
                    <input type="text"
                           name="city"
                           class="form-control"
                           value="<?php echo set_value('city', $employee->city); ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label ">State</label>
                    <input type="text"
                           name="state"
                           class="form-control"
                           value="<?php echo set_value('state', $employee->state); ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label ">Pincode</label>
                    <input type="text"
                           name="pincode"
                           class="form-control"
                           value="<?php echo set_value('pincode', $employee->pincode); ?>">
                </div> -->

                <div class="col-md-6 mb-3">
                    <label class='form-label '>Image <small>(Max size: 2MB | 200x200 | JPG/PNG/JPEG/WEBP)</small></label>
                    <input type="file" name="employee_image" class="form-control">
                    <?php if ($employee->employee_image): ?>
                        <img src="<?= base_url('uploads/employee/'.$employee->employee_image); ?>" width="120" class="mt-2">
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1" <?php echo ($employee->is_active == 1) ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo ($employee->is_active == 0) ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="text-end">
                <a href="<?php echo base_url('admin/employee'); ?>" class="btn btn-secondary me-2">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    Update Employee
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