<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Edit Departmental Information Content</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label class="form-label ">Section</label>

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
                <label class="form-label">Category *</label>

                <select name="category" class="form-control" required>

                    <option value="">Select Category</option>

                    <?php if($item->section == 'sops'): ?>
                        <option value="guidelines" <?= ($item->category=='guidelines')?'selected':''; ?>>Guidelines</option>
                        <option value="compliance" <?= ($item->category=='compliance')?'selected':''; ?>>Compliance</option>
                        <option value="information" <?= ($item->category=='information')?'selected':''; ?>>Information</option>
                    <?php endif; ?>

                    <?php if($item->section == 'technical_document'): ?>
                        <option value="tool_badges" <?= ($item->category=='tool_badges')?'selected':''; ?>>Tool & Badges</option>
                        <option value="programs" <?= ($item->category=='programs')?'selected':''; ?>>Programs</option>
                        <option value="datasheet" <?= ($item->category=='datasheet')?'selected':''; ?>>Datasheet</option>
                    <?php endif; ?>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label ">Title *</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="<?= $item->title ?>"
                       required>
            </div>


            <div class="mb-3">
                <label class="form-label ">Description</label>

                <textarea name="description"
                          id="description"
                          rows="5"
                          class="form-control"><?= $item->description ?></textarea>
            </div>

             <div class="mb-3">
                <label class="form-label ">Document Link (Optional)</label>
                <input type="url" 
                       name="document_link" 
                       class="form-control"
                       placeholder="https://example.com/policy.pdf"
                       value="<?php echo $item->document_link; ?>">
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <input type="text"
                        name="department"
                        class="form-control"
                        value="<?= $item->department ?>"
                        >
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Version</label>
                    <input type="text"
                        name="version"
                        class="form-control"
                        value="<?= $item->version ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Effective Date</label>
                    <input type="date"
                        name="effective_date"
                        class="form-control"
                        value="<?= !empty($item->effective_date) ? date('Y-m-d', strtotime($item->effective_date)) : '' ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Owner</label>
                    <input type="text"
                        name="owner"
                        class="form-control"
                        value="<?= $item->owner ?>">
                </div>

            </div>


            <div class="mb-3">
                <label class="form-label ">Status</label>

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

            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        uploadImage(files[i], selector);
                    }
                }
            },

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

// COMMON IMAGE UPLOAD FUNCTION
function uploadImage(file, editor) {
    let data = new FormData();
    data.append("file", file);

    $.ajax({
        url: "<?= site_url('upload-editor-image') ?>",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(res) {
            let response = JSON.parse(res);

            if (response.status) {
                $(editor).summernote('insertImage', response.url);
            } else {
                alert(response.message);
            }
        },
        

   error: function(xhr, status, error) {
    console.log("STATUS:", status);
    console.log("ERROR:", error);
    console.log("RESPONSE:", xhr.responseText);
    alert("Check console for error");
}
        
    });
}

$(document).ready(function () {
    createEditor('#description');

});
</script>