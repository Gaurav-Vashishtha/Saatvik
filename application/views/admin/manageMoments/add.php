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
            <label class="form-label">Category *</label>
            <select name="category" class="form-select" required>
                <option value="">Select Category</option>

                <option value="event" <?= set_select('category', 'event'); ?>>
                    Ongoing or Upcoming Events
                </option>

                <option value="award" <?= set_select('category', 'award'); ?>>
                    Award
                </option>

                <option value="workshop" <?= set_select('category', 'workshop'); ?>>
                    Workshop / Townhalls / Plant Meeting
                </option>
            </select>
        </div>
            <div class="col-md-6 mb-3">
                <label class="form-label ">Title *</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Enter Title"
                       required>
            </div>
            


             </div>
            <div class="mb-3">
                <label class="form-label ">Description</label>
                <textarea name="description"
                          id="description"
                          class="form-control"
                          rows="4"></textarea>
            </div>
            <div class = "row">
            <div class="col-md-6 mb-3">
                <label class="form-label ">Image<small>(Max size: 2MB | 600×400 | JPG/PNG/JPEG/WEBP)</small></label>
                <input type="file"
                       name="image"
                       accept=".jpg,.jpeg,.png,.webp"
                       class="form-control">
            </div>

             <div class="col-md-6 mb-3">
                    <label class="form-label ">Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
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