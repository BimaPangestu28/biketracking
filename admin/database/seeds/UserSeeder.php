<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Bima Pangestu",
            'email' => 'admin@email.dev',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
    }
}
