<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert user
        DB::table('users')->insert([
            'id' => Uuid::uuid4(),
            'name' => 'rizkipasaribu',
            'email' => 'rizki@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
