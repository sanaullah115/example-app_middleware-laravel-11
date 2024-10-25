<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Users = collect([
            [
                'name' => 'ali',
                'email' => 'ali@gmail.com',
                'password' => '12345',
            ],
            [
                'name' => 'Aman',
                'email' => 'aman@gmail.com',
                'password' => '12345',
            ],
            [
                'name' => 'Bassit',
                'email' => 'Bassit@gmail.com',
                'password' => '12345',
            ],
            [
                'name' => 'Waqas',
                'email' => 'Waqas@gmail.com',
                'password' => '12345',
            ],
            [
                'name' => 'Numan',
                'email' => 'Numan@gmail.com',
                'password' => '12345',
            ],

        ]);


        $Users->each(function ($userRecord) {
            User::create($userRecord);
        });
        // User::create([
        //     'name' => 'Kashif',
        //     'email' => 'Kashif@gmail.com',
        //     'password' => '12345',
        // ]);
    }
}
