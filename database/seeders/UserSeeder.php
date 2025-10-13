<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
            'name'=> 'Budi Eko Pandiangan',
            'email'=> 'Budi@gmail.com',
            'password'=> bcrypt('password')
            ]);
            User::create([
            'name'=> 'Paulina Lestari Setiawan ',
            'email'=> 'Paulina@gmail.com',
            'password'=> bcrypt('password')
            ]);
            User::create([
            'name'=> 'Heru Beru Dentandianto',
            'email'=> 'Heru@gmail.com',
            'password'=> bcrypt('password')
            ]);
            User::create([
            'name'=> 'Albert Suporiarjo Dorikan',
            'email'=> 'Albert@gmail.com',
            'password'=> bcrypt('password')
            ]);
            User::create([
            'name'=> 'Agus Setiawanto Tantonisa',
            'email'=> 'Agus@gmail.com',
            'password'=> bcrypt('password')
            ]);

            \App\Models\User::factory()->count(100)->create();
    }
}
