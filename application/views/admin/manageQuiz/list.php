<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 ">Manage Quiz Questions</h5>

            <?php if(checkPermission('admin/manage-quiz','add')): ?>
            <a href="<?= base_url('admin/manage-quiz/create'); ?>" 
               class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Add Question
            </a>
            <?php endif; ?>

        </div>

        <div class="card-body">
            
            <div class="table-responsive ">
                <table class="table table-hover align-middle datatable">
                    <thead class="bg-light">
                        <tr>
                            <th width="60">S no.</th>
                            <th>Question</th>
                            <th width="120">Correct</th>
                            <th width="120">Status</th>
                            <th width="200" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if(!empty($questions)): ?>
                        <?php $i = 1; foreach($questions as $q): ?>

                        <tr>

                            <td><?= $i++; ?></td>

                            <td>
                                <?= word_limiter($q->question, 15); ?>
                            </td>

                            <td>
                                <span class="badge bg-info px-3 py-2">
                                    <?= $q->correct_option; ?>
                                </span>
                            </td>

                            <td>

                                <?php if($q->is_active == 1): ?>

                                    <?php if(checkPermission('admin/manage-quiz','edit')): ?>
                                    <a href="<?= base_url('admin/manage-quiz/toggle/'.$q->id); ?>" 
                                       class="badge bg-success text-decoration-none px-3 py-2">
                                       Active
                                    </a>
                                    <?php else: ?>
                                    <span class="badge bg-success px-3 py-2">Active</span>
                                    <?php endif; ?>

                                <?php else: ?>

                                    <?php if(checkPermission('admin/manage-quiz','edit')): ?>
                                    <a href="<?= base_url('admin/manage-quiz/toggle/'.$q->id); ?>" 
                                       class="badge bg-danger text-decoration-none px-3 py-2">
                                       Inactive
                                    </a>
                                    <?php else: ?>
                                    <span class="badge bg-danger px-3 py-2">Inactive</span>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </td>

                            <td class="text-center">

                                <?php if(checkPermission('admin/manage-quiz','edit')): ?>
                                <a href="<?= base_url('admin/manage-quiz/edit/'.$q->id); ?>" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <?php endif; ?>

                                <?php if(checkPermission('admin/manage-quiz','delete')): ?>
                                <a href="<?= base_url('admin/manage-quiz/delete/'.$q->id); ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this question?');">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                        <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No Questions Found
                            </td>
                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>