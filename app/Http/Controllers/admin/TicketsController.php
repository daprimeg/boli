<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DataTables;

class TicketsController extends Controller
{
    public function index() {
        return view('admin.tickets.index');
    }

    public function data() {
        return datatables()->of(Ticket::with('user')->latest())
            ->addColumn('user', fn($t) => $t->user->firstName ?? 'N/A')
            ->addColumn('status', fn($t) => ['Open','In Progress','Resolved','Closed'][$t->status])
            ->addColumn('action', fn($t) => '<a href="'.route('admin.tickets.show', $t->id).'" class="btn btn-sm btn-primary">View</a>')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id) {
        $ticket = Ticket::with('replies.user')->findOrFail($id);
        return view('admin.tickets.show', compact('ticket'));
    }

    public function reply(Request $request, $id) {
        $request->validate(['message' => 'required']);
        TicketReply::create([
            'ticket_id' => $id,
            'user_id' => auth()->id(),
            'is_admin' => 1,
            'message' => $request->message,
        ]);
        return back()->with('success', 'Reply sent.');
    }

    public function updateStatus(Request $request, $id) {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'status' => $request->status,
            'priority' => $request->priority,
            'closed_at' => $request->status == 3 ? now() : null,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);
        return back()->with('success', 'Ticket updated.');
    }
}
