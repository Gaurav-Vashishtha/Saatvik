<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Add Moment</h5>
    </div>

    <div class="card-body">

        <?php if(validation_errors()): ?>
        <div class="alert alert-danger">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label ">Title *</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Enter Title"
                       required>
            </div>

             <div class="col-md-6 mb-3">
                    <label class="form-label ">Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
             </div>
            <div class="mb-3">
                <label class="form-label ">Description</label>
                <textarea name="description"
                          id="description"
                          class="form-control"
                          rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label ">Image<small>(Max size: 2MB | 600×400 | JPG/PNG/JPEG/WEBP)</small></label>
                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label ">Status</label>
                <select name="status" class="form-select">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">

                <a href="<?= site_url('admin/manage-moments'); ?>"
                   class="btn btn-secondary me-2">
                   Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Save
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
    createEditor('#description');

});
</script>