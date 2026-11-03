<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.support', ['tickets' => $request->user()->tickets()->latest()->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $request->user()->tickets()->create($data);

        return back()->with('success', 'Ticket submitted. We will get back to you soon.');
    }
}
