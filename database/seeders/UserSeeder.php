<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where(User::TYPE, User::TYPE_ADMIN)->count() === 0) {
            User::create([
                User::NAME     => 'Admin',
                User::EMAIL    => 'support@egulen.mn',
                User::PHONE    => '86023000',
                User::PASSWORD => Hash::make('password'),
                User::TYPE     => User::TYPE_ADMIN,
            ]);
        }
    }
}
