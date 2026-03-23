<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Learning Material</h5>

        <?php if(checkPermission('admin/manage-learning-material','add')): ?>
            <a href="<?= site_url('admin/manage-learning-material/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Learning Material
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover datatable">

            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if(!empty($laerning_material)): $i=1; foreach($laerning_material as $lm): ?>

                <tr>

                    <td><?= $i++; ?></td>

                    <td><?= $lm->question; ?></td>

                    <td>

                        <?php if($lm->is_active == 1): ?>

                            <?php if(checkPermission('admin/manage-learning-material','edit')): ?>
                                <a href="<?= site_url('admin/manage-learning-material/toggle/'.$lm->id); ?>"
                                   class="badge bg-success text-decoration-none px-3 py-2">
                                   Active
                                </a>
                            <?php else: ?>
                                <span class="badge bg-success px-3 py-2">Active</span>
                            <?php endif; ?>

                        <?php else: ?>

                            <?php if(checkPermission('admin/manage-learning-material','edit')): ?>
                                <a href="<?= site_url('admin/manage-learning-material/toggle/'.$lm->id); ?>"
                                   class="badge bg-danger text-decoration-none px-3 py-2">
                                   Inactive
                                </a>
                            <?php else: ?>
                                <span class="badge bg-danger px-3 py-2">Inactive</span>
                            <?php endif; ?>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?php if(checkPermission('admin/manage-learning-material','edit')): ?>
                            <a href="<?= site_url('admin/manage-learning-material/edit/'.$lm->id); ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                        <?php endif; ?>

                        <?php if(checkPermission('admin/manage-learning-material','delete')): ?>
                            <a href="<?= site_url('admin/manage-learning-material/delete/'.$lm->id); ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Delete this Material?');">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php endif; ?>

                    </td>

                </tr>

                <?php endforeach; else: ?>

                <tr>
                    <td colspan="4" class="text-center">No Learning Material Found</td>
                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>