<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage Admin User</h5>

            <?php if(checkPermission('admin/manage-hr','add')): ?>
                <a href="<?= site_url('admin/manage-hr/create'); ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Add
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
                            <th>Employee ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th width="120">Status</th>
                            <th width="200" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if(!empty($hrs)): $i = 1; foreach($hrs as $hr): ?>

                            <tr>

                                <td><?= $i++; ?></td>

                                <td><?= $hr->full_name; ?></td>

                                <td><?= $hr->employee_code; ?></td>

                                <td><?= $hr->email; ?></td>

                                <td><?= $hr->phone; ?></td>

                                <td>

                                    <?php if($hr->is_active == 1): ?>

                                        <?php if(checkPermission('admin/manage-hr','edit')): ?>
                                            <a href="<?= site_url('admin/manage-hr/toggle/'.$hr->id); ?>"
                                               class="badge bg-success text-decoration-none px-3 py-2">
                                               Active
                                            </a>
                                        <?php else: ?>
                                            <span class="badge bg-success px-3 py-2">Active</span>
                                        <?php endif; ?>

                                    <?php else: ?>

                                        <?php if(checkPermission('admin/manage-hr','edit')): ?>
                                            <a href="<?= site_url('admin/manage-hr/toggle/'.$hr->id); ?>"
                                               class="badge bg-danger text-decoration-none px-3 py-2">
                                               Inactive
                                            </a>
                                        <?php else: ?>
                                            <span class="badge bg-danger px-3 py-2">Inactive</span>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                </td>

                                <td class="text-center">

                                    <?php if(checkPermission('admin/manage-hr','edit')): ?>
                                        <a href="<?= site_url('admin/manage-hr/edit/'.$hr->id); ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php // if(checkPermission('admin/manage-hr','delete')): ?>
                                        <!-- <a href="<? //= site_url('admin/manage-hr/delete/'.$hr->id); ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this User?');">
                                            <i class="fa fa-trash"></i>
                                        </a> -->
                                    <?php  // endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; else: ?>

                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    No User Found
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>