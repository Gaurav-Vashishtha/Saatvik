<div class="container-fluid mt-4">

<div class="card shadow-sm border">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Leadership</h5>

        <?php if(checkPermission('admin/manage-leadership','add')): ?>
        <a href="<?= site_url('admin/manage-leadership/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add Leadership
        </a>
        <?php endif; ?>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle datatable">

                <thead class="bg-light">
                    <tr>
                        <th width="60">S no.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th width="120">Status</th>
                        <th width="200" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(!empty($leaders)): $i = 1; foreach($leaders as $leader): ?>

                        <tr>

                            <td><?= $i++; ?></td>

                            <td><?= $leader->name; ?></td>

                            <td><?= $leader->designation; ?></td>

                            <td>
                                <?php if(!empty($leader->image)): ?>
                                    <img src="<?= base_url('uploads/leadership/'.$leader->image); ?>" width="50">
                                <?php endif; ?>
                            </td>

                            <td>

                                <?php if($leader->status == 1): ?>

                                    <?php if(checkPermission('admin/manage-leadership','edit')): ?>
                                        <a href="<?= site_url('admin/manage-leadership/toggle/'.$leader->id); ?>"
                                           class="badge bg-success text-decoration-none px-3 py-2">
                                           Active
                                        </a>
                                    <?php else: ?>
                                        <span class="badge bg-success px-3 py-2">Active</span>
                                    <?php endif; ?>

                                <?php else: ?>

                                    <?php if(checkPermission('admin/manage-leadership','edit')): ?>
                                        <a href="<?= site_url('admin/manage-leadership/toggle/'.$leader->id); ?>"
                                           class="badge bg-danger text-decoration-none px-3 py-2">
                                           Inactive
                                        </a>
                                    <?php else: ?>
                                        <span class="badge bg-danger px-3 py-2">Inactive</span>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <?php if(checkPermission('admin/manage-leadership','edit')): ?>
                                    <a href="<?= site_url('admin/manage-leadership/edit/'.$leader->id); ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if(checkPermission('admin/manage-leadership','delete')): ?>
                                    <a href="<?= site_url('admin/manage-leadership/delete/'.$leader->id); ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this Leadership?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; else: ?>

                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No Leadership Found
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>