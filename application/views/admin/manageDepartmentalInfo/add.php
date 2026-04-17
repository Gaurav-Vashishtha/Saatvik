<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Add Departmental Information Content</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label class="form-label ">Section *</label>

                <select name="section" class="form-control" required>
                    <option value="">Select Section</option>
                    <option value="sops">SOPs</option>
                    <option value="technical_document">Technical Document</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Category *</label>

                <select name="category" id="category" class="form-control" required>
                    <option value="">Select Category</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label ">Title *</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Enter Title"
                       required>
            </div>


            <div class="mb-3">
                <label class="form-label ">Description</label>

                <textarea name="description"
                          id="description"
                          rows="5"
                          class="form-control"></textarea>
            </div>

             <div class="mb-3">
                <label class="form-label ">Document Link (Optional)</label>
                <input type="url" 
                       name="document_link" 
                       class="form-control"
                       placeholder="https://example.com/policy.pdf">
            </div>
             
            <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Department</label>
                <input type="text"
                    name="department"
                    class="form-control"
                    placeholder="Enter Department"
                    value="<?= set_value('department'); ?>"
                    >
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Version</label>
                <input type="text"
                    name="version"
                    class="form-control"
                    placeholder="e.g. v1.0"
                    value="<?= set_value('version'); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Effective Date</label>
                <input type="date"
                    name="effective_date"
                    class="form-control"
                    value="<?= set_value('effective_date'); ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Owner</label>
                <input type="text"
                    name="owner"
                    class="form-control"
                    placeholder="Document Owner"
                    value="<?= set_value('owner'); ?>">
            </div>

        </div>

            <div class="mb-3">
                <label class="form-label ">Status</label>

                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>


            <div class="d-flex justify-content-end">

                <a href="<?= site_url('admin/manage-departmental-information'); ?>"
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


$(document).ready(function () {

    const categoryData = {
        sops: [
            { value: 'guidelines', text: 'Guidelines' },
            { value: 'compliance', text: 'Compliance' },
            { value: 'information', text: 'Information' }
        ],
        technical_document: [
            { value: 'tool_badges', text: 'Tool & Badges' },
            { value: 'programs', text: 'Programs' },
            { value: 'datasheet', text: 'Datasheet' }
        ]
    };

    $('select[name="section"]').on('change', function () {
        let section = $(this).val();
        let categoryDropdown = $('#category');

        categoryDropdown.html('<option value="">Select Category</option>');

        if (categoryData[section]) {
            $.each(categoryData[section], function (i, item) {
                categoryDropdown.append(
                    `<option value="${item.value}">${item.text}</option>`
                );
            });
        }
    });

});

</script>