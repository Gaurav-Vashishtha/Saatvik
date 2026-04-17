<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Edit Policy</h5>
    </div>

    <div class="card-body">

       <form method="post" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Category *</label>

                    <select name="category" id="category" class="form-select" required>
                        <option value="">Select Category</option>

                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat->id ?>"
                                <?= ($policy->category == $cat->id) ? 'selected' : '' ?>>
                                <?= $cat->name ?>
                            </option>
                        <?php endforeach; ?>

                        <option value="add_new">+ Add New Category</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Policy Title *</label>
                    <input type="text" 
                        name="title" 
                        class="form-control" 
                        value="<?php echo $policy->title; ?>"
                        required>
                </div>
            </div>
            <div class="row">


                <div class="col-md-6 mb-3">
                    <label class="form-label">Effective Date *</label>
                    <input type="date"
                        name="effective_date"
                        class="form-control"
                        value="<?= !empty($policy->effective_date) ? date('Y-m-d', strtotime($policy->effective_date)) : '' ?>"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Version</label>
                    <input type="text"
                        name="version"
                        class="form-control"
                        value="<?= $policy->version ?>">
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label">Show On Frontend *</label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                           type="radio"
                           name="content_type"
                           value="description"
                           <?php if($policy->content_type == 'description'){ echo 'checked'; } ?>>
                    <label class="form-check-label">Show Description</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                           type="radio"
                           name="content_type"
                           value="pdf"
                           <?php if($policy->content_type == 'pdf'){ echo 'checked'; } ?>>
                    <label class="form-check-label">Show PDF</label>
                </div>

            </div>



            <div class="mb-3">
                <label class="form-label">Full Description</label>
                <textarea name="description"
                          class="form-control"
                          id="full_description"
                          rows="6"><?php echo $policy->description; ?></textarea>
            </div>



            <div class="mb-3">
                <label class="form-label">Upload Policy PDF<small>(Upload PDF | Max size: 10MB)</small></label>

                <?php if(!empty($policy->pdf_file)) : ?>
                <div class="mb-2">
                    <a href="<?= base_url('uploads/policy/'.$policy->pdf_file) ?>"
                       target="_blank"
                       class="btn btn-sm btn-info">
                       View Current PDF
                    </a>
                </div>
                <?php endif; ?>

                <input type="file"
                       name="pdf_file"
                       class="form-control"
                       accept="application/pdf">

                <small class="text-muted">
                    Leave empty if you don't want to change the PDF
                </small>
            </div>



            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="is_active" class="form-select">
                    <option value="1" <?php echo ($policy->is_active == 1) ? 'selected' : ''; ?>>
                        Active
                    </option>
                    <option value="0" <?php echo ($policy->is_active == 0) ? 'selected' : ''; ?>>
                        Inactive
                    </option>
                </select>
            </div>



            <div class="d-flex justify-content-end">
                <a href="<?php echo site_url('admin/policy-procedures'); ?>" 
                   class="btn btn-secondary me-2">Cancel</a>

                <button type="submit" class="btn btn-primary">
                    Update Policy
                </button>
            </div>

        </form>

    </div>
</div>



<div class="modal fade" id="categoryModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <input type="text" id="new_category" class="form-control" placeholder="Enter category">
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" id="saveCategory">Save</button>
      </div>

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

    // Initialize editors
    createEditor('#full_description');
    createEditor('#short_description');

    $('#category').change(function () {
        if ($(this).val() === 'add_new') {
            $('#categoryModal').modal('show');
            $(this).val('');
        }
    });

    $('#saveCategory').click(function () {

        let name = $('#new_category').val().trim();

        if (name === '') {
            alert('Enter category');
            return;
        }

        $.ajax({
            url: "<?= site_url('admin/superadmin/manageprivacy/add_category') ?>",
            type: "POST",
            data: { name: name },

            success: function (res) {
                let response = JSON.parse(res);

                if (response.status) {

                    $('#category').append(
                        `<option value="${response.id}" selected>${response.name}</option>`
                    );

                    $('#categoryModal').modal('hide');
                    $('#new_category').val('');

                } else {
                    alert(response.message);
                }
            },

            error: function(xhr) {
                console.log(xhr.responseText);
                alert('Server error while saving category');
            }
        });
    });

});
</script>