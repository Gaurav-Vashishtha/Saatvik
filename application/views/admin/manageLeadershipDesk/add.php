<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">
            Add <?= ucfirst($section) ?> Content
        </h5>
    </div>

    <div class="card-body">

        <form method="post" enctype="multipart/form-data">

            <!-- 🔥 SECTION (AUTO - HIDDEN) -->
            <input type="hidden" name="section" value="<?= $section ?>">

            <div class="mb-3">
                <label class="form-label ">Publish Date *</label>

                <input type="date"
                       name="publish_date"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label ">Expiry Date *</label>

                <input type="date"
                       name="expiry_date"
                       class="form-control"
                       required>
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
                <label class="form-label">Show On Frontend *</label><br>
            
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="content_type" value="description" checked>
                    <label class="form-check-label">Show Description</label>
                </div>
            
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="content_type" value="pdf">
                    <label class="form-check-label">Show PDF</label>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description</label>
            
                <textarea name="description"
                          id="description"
                          rows="5"
                          class="form-control"></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">
                    <small>(Upload PDF | Max size: 5MB)</small>
                </label>
            
                <input type="file"
                       name="pdf_file"
                       class="form-control"
                       accept="application/pdf">
            </div>

            <div class="mb-3">
                <label class="form-label ">Status</label>

                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="d-flex justify-content-end">

                <!-- ✅ Dynamic Cancel URL -->
                <a href="<?= site_url($section_url); ?>"
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
</script>    
<script>
        document.addEventListener("DOMContentLoaded", function() {

            document.addEventListener("change", function(e) {

                if (e.target.type === "file") {

                    const file = e.target.files[0];
                    if (!file) return;

                    const maxSize = 2 * 1024 * 1024;

                    if (file.size > maxSize) {
                        alert("File must be less than 2MB");
                        e.target.value = "";
                    }
                }

            });

        });
    </script>

<script>
$(document).ready(function () {

    let publish = $('input[name="publish_date"]');
    let expiry  = $('input[name="expiry_date"]');

    // When publish date changes
    publish.on('change', function () {

        if (this.value) {
            expiry.attr('min', this.value); // 🚀 prevents invalid expiry selection
        }
    });

    // Optional JS validation (final safety)
    $('form').on('submit', function (e) {

        let p = publish.val();
        let eDate = expiry.val();

        if (p && eDate && p > eDate) {
            e.preventDefault();
            alert("Publish date must be less than or equal to Expiry date.");
        }
    });

});
</script>