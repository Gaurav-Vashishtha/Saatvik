<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">Policy & Procedures</h5>
        <a href="<?php echo site_url('admin/policy-procedures/create'); ?>" class="btn btn-primary btn-sm">
           <i class="fa fa-plus"></i> Add Policy
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover datatable">
            <thead class="bg-light">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($policies)): $i=1; foreach($policies as $p): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $p->title; ?></td>

                    <td>
                        <?php if($p->is_active == 1): ?>
                            <a href="<?php echo base_url('admin/policy-procedures/toggle/'.$p->id); ?>" 
                                class="badge bg-success text-decoration-none px-3 py-2">
                                Active
                            </a>
                        <?php else: ?>
                            <a href="<?php echo base_url('admin/policy-procedures/toggle/'.$p->id); ?>" 
                                class="badge bg-danger text-decoration-none px-3 py-2">
                                Inactive
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                          <a href="<?php echo base_url('admin/policy-procedures/edit/'.$p->id); ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                      
                            <a href="<?php echo base_url('admin/policy-procedures/delete/'.$p->id); ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Delete this policy?');">
                                            <i class="fa fa-trash"></i>
                              </a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="4" class="text-center">No Policies Found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>