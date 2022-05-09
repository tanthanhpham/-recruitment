<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new Admin();
        $user->name = 'Pham Tan Thanh';
        $user->email = 'admin@gmail.com';
        $user->phone = '0981063207';
        $user->password = Hash::make('password');
        $user->save();
        // \App\Models\User::factory(10)->create();
    }
}
