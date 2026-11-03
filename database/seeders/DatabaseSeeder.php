<?php

namespace Database\Seeders;

use App\Models\Offerwall;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account: CHANGE THE PASSWORD after first login.
        User::forceCreate([
            'name' => 'Admin',
            'email' => 'admin@paynext.com',
            'password' => 'password',
            'role' => 'admin',
            'status' => 'active',
            'referral_code' => User::generateReferralCode(),
        ]);

        // Demo user with a small balance so withdrawals can be tested.
        $demo = User::forceCreate([
            'name' => 'Demo User',
            'email' => 'demo@paynext.com',
            'password' => 'password',
            'role' => 'user',
            'status' => 'active',
            'referral_code' => User::generateReferralCode(),
        ]);
        $demo->credit(10000, 'task', 'Welcome bonus (demo)');

        $walls = [
            ['GemiAd', 'Earn money from gemiad'], ['VortexWall', null], ['Pixy Labs', 'Best offerwall site'],
            ['Admaxflow', null], ['Revtoo', null], ['Up Wall', null], ['Offery', null], ['Prime Wall', null],
        ];
        foreach ($walls as [$name, $desc]) {
            Offerwall::create([
                'name' => $name,
                'slug' => Str::slug($name).'-'.Str::lower(Str::random(4)),
                'description' => $desc,
                'url' => null,       // add the real URL from the admin panel
                'is_active' => true,
            ]);
        }

        Task::create(['title' => 'Follow us on social media', 'description' => 'Follow our official page, then mark this task as completed.', 'points' => 50, 'is_active' => true]);
    }
}
