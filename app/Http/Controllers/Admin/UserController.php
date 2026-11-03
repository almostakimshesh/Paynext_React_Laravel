<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $users = User::query()
            ->when($q !== '', fn ($query) => $query->where(fn ($w) => $w->where('name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%")))
            ->latest('id')->paginate(15)->withQueryString();

        return view('admin.users', compact('users', 'q'));
    }

    public function adjust(Request $request, User $user)
    {
        $data = $request->validate([
            'points' => ['required', 'integer', 'not_in:0', 'between:-1000000,1000000'],
            'reason' => ['required', 'string', 'max:150'],
        ]);

        try {
            $user->adjust((int) $data['points'], 'Admin adjustment: '.$data['reason']);
        } catch (\RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Adjusted '.$user->name.' by '.number_format((int) $data['points']).' points.');
    }

    public function toggle(Request $request, User $user)
    {
        if ($user->id === $request->user()->id || $user->isAdmin()) {
            return back()->with('error', 'You cannot suspend an admin account.');
        }

        $user->status = $user->isActive() ? 'suspended' : 'active';
        $user->save();

        return back()->with('success', $user->name.' is now '.$user->status.'.');
    }
}
