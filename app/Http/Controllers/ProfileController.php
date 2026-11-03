<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        // Older accounts without a code get one automatically
        if (! $user->referral_code) {
            $user->referral_code = User::generateReferralCode();
            $user->save();
        }

        return view('dashboard.profile', ['link' => route('register', ['ref' => $user->referral_code])]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $request->merge(['referral_code' => Str::lower(trim((string) $request->input('referral_code')))]);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'referral_code' => ['required', 'alpha_dash:ascii', 'min:4', 'max:16', Rule::unique('users', 'referral_code')->ignore($user->id)],
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ], [
            'referral_code.unique' => 'That referral code is already taken. Try another one.',
            'referral_code.alpha_dash' => 'The referral code may only contain letters, numbers, dashes and underscores.',
        ]);

        $user->name = $data['name'];
        $user->referral_code = $data['referral_code'];
        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }
        $user->save();

        return back()->with('success', 'Profile updated.');
    }

    /** Replace the referral code with a fresh random one. */
    public function generateCode(Request $request)
    {
        $user = $request->user();
        $user->referral_code = User::generateReferralCode();
        $user->save();

        return back()->with('success', 'New referral code generated: '.$user->referral_code);
    }
}
