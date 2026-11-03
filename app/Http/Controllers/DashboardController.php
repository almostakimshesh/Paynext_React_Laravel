<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('dashboard.index', [
            'todayPoints' => (int) $user->transactions()->where('points', '>', 0)->whereDate('created_at', today())->sum('points'),
            'referralPoints' => $user->referralPoints(),
            'referralCount' => $user->referrals()->count(),
            'recent' => $user->transactions()->latest()->limit(5)->get(),
        ]);
    }
}
