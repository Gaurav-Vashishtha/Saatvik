
<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header">
            <h5 class="mb-0 ">Edit App</h5>
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
                               value="<?php echo set_value('title', $app->title); ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">App Name *</label>
                        <input type="text"
                               name="app_name"
                               class="form-control"
                               value="<?php echo set_value('app_name', $app->app_name); ?>"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">
                            Image <small>(Max size: 2MB | JPG/PNG/JPEG/WEBP)</small>
                        </label>

                        <input type="file" name="image" class="form-control">

                        <?php if(!empty($app->image)) { ?>
                            <img src="<?= base_url('uploads/apps/'.$app->image); ?>"
                                 width="120"
                                 class="mt-2 rounded border">
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Status</label>

                        <select name="status" class="form-select">
                            <option value="1" <?= ($app->status == 1) ? 'selected' : '' ?>>
                                Active
                            </option>
                            <option value="0" <?= ($app->status == 0) ? 'selected' : '' ?>>
                                Inactive
                            </option>
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
                        Update App
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>