<?php

namespace App\Http\Controllers;

use App\Models\OfferCompletion;
use App\Models\Offerwall;
use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Server-to-server callback offerwalls call when a user completes an offer.
 * GET/POST /postback/{offerwall-slug}?user_id=1&points=250&txn_id=abc123&secret=XXXX
 */
class PostbackController extends Controller
{
    public function __invoke(Request $request, Offerwall $offerwall)
    {
        $secret = (string) config('earning.postback_secret');
        if ($secret === '' || ! hash_equals($secret, (string) $request->input('secret'))) {
            return response('Forbidden', 403);
        }

        $v = Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'points' => ['required', 'integer', 'min:1', 'max:1000000'],
            'txn_id' => ['required', 'string', 'max:191'],
        ]);
        if ($v->fails()) {
            return response('Invalid parameters', 422);
        }
        if (! $offerwall->is_active) {
            return response('Offerwall inactive', 422);
        }

        $user = User::find($request->integer('user_id'));
        if (! $user || ! $user->isActive()) {
            return response('User not found', 404);
        }

        $points = $request->integer('points');
        $txn = (string) $request->input('txn_id');

        try {
            DB::transaction(function () use ($user, $offerwall, $points, $txn) {
                OfferCompletion::create([
                    'user_id' => $user->id,
                    'offerwall_id' => $offerwall->id,
                    'external_id' => $txn,
                    'points' => $points,
                ]);
                $user->credit($points, 'offer', 'Completed offer on '.$offerwall->name, $offerwall->slug.':'.$txn);
            });
        } catch (UniqueConstraintViolationException $e) {
            return response('Duplicate', 200); // already credited; offerwalls retry
        }

        return response('OK', 200);
    }
}
