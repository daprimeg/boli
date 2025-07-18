@extends('admin.partial.app')
@push('title') Tickets @endpush
@section('css')
<style>

    .table{
        width: 100%!important;
    }

    .dataTables_length{
        display:none!important;
    }

    .dataTables_info{
        
    }

    .datatables-products th {
        text-align: center;
    }
    .datatables-products td {
        text-align: center;
    }

    .table-responsive {
        overflow-x: auto!important;
        -webkit-overflow-scrolling: touch!important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid py-4">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="mb-0">Ticket #{{ $ticket->id }} - {{ $ticket->issue_topic }}</h4>
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $ticket->user->firstName }} {{ $ticket->user->surname }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge 
                    {{ $ticket->status == 0 ? 'bg-warning' : 
                       ($ticket->status == 1 ? 'bg-info' : 
                       ($ticket->status == 2 ? 'bg-success' : 'bg-secondary')) }}">
                    {{ ['Open','In Progress','Resolved','Closed'][$ticket->status] }}
                </span>
            </p>
            <p>
                <strong>Priority:</strong>
                <span class="badge 
                    {{ $ticket->priority == 'High' ? 'bg-danger' : 
                       ($ticket->priority == 'Medium' ? 'bg-warning' : 'bg-success') }}">
                    {{ $ticket->priority }}
                </span>
            </p>
            <p><strong>Details:</strong><br>{{ $ticket->details }}</p>
            @if ($ticket->attachment)
                <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank">View File</a></p>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Send a Reply</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/admin/tickets/'.$ticket->id.'/reply') }}">
                @csrf
                <textarea name="message" class="form-control" rows="3" required placeholder="Type your reply..."></textarea>
                <button type="submit" class="btn btn-primary mt-2">Send Reply</button>
            </form>
        </div>
    </div>

    @if($ticket->replies->count())
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Previous Replies</h5>
            </div>
            <div class="card-body">
                @foreach ($ticket->replies as $reply)
                    <div class="mb-3 p-3 border rounded">
                        <strong>{{ $reply->is_admin ? 'Admin' : $reply->user->firstName }}:</strong>
                        <p class="mb-0">{{ $reply->message }}</p>
                        <small class="text-muted">{{ $reply->created_at->format('d M Y H:i') }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update Ticket</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('/admin/tickets/'.$ticket->id.'/update')}}">
                @csrf
                <div class="row gy-3">
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="0" {{ $ticket->status == 0 ? 'selected' : '' }}>Open</option>
                            <option value="1" {{ $ticket->status == 1 ? 'selected' : '' }}>In Progress</option>
                            <option value="2" {{ $ticket->status == 2 ? 'selected' : '' }}>Resolved</option>
                            <option value="3" {{ $ticket->status == 3 ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Priority</label>
                        <select name="priority" class="form-select">
                            <option value="Low" {{ $ticket->priority == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ $ticket->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ $ticket->priority == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Ticket</button>
            </form>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Ticket Rating & Feedback (Admin View Only)</h5>
        </div>
        <div class="card-body">
            <p><strong>Rating:</strong> {{ $ticket->rating ?? 'No rating provided' }} / 5</p>
            <p><strong>Feedback:</strong> {{ $ticket->feedback ?? 'No feedback provided' }}</p>
        </div>
    </div>

</div>


@endsection
@section('js')

@endsection
