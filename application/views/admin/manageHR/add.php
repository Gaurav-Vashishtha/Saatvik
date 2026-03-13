<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header ">
            <h5 class="mb-0 fw-bold">Add HR</h5>
        </div>

        <div class="card-body">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="post" enctype="multipart/form-data">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">First Name *</label>
                        <input type="text"
                               name="first_name"
                               class="form-control"
                               value="<?php echo set_value('first_name'); ?>"
                               placeholder="Enter First Name"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Last Name *</label>
                        <input type="text"
                               name="last_name"
                               class="form-control"
                               value="<?php echo set_value('last_name'); ?>"
                               placeholder="Enter Last Name"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="<?php echo set_value('email'); ?>"
                               placeholder="Enter Email"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone No. *</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               maxlength="10"
                               pattern="[0-9]{10}"
                               value="<?php echo set_value('phone'); ?>"
                               placeholder="Enter 10 Digit Phone Number"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Password *</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter Password"
                               required>
                    </div>
                    
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Marital Status</label>
                    <select name="marital_status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Anniversary Date</label>
                    <input type="date" name="anniversary_date" class="form-control">
                </div>
                 <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Department</label>
                    <input type="text" name="department" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="address" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        Image <small>(Max size: 2MB | 200×200 | JPG/PNG/JPEG/WEBP)</small>
                    </label>
                    <input type="file" name="image" class="form-control">
                </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end">
                    <a href="<?php echo base_url('admin/manage-hr'); ?>"
                       class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-success">
                        Save HR
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>