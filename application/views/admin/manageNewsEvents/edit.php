<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit News / Event</h5>
    </div>

    <div class="card-body">

        <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>
                <input type="text"
                       name="title"
                       value="<?= $news->title ?>"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date"
                       name="event_date"
                       value="<?= $news->event_date ?>"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description"
                          id="description"
                          class="form-control"
                          newss="5"><?= $news->description ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Image<small>(Max size: 2MB | 600×400 | JPG/PNG/JPEG/WEBP)</small></label>

                <?php if(!empty($news->image)): ?>
                    <div class="mb-2">
                        <img src="<?= base_url('uploads/news/'.$news->image) ?>" width="120">
                    </div>
                <?php endif; ?>

                <input type="file"
                       name="image"
                       class="form-control">
            </div>


            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1" <?php echo ($news->is_active == 1) ? 'selected' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?php echo ($news->is_active == 0) ? 'selected' : ''; ?>>
                        Inactive
                    </option>
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <a href="<?= site_url('admin/manage-news-events'); ?>"
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
    createEditor('#description');

});
</script>