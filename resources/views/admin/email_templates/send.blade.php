@include('admin.partial.layout')

<div class="container mt-5">
    <h2>Send Email: "{{ $template->subject }}"</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('email_templates.send', $template->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select Users</label>
            <select name="user_ids[]" class="form-control" multiple required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            <small class="text-muted">Hold CTRL (or CMD) to select multiple users.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Preview</label>
            <div class="border p-3" style="background-color: #f9f9f9;">
                {!! $template->body !!}
            </div>
        </div>

        <button type="submit" class="btn btn-success">Send Email</button>
    </form>
</div>

@include('admin.partial.footer')
