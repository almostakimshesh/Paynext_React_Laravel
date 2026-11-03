<?php

namespace App\Http\Controllers;

use App\Models\OfferCompletion;
use App\Models\Offerwall;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OfferwallController extends Controller
{
    /** Sample offers used in demo mode: key => [title, points] */
    private const DEMO_OFFERS = [
        'video' => ['Watch a short video', 20],
        'quiz' => ['Take the daily quiz', 60],
        'survey' => ['Complete a 2-minute survey', 100],
        'signup' => ['Sign up for a free trial', 150],
        'app' => ['Install and open a partner app', 300],
    ];

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:2000', 'regex:/^https?:\/\/\S+$/i'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $walls = Offerwall::query()
            ->when(! $user->isAdmin(), fn ($q) => $q->where('is_active', true))
            ->orderBy('id')->get();

        $stats = OfferCompletion::where('user_id', $user->id)
            ->selectRaw('offerwall_id, count(*) as c, sum(points) as p')
            ->groupBy('offerwall_id')->get()->keyBy('offerwall_id');

        return view('offerwalls.index', compact('walls', 'stats'));
    }

    /** Sends the user to the offerwall with their user id filled in. */
    public function go(Request $request, Offerwall $offerwall)
    {
        $user = $request->user();

        if (! $offerwall->is_active && ! $user->isAdmin()) {
            abort(404);
        }
        if (! $offerwall->url) {
            if (config('earning.demo_offers')) {
                return redirect()->route('offerwalls.demo', $offerwall);
            }

            return back()->withErrors(['offerwall' => $offerwall->name.' is not available yet.']);
        }

        $url = str_replace(['{user_id}', '{user}'], (string) $user->id, $offerwall->url);

        return redirect()->away($url);
    }

    /** Demo mode: sample offers that credit points instantly (for testing the dashboard). */
    public function demo(Request $request, Offerwall $offerwall)
    {
        abort_unless(config('earning.demo_offers') && $offerwall->is_active, 404);
        $uid = $request->user()->id;

        return view('offerwalls.demo', [
            'offerwall' => $offerwall,
            'offers' => self::DEMO_OFFERS,
            'uid' => $uid,
            'done' => OfferCompletion::where('user_id', $uid)->where('offerwall_id', $offerwall->id)->pluck('external_id')->all(),
        ]);
    }

    public function demoComplete(Request $request, Offerwall $offerwall, string $key)
    {
        abort_unless(config('earning.demo_offers') && $offerwall->is_active && isset(self::DEMO_OFFERS[$key]), 404);
        [$title, $points] = self::DEMO_OFFERS[$key];
        $user = $request->user();
        $external = 'demo-'.$user->id.'-'.$key;

        try {
            DB::transaction(function () use ($user, $offerwall, $points, $title, $external) {
                OfferCompletion::create(['user_id' => $user->id, 'offerwall_id' => $offerwall->id, 'external_id' => $external, 'points' => $points]);
                $user->credit($points, 'offer', 'Completed offer on '.$offerwall->name.': '.$title, $offerwall->slug.':'.$external);
            });
        } catch (UniqueConstraintViolationException $e) {
            return back()->withErrors(['offer' => 'You have already completed this offer.']);
        }

        return back()->with('success', '+'.number_format($points).' points earned!');
    }

    public function create()
    {
        return view('offerwalls.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active');
        $data['slug'] = Str::slug($data['name']).'-'.Str::lower(Str::random(4));
        Offerwall::create($data);

        return redirect()->route('offerwalls.index')->with('success', 'Offerwall created.');
    }

    public function edit(Offerwall $offerwall)
    {
        return view('offerwalls.form', compact('offerwall'));
    }

    public function update(Request $request, Offerwall $offerwall)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active');
        $offerwall->update($data);

        return redirect()->route('offerwalls.index')->with('success', 'Offerwall updated.');
    }

    public function destroy(Offerwall $offerwall)
    {
        $offerwall->delete();

        return redirect()->route('offerwalls.index')->with('success', 'Offerwall deleted.');
    }
}
