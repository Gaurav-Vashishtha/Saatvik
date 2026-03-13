<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Edit Departmental Information Content</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label class="form-label fw-semibold">Section</label>

                <input type="text"
                       class="form-control"
                       value="<?php 
                            if($item->section=='sops') echo 'SOPs';
                            elseif($item->section=='technical_document') echo 'Technical Document';
                       ?>"
                       readonly>

                <input type="hidden" name="section" value="<?= $item->section ?>">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="<?= $item->title ?>"
                       required>
            </div>


            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>

                <textarea name="description"
                          id="description"
                          rows="5"
                          class="form-control"><?= $item->description ?></textarea>
            </div>

             <div class="mb-3">
                <label class="form-label fw-semibold">Document Link (Optional)</label>
                <input type="url" 
                       name="document_link" 
                       class="form-control"
                       placeholder="https://example.com/policy.pdf"
                       value="<?php echo $item->document_link; ?>">
            </div>


            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>

                <select name="status" class="form-control">

                    <option value="1" <?= $item->status==1 ? 'selected':'' ?>>
                        Active
                    </option>

                    <option value="0" <?= $item->status==0 ? 'selected':'' ?>>
                        Inactive
                    </option>

                </select>
            </div>


            <div class="d-flex justify-content-end">

                <a href="<?= site_url('admin/manage-departmental-information?section='.$item->section); ?>"
                   class="btn btn-secondary me-2">
                   Cancel
                </a>

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