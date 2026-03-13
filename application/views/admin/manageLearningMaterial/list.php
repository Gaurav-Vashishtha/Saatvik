<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">Learning Material</h5>
        <a href="<?php echo site_url('admin/manage-learning-material/create'); ?>" class="btn btn-primary btn-sm">
           <i class="fa fa-plus"></i> Add Learning Material
        </a>
    </div>

    <div class="card-body table-responsive ">
        <table class="table table-hover datatable">
            <thead class="bg-light">
                <tr>
                    <th>id</th>
                    <th>Qusetion</th>
                    <th>Status</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($laerning_material)): $i=1; foreach($laerning_material as $lm): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $lm->question; ?></td>

                    <td>
                        <?php if($lm->is_active == 1): ?>
                            <a href="<?php echo base_url('admin/manage-learning-material/toggle/'.$lm->id); ?>" 
                                class="badge bg-success text-decoration-none px-3 py-2">
                                Active
                            </a>
                        <?php else: ?>
                            <a href="<?php echo base_url('admin/manage-learning-material/toggle/'.$lm->id); ?>" 
                                class="badge bg-danger text-decoration-none px-3 py-2">
                                Inactive
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                          <a href="<?php echo base_url('admin/manage-learning-material/edit/'.$lm->id); ?>" 
                                           class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                      
                            <a href="<?php echo base_url('admin/manage-learning-material/delete/'.$lm->id); ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Delete this Material?');">
                                            <i class="fa fa-trash"></i>
                              </a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="4" class="text-center">No laerning_material Found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>