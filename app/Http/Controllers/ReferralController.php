<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('dashboard.referrals', [
            'link' => route('register', ['ref' => $user->referral_code]),
            'count' => $user->referrals()->count(),
            'points' => $user->referralPoints(),
            'referrals' => $user->referrals()->latest()->limit(20)->get(['id', 'name', 'created_at']),
        ]);
    }
}
