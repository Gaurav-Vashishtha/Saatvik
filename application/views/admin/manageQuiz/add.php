<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Add Quiz</h5>
    </div>

    <div class="card-body">

        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
    <form method="post">

        <div class="mb-3">
            <label>Question</label>
            <textarea name="question" class="form-control"><?= set_value('question') ?></textarea>
        </div>

        <input type="text" name="option_a" placeholder="Option A" class="form-control mb-2">
        <input type="text" name="option_b" placeholder="Option B" class="form-control mb-2">
        <input type="text" name="option_c" placeholder="Option C" class="form-control mb-2">
        <input type="text" name="option_d" placeholder="Option D" class="form-control mb-2">

        <div class="mb-3">
            <label>Correct Option</label>
            <select name="correct_option" class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>