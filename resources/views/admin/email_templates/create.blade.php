@include('admin.partial.layout')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
  $(document).ready(function() {
    $('#body').summernote({
      height: 300
    });
  });
</script>
<div class="container mt-5">
    <h2>Create Email Template</h2>

    <form action="{{ route('email_templates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Email Body (HTML allowed)</label>
            <textarea name="body" id="body" class="form-control" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Template</button>
    </form>
</div>

@include('admin.partial.footer')
