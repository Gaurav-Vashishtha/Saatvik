<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header ">
            <h5 class="mb-0 ">Edit Admin User</h5>
        </div>

        <div class="card-body">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="post" enctype="multipart/form-data">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label ">First Name *</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               value="<?php echo set_value('first_name', $hr->first_name); ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Last Name *</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               value="<?php echo set_value('last_name', $hr->last_name); ?>"
                               required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label ">Role</label>
                        <input type="text" class="form-control" 
                            value="<?php echo htmlspecialchars($hr->role_name); ?>" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Employee ID</label>
                        <input type="text" 
                            name="employee_code" 
                            class="form-control" 
                            value="<?= isset($hr->employee_code) ? $hr->employee_code : '' ?>" 
                            readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Email *</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="<?php echo set_value('email', $hr->email); ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Phone *</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               maxlength="10"
                               pattern="[0-9]{10}"
                               value="<?php echo set_value('phone', $hr->phone); ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">
                            Password (Leave blank if not changing)
                        </label>
                        <input type="password"
                               name="password"
                               class="form-control">
                    </div>

                       <div class="col-md-6 mb-3">
                    <label class="form-label ">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo ($hr->gender=='Male')?'selected':''; ?>>Male</option>
                        <option value="Female" <?php echo ($hr->gender=='Female')?'selected':''; ?>>Female</option>
                        <option value="Other" <?php echo ($hr->gender=='Other')?'selected':''; ?>>Other</option>
                    </select>
                </div>



                <div class="col-md-6 mb-3">
                    <label class="form-label ">Marital Status</label>
                    <select name="marital_status" id="marital_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Single" <?php echo ($hr->marital_status=='Single')?'selected':''; ?>>Single</option>
                        <option value="Married" <?php echo ($hr->marital_status=='Married')?'selected':''; ?>>Married</option>
                    </select>
                </div>

               <div class="col-md-6 mb-3" id="anniversary_section">
                    <label class="form-label ">Anniversary Date</label>
                    <input type="date"
                           name="anniversary_date"
                           class="form-control"
                           value="<?php echo set_value('anniversary_date', $hr->anniversary_date); ?>">
                </div>


                 <div class="col-md-6 mb-3">
                    <label class="form-label ">Date of Birth</label>
                    <input type="date"
                           name="date_of_birth"
                           class="form-control"
                           value="<?php echo set_value('date_of_birth', $hr->date_of_birth); ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Department</label>
                    <input type="text"
                           name="department"
                           class="form-control"
                           value="<?php echo set_value('department', $hr->department); ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label ">Address</label>
                    <textarea name="address" class="form-control"><?php echo set_value('address', $hr->address); ?></textarea>
                </div>

               <div class="col-md-6 mb-3">
                    <label class='form-label '>Image <small>(Max size: 2MB | 200x200 | JPG/PNG/JPEG/WEBP)</small></label>
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

                <hr class="my-4">

                <div class="d-flex justify-content-end">
                    <a href="<?php echo base_url('admin/manage-hr'); ?>"
                       class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update 
                    </button>
                </div>

            </form>

        </div>
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