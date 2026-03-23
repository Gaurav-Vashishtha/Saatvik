<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5>Admin Roles</h5>

        <?php if(checkPermission('admin/admin-roles','add')): ?>
        <a href="<?= site_url('admin/admin-roles/create') ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add Role
        </a>
        <?php endif; ?>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th width="120">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if(!empty($roles)): foreach($roles as $r): ?>

                <tr>

                    <td><?= $r->id ?></td>

                    <td><?= $r->name ?></td>

                    <td>

                        <?php if($r->status == 1): ?>

                            <?php if(checkPermission('admin/admin-roles','edit')): ?>
                            <a href="<?= site_url('admin/admin-roles/toggle/'.$r->id) ?>"
                               class="badge bg-success text-decoration-none px-3 py-2">
                               Active
                            </a>
                            <?php else: ?>
                            <span class="badge bg-success px-3 py-2">Active</span>
                            <?php endif; ?>

                        <?php else: ?>

                            <?php if(checkPermission('admin/admin-roles','edit')): ?>
                            <a href="<?= site_url('admin/admin-roles/toggle/'.$r->id) ?>"
                               class="badge bg-danger text-decoration-none px-3 py-2">
                               Inactive
                            </a>
                            <?php else: ?>
                            <span class="badge bg-danger px-3 py-2">Inactive</span>
                            <?php endif; ?>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?php if(checkPermission('admin/admin-roles','edit')): ?>
                        <a href="<?= site_url('admin/admin-roles/edit/'.$r->id) ?>" 
                           class="btn btn-warning btn-sm">
                           <i class="fa fa-edit"></i>
                        </a>
                        <?php endif; ?>

                    </td>

                </tr>

                <?php endforeach; else: ?>

                <tr>
                    <td colspan="4" class="text-center">No Roles Found</td>
                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>