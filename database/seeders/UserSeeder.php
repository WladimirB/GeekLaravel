<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
                ->count(5)
                ->create();
        DB::table('users')->insertOrIgnore([
            'name' => 'adminuser',
            'email' => 'adminuser@emal.test',
            'email_verified_at' => now(),
            'password' => 'adminuser',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'is_admin' => 1
          ]);
    }
}
