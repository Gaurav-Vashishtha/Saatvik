<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Apps</h5>

        <?php if(checkPermission('admin/manage-apps','add')): ?>
            <a href="<?= site_url('admin/manage-apps/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover datatable">

            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>App Name</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($apps)): $i = 1; ?>
                    <?php foreach ($apps as $app): ?>

                        <tr>
                            <td><?= $i++ ?></td>

                            <td>
                                <img src="<?= base_url('uploads/apps/' . $app->image) ?>" width="60">
                            </td>

                            <td><?= $app->title ?></td>

                            <td><?= $app->app_name ?></td>

                            <td>
                                <?php if ($app->status == 1): ?>
                                    <?php if(checkPermission('admin/manage-apps','edit')): ?>
                                        <a href="<?= site_url('admin/manage-apps/toggle/' . $app->id) ?>" class="badge bg-success px-3 py-2 text-decoration-none">Active</a>
                                    <?php else: ?>
                                        <span class="badge bg-success px-3 py-2">Active</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(checkPermission('admin/manage-apps','edit')): ?>
                                        <a href="<?= site_url('admin/manage-apps/toggle/' . $app->id) ?>" class="badge bg-danger px-3 py-2 text-decoration-none">Inactive</a>
                                    <?php else: ?>
                                        <span class="badge bg-danger px-3 py-2">Inactive</span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>

                            <td>

                                <?php if(checkPermission('admin/manage-apps','edit')): ?>
                                    <a href="<?= site_url('admin/manage-apps/edit/'.$app->id); ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if(checkPermission('admin/manage-apps','delete')): ?>
                                    <a href="<?= site_url('admin/manage-apps/delete/'.$app->id); ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>

                    <tr>
                        <td colspan="6" class="text-center">No Apps Found</td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>
    </div>

</div>