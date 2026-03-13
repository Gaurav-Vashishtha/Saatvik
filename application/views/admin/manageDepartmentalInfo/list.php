<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Departmental Information -
            <?php
            $sections = [
                'sops' => 'SOPs',
                'technical_document' => 'Technical Document'
            ];

            echo isset($sections[$section]) ? $sections[$section] : 'All Sections';
            ?>
        </h5>

        <div class="d-flex gap-2">
            <select id="section-filter" class="form-control">
                <?php foreach ($sections as $slug => $label): ?>
                    <option value="<?= $slug ?>" <?= ($section == $slug) ? 'selected' : '' ?>>
                        <?= $label ?>
                    </option>
                <?php endforeach ?>
            </select>

            <?php if ($section): ?>
                <a href="<?= site_url('admin/manage-departmental-information/create'); ?>"
                    class="btn btn-primary btn-sm d-flex align-items-center">
                    <i class="fa fa-plus me-1"></i>
                    <span>Add</span>
                </a>
            <?php endif ?>

        </div>

    </div>


    <div class="card-body table-responsive">

        <table class="table table-hover datatable">

            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($items)): $i = 1; foreach ($items as $row): ?>

                    <tr>

                        <td><?= $i++; ?></td>

                        <td><?= $row->title; ?></td>

                        <td>
                            <?php if ($row->status == 1): ?>
                                <a href="<?= base_url('admin/manage-departmental-information/toggle/'.$row->id); ?>"
                                   class="badge bg-success text-decoration-none px-3 py-2">
                                   Active
                                </a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/manage-departmental-information/toggle/'.$row->id); ?>"
                                   class="badge bg-danger text-decoration-none px-3 py-2">
                                   Inactive
                                </a>
                            <?php endif ?>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/manage-departmental-information/edit/'.$row->id); ?>"
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>

                            <a href="<?= base_url('admin/manage-departmental-information/delete/'.$row->id); ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Delete this record?');">
                               <i class="fa fa-trash"></i>
                            </a>
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
    window.location.href = "<?= base_url('admin/manage-departmental-information') ?>?section=" + section;
});
</script>