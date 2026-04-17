<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <?php
        $sections = [
            'corporate' => 'Corporate Communication',
            'notice'    => 'Notice & Circulars',
            'joinee'    => 'New Joinee Welcome'
        ];

        $baseUrls = [
            'corporate' => 'admin/corporate-communication',
            'notice'    => 'admin/notice-circulars',
            'joinee'    => 'admin/new-joinee'
        ];

        $currentBase = $baseUrls[$section];
        ?>

        <h5 class="mb-0">
            <?= $sections[$section] ?? 'Leadership Desk' ?>
        </h5>

        <?php if(checkPermission($currentBase,'add')): ?>
            <a href="<?= site_url($currentBase.'/create') ?>"
               class="btn btn-primary btn-sm d-flex align-items-center">
                <i class="fa fa-plus me-1"></i>
                <span>Add</span>
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
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($items)): $i = 1; foreach ($items as $row): ?>

                    <tr>

                        <td><?= $i++; ?></td>

                        <td><?= $row->title; ?></td>

                        <td><?= date('M d, Y', strtotime($row->publish_date)); ?></td>

                        <!-- STATUS -->
                        <td>
                            <?php if(checkPermission($currentBase,'edit')): ?>
                                <a href="<?= site_url($currentBase.'/toggle/'.$row->id); ?>"
                                   class="badge <?= $row->status ? 'bg-success' : 'bg-danger' ?> text-decoration-none px-3 py-2">
                                   <?= $row->status ? 'Active' : 'Inactive' ?>
                                </a>
                            <?php else: ?>
                                <span class="badge <?= $row->status ? 'bg-success' : 'bg-danger' ?> px-3 py-2">
                                    <?= $row->status ? 'Active' : 'Inactive' ?>
                                </span>
                            <?php endif; ?>
                        </td>

                        <!-- ACTION -->
                        <td>

                            <?php if(checkPermission($currentBase,'edit')): ?>
                                <a href="<?= site_url($currentBase.'/edit/'.$row->id); ?>"
                                   class="btn btn-sm btn-warning">
                                   <i class="fa fa-edit"></i>
                                </a>
                            <?php endif; ?>

                            <?php if(checkPermission($currentBase,'delete')): ?>
                                <a href="<?= site_url($currentBase.'/delete/'.$row->id); ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this record?');">
                                   <i class="fa fa-trash"></i>
                                </a>
                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; else: ?>

                    <tr>
                        <td colspan="5" class="text-center">No Records Found</td>
                    </tr>

                <?php endif ?>

            </tbody>

        </table>

    </div>

</div>


<script>
document.getElementById('section-filter').addEventListener('change', function(){
    const section = this.value;
    window.location.href = "<?= base_url('admin/manage-leadership-desk') ?>?section=" + section;
});
</script>