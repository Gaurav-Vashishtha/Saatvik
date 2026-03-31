<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Learning Material</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label class="form-label ">Question *</label>
                <input type="text" 
                       name="question" 
                       class="form-control" 
                       value="<?php echo $learning_material->question; ?>"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label ">Answer</label>
                <textarea name="answer" 
                          class="form-control" 
                           id= "answer" 
                          rows="3" ><?php echo $learning_material->answer; ?></textarea>
            </div>



            <div class="mb-3">
                <label class="form-label ">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1" <?php echo ($learning_material->is_active == 1) ? 'selected' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?php echo ($learning_material->is_active == 0) ? 'selected' : ''; ?>>
                        Inactive
                    </option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('admin/manage-learning-material'); ?>" 
                   class="btn btn-secondary me-2">Cancel</a>

                <button type="submit" class="btn btn-primary">
                    Update 
                </button>
            </div>

        </form>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
function createEditor(selector) {
    const $el = $(selector);
    if ($el.length && !$el.next('.note-editor').length) {
        $el.summernote({
            height: 200,
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
            ]
        });
    }
}

$(document).ready(function () {
    createEditor('#answer');

});
</script>