<div class="container-fluid mt-4">


<div class="card shadow-sm border">

    <div class="card-header">
        <h5 class="mb-0 ">Add App</h5>
    </div>

    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form method="post" enctype="multipart/form-data">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label ">Title *</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="<?php echo set_value('title'); ?>"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label ">App Name *</label>
                    <input type="text"
                           name="app_name"
                           class="form-control"
                           value="<?php echo set_value('app_name'); ?>"
                           required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label ">Document Link (Optional)</label>
                    <input type="url" 
                        name="document_link" 
                        class="form-control"
                        placeholder="https://example.com/policy.pdf">
                </div>

                <div class="col-md-6">
                    <label class="form-label ">
                        Image <small>(Max size: 2MB | 200×200 | JPG/PNG/JPEG/WEBP)</small>
                    </label>

                    <input type="file"
                           name="image"
                           accept=".jpg,.jpeg,.png,.webp"
                           class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label ">Status</label>

                    <select name="status" class="form-select">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">

                <a href="<?= site_url('admin/manage-apps') ?>"
                   class="btn btn-outline-secondary me-2">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Save App
                </button>

            </div>

        </form>

    </div>
</div>


</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.addEventListener("change", function(e) {

            if (e.target.type === "file") {

                const file = e.target.files[0];
                if (!file) return;

                const maxSize = 2 * 1024 * 1024;

                if (file.size > maxSize) {
                    alert("File must be less than 2MB");
                    e.target.value = "";
                }
            }

        });

    });
</script>
