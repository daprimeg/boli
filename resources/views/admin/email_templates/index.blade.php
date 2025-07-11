@include('admin.partial.layout')

<div class="container mt-5">
    <h2>Email Templates</h2>
    <a href="{{ route('email_templates.create') }}" class="btn btn-primary mb-3">Create New Template</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $template->id }}</td>
                    <td>{{ $template->subject }}</td>
                    <td>
                        <a href="{{ route('email_templates.send_form', $template->id) }}" class="btn btn-sm btn-success">Send</a>
                        <a href="{{ route('email_templates.edit', $template->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <!-- Add delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.partial.footer')
