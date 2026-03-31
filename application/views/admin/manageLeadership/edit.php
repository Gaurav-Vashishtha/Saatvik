<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header">
            <h5 class="mb-0 ">Edit Leadership</h5>
        </div>

        <div class="card-body">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="post" enctype="multipart/form-data">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label ">Name *</label>
                        <input type="text" name="name" class="form-control"
                            value="<?= set_value('name', $leader->name) ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Designation *</label>
                        <input type="text" name="designation" class="form-control"
                            value="<?= set_value('designation', $leader->designation) ?>" required>
                    </div>

                   <div class="col-md-12">
                        <label class="form-label ">Description</label>
                        <textarea id="description" name="description" class="form-control"><?= set_value('description', $leader->description) ?></textarea>
                    </div>

                    <div class="col-md-12">

                        <label class="form-label ">Image <small>(Max size: 2MB | 200×200 | JPG/PNG/JPEG/WEBP)</small></label>

                        <input type="file" name="image" class="form-control">

                        <?php if ($leader->image): ?>

                            <img src="<?= base_url('uploads/leadership/' . $leader->image) ?>"
                                width="120" class="mt-2">

                        <?php endif ?>

                    </div>

                    <div class="col-md-12">

                        <label class="form-label ">Status</label>

                        <select name="status" class="form-select">

                            <option value="1" <?= ($leader->status == 1) ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= ($leader->status == 0) ? 'selected' : '' ?>>Inactive</option>

                        </select>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-end">

                    <a href="<?= site_url('admin/manage-leadership') ?>" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>

                    <button class="btn btn-primary">
                        Update Leadership
                    </button>

                </div>

            </form>

        </div>
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