<div class="card">

    <div class="card-header">
        <h5>Edit Role</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name"
                    value="<?= $role->name ?>"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" <?= $role->status ? 'selected' : '' ?>>Active</option>
                    <option value="0" <?= !$role->status ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>

            <hr>

            <?php if ($role->id != 1): ?>   

                <hr>

                <h6>Permissions</h6>

                <table class="table table-bordered">

                    <tr>
                        <th>Module</th>
                        <th>View</th>
                        <th>Add</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php foreach ($sidebars as $s): ?>

                        <tr>

                            <td><?= $s->name ?></td>

                            <td>
                                <input type="checkbox"
                                    name="permission[<?= $s->id ?>][view]"
                                    <?= (isset($permissions[$s->id]) && $permissions[$s->id]->can_view) ? 'checked' : '' ?>>
                            </td>

                            <td>
                                <input type="checkbox"
                                    name="permission[<?= $s->id ?>][add]"
                                    <?= (isset($permissions[$s->id]) && $permissions[$s->id]->can_add) ? 'checked' : '' ?>>
                            </td>

                            <td>
                                <input type="checkbox"
                                    name="permission[<?= $s->id ?>][edit]"
                                    <?= (isset($permissions[$s->id]) && $permissions[$s->id]->can_edit) ? 'checked' : '' ?>>
                            </td>

                            <td>
                                <input type="checkbox"
                                    name="permission[<?= $s->id ?>][delete]"
                                    <?= (isset($permissions[$s->id]) && $permissions[$s->id]->can_delete) ? 'checked' : '' ?>>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </table>

            <?php else: ?>

                <!-- <div class="alert alert-info">
                    Administrator has full access. No permission settings required.
                </div> -->

            <?php endif; ?>

            <button class="btn btn-primary">Update</button>

        </form>

    </div>

</div>