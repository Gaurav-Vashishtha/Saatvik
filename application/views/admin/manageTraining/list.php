<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Training Calendar</h5>

        <?php if (checkPermission('admin/manage-training', 'add')): ?>
            <a href="<?= site_url('admin/manage-training/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Training
            </a>
        <?php endif; ?>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover datatable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($trainings)): $i = 1;
                    foreach ($trainings as $row): ?>

                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row->title ?></td>
                            <td><?= $row->training_date ?></td>

                            <td>
                                <?php if ($row->image): ?>
                                    <img src="<?= base_url('uploads/training/' . $row->image) ?>" width="60">
                                <?php endif; ?>
                            </td>

                            <td>
                                <a href="<?= site_url('admin/manage-training/toggle/' . $row->id); ?>"
                                    class="badge <?= $row->is_active ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $row->is_active ? 'Active' : 'Inactive' ?>
                                </a>
                            </td>

                            <td>

                                <a href="<?= site_url('admin/manage-training/edit/' . $row->id); ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="<?= site_url('admin/manage-training/delete/' . $row->id); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this record?');">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                <?php endforeach;
                endif; ?>

            </tbody>

        </table>

    </div>
</div>