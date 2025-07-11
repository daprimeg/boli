@extends('admin.partial.app')

@push('title') Ticket @endpush

@section('css')
    <style>
        .form-label{
            padding-top: 18px;
            padding-bottom: 6px;
            font-size: 15px;
        }
    </style>
@endsection

@section('content')
     <div class="container-xxl flex-grow-1 container-p-y">
                <h3>Ticket Details</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Issue Topic:</strong> {{ $ticket->issue_topic }}</p>
                        <p><strong>Issue Type:</strong> {{ $ticket->issue_type }}</p>
                        <p><strong>Priority:</strong> {{ $ticket->priority }}</p>
                        <p><strong>Status:</strong>
                            @php
                            $statuses = ['Open', 'In Progress', 'Resolved', 'Closed'];
                            @endphp
                            {{ $statuses[$ticket->status] ?? 'Unknown' }}
                        </p>
                        <p><strong>Created At:</strong> {{ $ticket->created_at->format('d M Y H:i') }}</p>
                        <p><strong>Details:</strong><br>{!! $ticket->details !!}</p>
                        @if($ticket->attachment)
                        <p><strong>Attachment:</strong>
                            <a href="{{ asset('/public/uploads/tickets/' . $ticket->attachment) }}" target="_blank">Download</a>
                        </p>
                        @endif
                    </div>
                </div>
                <h4>Replies</h4>
                @foreach($ticket->replies as $reply)
                <div class="card mb-3">
                    <div class="card-body">
                        <p>
                            <strong>{{ $reply->is_admin ? 'Admin' : 'You' }}:</strong>
                            <small class="text-muted float-end">{{ $reply->created_at->format('d M Y H:i') }}</small>
                        </p>
                        <p>{{ $reply->message }}</p>
                        @if($reply->attachment)
                        <p><strong>Attachment:</strong>
                            <a href="{{ asset('storage/ticket_replies/' . $reply->attachment) }}" target="_blank">Download</a>
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach

                {{-- Reply Form --}}
                @if($ticket->status != 3)
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5>Add a Reply</h5>
                            <form action="{{ route('ticket.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message:</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Attachment (optional):</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Send Reply</button>
                            </form>
                        </div>
                    </div>
                @endif

                {{-- Feedback Section --}}
                @if($ticket->status == 3)
                        @if(is_null($ticket->feedback) && is_null($ticket->rating))
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5>Submit Feedback</h5>
                                    <form action="{{ route('ticket.feedback', $ticket->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Rating (1 to 5):</label>
                                            <select name="rating" id="rating" class="form-select" required>
                                                <option value="">Select Rating</option>
                                                @for($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="feedback" class="form-label">Feedback:</label>
                                            <textarea name="feedback" id="feedback" class="form-control" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit Feedback</button>
                                    </form>
                                </div>
                            </div>
                        @else
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5>Feedback Submitted</h5>
                                <p><strong>Rating:</strong> {{ $ticket->rating }}/5</p>
                                <p><strong>Feedback:</strong><br>{{ $ticket->feedback }}</p>
                            </div>
                        </div>
                        @endif
                @endif
        </div>
@endsection

@section('js')
    
@endsection