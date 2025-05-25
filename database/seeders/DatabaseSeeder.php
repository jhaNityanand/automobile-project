<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Admin::create([
            'name' => 'Admin',
            'gender' => 'Male',
            'phone' => '1234567890',
            'email' => 'admin@example.com',
            'password' => sha1('password'),
            'con_pass' => sha1('password'),
            'status' => 1,
        ]);
    }
}
