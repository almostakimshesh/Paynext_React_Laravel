<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'open');

        $tickets = Ticket::with('user')
            ->when($status !== 'all', fn ($q) => $q->where('status', $status))
            ->latest()->paginate(10)->withQueryString();

        return view('admin.tickets', compact('tickets', 'status'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'admin_reply' => ['nullable', 'string', 'max:3000'],
            'status' => ['required', Rule::in(['open', 'closed'])],
        ]);

        $ticket->update($data);

        return back()->with('success', 'Ticket updated.');
    }
}
