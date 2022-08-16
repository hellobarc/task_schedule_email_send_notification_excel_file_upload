<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(10)->create();
        User::insert([
            'name' => 'Minar Ahmed',
            'email' => 'minar.barc@gmail.com',
            'password' => Hash::make('12345678'),
            'date_of_birth' => '1996-05-12',
            'group_id' => 2,
        ]);
    }
}
