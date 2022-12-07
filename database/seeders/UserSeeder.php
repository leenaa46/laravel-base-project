<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => \config('services.default_user.name'),
            'password' => \bcrypt(\config('services.default_user.password')),
        ])->assignRole('super-admin');
    }
}
