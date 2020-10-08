<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com'],
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com'],
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com'],
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com'],
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com'],
        	['name' => Str::random(10), 'password' => Hash::make('password'), 'email' => Str::random(10).'@gmail.com']
        ]);
    }
}