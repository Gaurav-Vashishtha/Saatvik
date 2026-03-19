<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Manage Employee</h5>
        <a href="<?php echo base_url('admin/employee/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add Employee
        </a>


    </div>



    <div class="card-body">
        <a href="<?php echo base_url('admin/employee/export_csv'); ?>" 
            class="btn btn-success btn-sm">
            <i class="fa fa-download"></i> Download CSV
        </a>
        <div class="table-responsive ">
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
                            <td><?php echo $emp->first_name.' '.$emp->last_name; ?></td>
                            <td><?php echo $emp->employee_code; ?></td>
                            <td><?php echo $emp->email; ?></td>
                            <td><?php echo $emp->phone; ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/employee/toggle/'.$emp->id); ?>"
                                   class="badge <?php echo $emp->is_active ? 'bg-success' : 'bg-danger'; ?>">
                                   <?php echo $emp->is_active ? 'Active' : 'Inactive'; ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo base_url('admin/employee/edit/'.$emp->id); ?>" 
                                   class="btn btn-sm btn-warning">
                                   <i class="fa fa-edit"></i>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach; else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No Employees Found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>