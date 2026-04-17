<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Employee</h5>

        <?php if(checkPermission('admin/employee','add')): ?>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                <i class="fa fa-plus"></i> Add Employee
            </button>
        <?php endif; ?>

    </div>


    <div class="card-body">

        <?php if(checkPermission('admin/employee','export')): ?>
        <a href="<?php echo base_url('admin/employee/export_csv'); ?>" 
           class="btn btn-success btn-sm">
            <i class="fa fa-download"></i> Download CSV
        </a>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle datatable">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if(!empty($employees)): $i=1; foreach($employees as $emp): ?>

                    <tr>

                        <td><?php echo $i++; ?></td>

                        <td><?php echo $emp->full_name; ?></td>

                        <td><?php echo $emp->employee_code; ?></td>

                        <td><?php echo $emp->email; ?></td>

                        <td><?php echo $emp->phone; ?></td>

                        <td>

                            <?php if($emp->is_active == 1): ?>

                                <?php if(checkPermission('admin/employee','edit')): ?>
                                <a href="<?php echo base_url('admin/employee/toggle/'.$emp->id); ?>"
                                   class="badge bg-success text-decoration-none px-3 py-2">
                                   Active
                                </a>
                                <?php else: ?>
                                <span class="badge bg-success px-3 py-2">Active</span>
                                <?php endif; ?>

                            <?php else: ?>

                                <?php if(checkPermission('admin/employee','edit')): ?>
                                <a href="<?php echo base_url('admin/employee/toggle/'.$emp->id); ?>"
                                   class="badge bg-danger text-decoration-none px-3 py-2">
                                   Inactive
                                </a>
                                <?php else: ?>
                                <span class="badge bg-danger px-3 py-2">Inactive</span>
                                <?php endif; ?>

                            <?php endif; ?>

                        </td>

                        <td class="text-center">

                            <?php if(checkPermission('admin/employee','edit')): ?>
                            <a href="<?php echo base_url('admin/employee/edit/'.$emp->id); ?>" 
                               class="btn btn-sm btn-warning">
                               <i class="fa fa-edit"></i>
                            </a>
                            <?php endif; ?>

                        </td>

                    </tr>

                    <?php endforeach; else: ?>

                    <tr>
                        <td colspan="7" class="text-center">No Employees Found</td>
                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

                <a href="<?= base_url('admin/employee/create') ?>" 
                   class="btn btn-primary w-100 mb-3">
                    <i class="fa fa-user"></i> Add Single Employee
                </a>

                <button class="btn btn-success w-100" id="openCsvUpload">
                    <i class="fa fa-upload"></i> Import via CSV
                </button>

                <a href="<?= base_url('admin/employee/download_sample_csv') ?>" 
                    class="btn btn-info w-100 mt-2">
                    <i class="fa fa-download"></i> Download Sample CSV
                 </a>

                <form action="<?= base_url('admin/employee/import_csv') ?>" 
                      method="post" 
                      enctype="multipart/form-data"
                      id="csvForm"
                      style="display:none;"
                      class="mt-3">

                    <input type="file" name="csv_file" class="form-control mb-2" required>

                    <button type="submit" class="btn btn-success w-100">
                        Upload CSV
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>


<script>
document.getElementById('openCsvUpload').addEventListener('click', function () {
    document.getElementById('csvForm').style.display = 'block';
});
</script>