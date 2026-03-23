<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">News & Events</h5>

        <?php if(checkPermission('admin/manage-news-events','add')): ?>
        <a href="<?= site_url('admin/manage-news-events/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add News/Event
        </a>
        <?php endif; ?>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-hover datatable">

            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php if(!empty($news)): $i=1; foreach($news as $row): ?>

            <tr>

                <td><?= $i++; ?></td>

                <td><?= $row->title ?></td>

                <td><?= $row->event_date ?></td>

                <td>
                    <?php if(!empty($row->image)): ?>
                        <img src="<?= base_url('uploads/news/'.$row->image) ?>" width="60">
                    <?php endif; ?>
                </td>

                <td>

                    <?php if($row->is_active == 1): ?>

                        <?php if(checkPermission('admin/manage-news-events','edit')): ?>
                            <a href="<?= site_url('admin/manage-news-events/toggle/'.$row->id); ?>"
                               class="badge bg-success text-decoration-none px-3 py-2">
                               Active
                            </a>
                        <?php else: ?>
                            <span class="badge bg-success px-3 py-2">Active</span>
                        <?php endif; ?>

                    <?php else: ?>

                        <?php if(checkPermission('admin/manage-news-events','edit')): ?>
                            <a href="<?= site_url('admin/manage-news-events/toggle/'.$row->id); ?>"
                               class="badge bg-danger text-decoration-none px-3 py-2">
                               Inactive
                            </a>
                        <?php else: ?>
                            <span class="badge bg-danger px-3 py-2">Inactive</span>
                        <?php endif; ?>

                    <?php endif; ?>

                </td>

                <td>

                    <?php if(checkPermission('admin/manage-news-events','edit')): ?>
                    <a href="<?= site_url('admin/manage-news-events/edit/'.$row->id); ?>" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>
                    <?php endif; ?>

                    <?php if(checkPermission('admin/manage-news-events','delete')): ?>
                    <a href="<?= site_url('admin/manage-news-events/delete/'.$row->id); ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Delete this record?');">
                        <i class="fa fa-trash"></i>
                    </a>
                    <?php endif; ?>

                </td>

            </tr>

            <?php endforeach; else: ?>

            <tr>
                <td colspan="6" class="text-center">No Records Found</td>
            </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>