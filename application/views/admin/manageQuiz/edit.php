<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Quiz Question</h5>
    </div>

    
    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>

    <form method="post">

        <div class="mb-3">
            <label class="form-label ">Question*</label>
            <textarea name="question" class="form-control" rows="3" required><?= set_value('question', $question->question); ?></textarea>
            <?= form_error('question', '<small class="text-danger">', '</small>'); ?>
        </div>

        <div class="mb-2">
            <label class="form-label ">Option A *</label>
            <input type="text" name="option_a" class="form-control"
                   value="<?= set_value('option_a', $question->option_a); ?>" required>
        </div>

        <div class="mb-2">
            <label class="form-label ">Option B *</label>
            <input type="text" name="option_b" class="form-control"
                   value="<?= set_value('option_b', $question->option_b); ?>" required>
        </div>

        <div class="mb-2">
            <label class="form-label ">Option C</label>
            <input type="text" name="option_c" class="form-control"
                   value="<?= set_value('option_c', $question->option_c); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label ">Option D</label>
            <input type="text" name="option_d" class="form-control"
                   value="<?= set_value('option_d', $question->option_d); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label ">Correct Option</label>
            <select name="correct_option" class="form-control">
                <option value="A" <?= set_select('correct_option', 'A', $question->correct_option == 'A'); ?>>A</option>
                <option value="B" <?= set_select('correct_option', 'B', $question->correct_option == 'B'); ?>>B</option>
                <option value="C" <?= set_select('correct_option', 'C', $question->correct_option == 'C'); ?>>C</option>
                <option value="D" <?= set_select('correct_option', 'D', $question->correct_option == 'D'); ?>>D</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label ">Status</label>
            <div>
                <input type="checkbox" name="status" value="1"
                    <?= set_checkbox('status', '1', $question->is_active == 1); ?>>
                Active
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= site_url('admin/manage-quiz'); ?>" class="btn btn-secondary">Cancel</a>

    </form>
</div>