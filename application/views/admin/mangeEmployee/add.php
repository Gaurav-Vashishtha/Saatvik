<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Add Employee</h5>
    </div>

    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>

        <form method="post" enctype="multipart/form-data">

            <div class="row">

               <div class="col-md-6 mb-3">
                <label class="form-label">Salutation</label>
                <select name="salutation" class="form-select">
                <option value="">Select</option>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
                <option value="Dr">Dr</option>
                </select>
               </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Full Name *</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date Of Joining</label>
                    <input type="date" name="date_of_joining" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Marital Status</label>
                    <select name="marital_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Anniversary Date</label>
                    <input type="date" name="anniversary_date" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Email *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Phone *</label>
                    <input type="text" name="phone" maxlength="10" pattern="[0-9]{10}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Designation</label>
                    <input type="text" name="designation" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Department</label>
                    <input type="text" name="department" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Location Name</label>
                    <input type="text" name="location_name" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Remark</label>
                    <textarea name="remark" class="form-control"></textarea>
                </div>

                <!-- <div class="col-md-4 mb-3">
                    <label class="form-label ">City</label>
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label ">State</label>
                    <input type="text" name="state" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label ">Pincode</label>
                    <input type="text" name="pincode" class="form-control">
                </div> -->

                <div class="col-md-6 mb-3">
                    <label class="form-label ">
                        Image <small>(Max size: 2MB | 200×200 | JPG/PNG/JPEG/WEBP)</small>
                    </label>
                    <input type="file" name="employee_image" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label ">Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>

            <div class="text-end">
                <a href="<?php echo base_url('admin/employee'); ?>" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Employee</button>
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