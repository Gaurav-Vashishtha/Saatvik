<div class="container-fluid mt-4">

<div class="card shadow-sm border">

    <div class="card-header  d-flex justify-content-between align-items-center">
        <h5 class="mb-0 ">Manage Leadership</h5>

        <a href="<?php echo base_url('admin/manage-leadership/create'); ?>" 
        class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add Leadership
        </a>
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
                    <?php if(!empty($leaders)): ?>
                        <?php $i = 1; foreach($leaders as $leader): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>

                                <td class="">
                                    <?php echo $leader->name; ?>
                                </td>

                                <td><?php echo $leader->designation; ?></td>

                                <td>
                                    <?php if(!empty($leader->image)): ?>
                                        <img src="<?php echo base_url('uploads/leadership/'.$leader->image); ?>" width="50">
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <?php if($leader->status == 1): ?>
                                        <a href="<?php echo base_url('admin/manage-leadership/toggle/'.$leader->id); ?>" 
                                           class="badge bg-success text-decoration-none px-3 py-2">
                                            Active
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('admin/manage-leadership/toggle/'.$leader->id); ?>" 
                                           class="badge bg-danger text-decoration-none px-3 py-2">
                                            Inactive
                                        </a>
                                    <?php endif; ?>
                                </td>

                                <td class="text-center">
                                    <a href="<?php echo base_url('admin/manage-leadership/edit/'.$leader->id); ?>" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="<?php echo base_url('admin/manage-leadership/delete/'.$leader->id); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this Leadership?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
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
