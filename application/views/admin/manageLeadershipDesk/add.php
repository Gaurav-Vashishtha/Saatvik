<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Add Leadership Desk Content</h5>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="mb-3">
                <label class="form-label ">Section *</label>

                <select name="section" class="form-control" required>
                    <option value="">Select Section</option>
                    <option value="corporate">Corporate Communication</option>
                    <option value="notice">Notice & Circulars</option>
                    <option value="joinee">New Joinee Welcome</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label ">Publish Date *</label>

                <input type="date"
                       name="publish_date"
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


            <div class="mb-3">
                <label class="form-label ">Status</label>

                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>


            <div class="d-flex justify-content-end">

                <a href="<?= site_url('admin/manage-leadership-desk'); ?>"
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