<div class="container-fluid mt-4">

    <div class="card shadow-sm border">

        <div class="card-header">
            <h5 class="mb-0 ">Add Leadership</h5>
        </div>

        <div class="card-body">

            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form method="post" enctype="multipart/form-data">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label ">Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label ">Designation *</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>
                    
                   <div class="col-md-12">
                        <label class="form-label ">Description</label>
                        <textarea name="description" id="description" class="form-control" ></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label ">Image <small>(Max size: 2MB | 200×200 | JPG/PNG/JPEG/WEBP)</small></label>
                        <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    </div>
                    


                    <div class="col-md-12">
                        <label class="form-label ">Status</label>

                        <select name="status" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-end">

                    <a href="<?= site_url('admin/manage-leadership') ?>" class="btn btn-outline-secondary me-2">
                        Cancel
                    </a>

                    <button class="btn btn-primary">
                        Save Leadership
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